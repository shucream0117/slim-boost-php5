<?php

namespace Shucream0117\SlimBoost\Controllers;

use Slim\Http\Request;
use Slim\Http\UploadedFile;

/**
 * Request オブジェクトをコントローラから扱いやすくする氏
 */
trait RequestParserTrait
{
    /** @var Request */
    protected $request;

    /**
     * リクエストボディのjsonをarrayで取得する
     * @return array
     */
    protected function getRequestParams()
    {
        return $this->request->getParsedBody() ?: [];
    }

    /**
     * リクエストボディの値を取得する
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    protected function getRequestParam($key, $default = null)
    {
        return $this->request->getParsedBodyParam($key, $default);
    }

    /**
     * クエリパラメータをarrayで取得する
     * @return array
     */
    protected function getQueryParams()
    {
        return $this->request->getQueryParams() ?: [];
    }

    /**
     * クエリパラメータの値を取得する
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    protected function getQueryParam($key, $default = null)
    {
        return $this->request->getQueryParam($key, $default);
    }

    /**
     * Cookieの値を取得する
     * @param string $key
     * @param null $default
     * @return mixed
     */
    protected function getCookie($key, $default = null)
    {
        return $this->request->getCookieParam($key, $default);
    }

    /**
     * Cookieをarrayで取得する
     * @return array
     */
    protected function getCookies()
    {
        return $this->request->getCookieParams();
    }

    /**
     * ファイルを取得する
     * @param string $key
     * @return null|UploadedFile
     */
    protected function getFile($key)
    {
        $files = $this->request->getUploadedFiles();
        return array_key_exists($key, $files) ? $files[$key] : null;
    }

    /**
     * ファイルをarrayで取得する
     * @return UploadedFile[]
     */
    protected function getFiles()
    {
        return $this->request->getUploadedFiles();
    }

    /**
     * $_SERVERの値を取得する
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    protected function getServerParam($key, $default = null)
    {
        return $this->request->getServerParam($key, $default);
    }

    /**
     * @return array
     */
    protected function getServerParams()
    {
        return $this->request->getServerParams();
    }
}
