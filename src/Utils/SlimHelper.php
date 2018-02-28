<?php

namespace Shucream0117\SlimBoost\Utils;

use Shucream0117\SlimBoost\Constants\HttpRequestMethod;
use Slim\Http\Request;
use Slim\Route;

/**
 * Slimの機能として使用するコードだが、テストを書きたいのでクラスに切り出しておいた。
 * @see https://www.slimframework.com/docs/cookbook/enable-cors.html
 * ↑ここに書かれているサンプルを切り出してクラスメソッド化した。
 */
class SlimHelper
{
    /**
     * middleware.php で使う、CORS用のルーティングメソッド抽出さん
     * @param Request $request
     * @param Route[] $routes
     * @return array
     */
    public static function getAllowedMethods(Request $request, array $routes = [])
    {
        // OPTIONS の場合は、諸事情によりとりあえず決め打ちで返す。
        if ($request->isOptions()) {
            return [
                HttpRequestMethod::GET,
                HttpRequestMethod::POST,
                HttpRequestMethod::PUT,
                HttpRequestMethod::DELETE,
                HttpRequestMethod::HEAD,
                HttpRequestMethod::OPTIONS,
            ];
        }
        /** @var Route $route */
        $route = $request->getAttribute("route");
        // OPTIONS は全エンドポイントで受け付けているので、最初からいれとく
        $methods = [HttpRequestMethod::OPTIONS];
        if (!empty($route) && !empty($routes)) {
            $pattern = $route->getPattern();
            foreach ($routes as $r) {
                if ($pattern === $r->getPattern()) {
                    $methods = array_merge_recursive($methods, $r->getMethods());
                }
            }
        } else {
            $methods[] = $request->getMethod();
        }
        // GETがある場合はHEADも入れる
        if (in_array(HttpRequestMethod::GET, $methods)) {
            $methods[] = HttpRequestMethod::HEAD;
        }
        return $methods;
    }
}