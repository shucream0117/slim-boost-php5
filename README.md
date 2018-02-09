# SlimBoost

- Slim3
- PHP ≧ 5.5.x

https://github.com/shucream0117/slim-boost をPHP5に対応させました

# Routes Example

```php:routes.php
$app->get("/", IndexController::class . ':showIndex');

$app->get("/users/{user_id:[0-9]+}", UserController::class . ':showUserById');
```

# Setting Example

```php:setting.php
'foundHandler' => function () {
    return new FoundHandler();
},
```