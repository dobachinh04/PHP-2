<?php

use Bramus\Router\Router;

use Admin\Mvcoop2\Controllers\Client\HomeController;
use Admin\Mvcoop2\Controllers\Admin\DashboardController;
use Admin\Mvcoop2\Controllers\Client\PostController as ClientPostController;

use Admin\Mvcoop2\Controllers\Admin\UserController;
use Admin\Mvcoop2\Controllers\Admin\CategoryController;
use Admin\Mvcoop2\Controllers\Admin\PostController;
use Admin\Mvcoop2\Controllers\Admin\AuthenticateController;
use Admin\Mvcoop2\Controllers\Client\SearchController;

// Create Router instance
$router = new Router();

// Define routes
//* <===== Trang Chủ =====>
$router->get('/',                                               HomeController::class . '@index');
$router->get('/post/{id}',                                      ClientPostController::class . '@show');
$router->get('/category/{id}',                                  ClientPostController::class . '@category');

//* <===== Đăng Nhập / Đăng Ký / Đăng Xuất =====>
$router->match('GET|POST', '/auth/login',                       AuthenticateController::class . '@login');
$router->match('GET|POST', '/register',                         AuthenticateController::class . '@register');
$router->get('/logout',                                         AuthenticateController::class . '@logout');

//* <===== Trang Admin =====>
$router->mount('/admin', function () use ($router) {
    $router->get('/',                                           DashboardController::class . '@index');
    $router->get('/logout',                                     AuthenticateController::class . '@logout');
    $router->get('/search',                                     SearchController::class . '@search');

    $router->mount('/users', function () use ($router) {
        $router->get('/',                                       UserController::class . '@index');
        $router->get('/show/{id}',                              UserController::class . '@show');
        $router->get('/delete/{id}',                            UserController::class . '@delete');
        $router->match('GET|POST', '/create',                   UserController::class . '@create');
        $router->match('GET|POST', '/update/{id}',              UserController::class . '@update');
    });

    $router->mount('/categories', function () use ($router) {
        $router->get('/',                                       CategoryController::class . '@index');
        $router->get('/show/{id}',                              CategoryController::class . '@show');
        $router->get('/delete/{id}',                            CategoryController::class . '@delete');
        $router->match('GET|POST', '/create',                   CategoryController::class . '@create');
        $router->match('GET|POST', '/update/{id}',              CategoryController::class . '@update');
    });

    $router->mount('/posts', function () use ($router) {
        $router->get('/',                                       PostController::class . '@index');
        $router->get('/show/{id}',                              PostController::class . '@show');
        $router->get('/delete/{id}',                            PostController::class . '@delete');
        $router->match('GET|POST', '/create',                   PostController::class . '@create');
        $router->match('GET|POST', '/update/{id}',              PostController::class . '@update');
    });
});

//* before ở đây là phải chạy route này trước để kiểm tra xem người dùng đã đăng nhập chưa mà vào trang admin
//* /admin/* thì ngăn được mỗi người dùng không đăng nhập hoặc không có quyền vào trang chủ admin, không ngăn được người ta vào admin/users
$router->before('GET|POST', '/admin/*', function () {
    if (($_SESSION['user']['role']) == 0) {
        header('Location: /');
        exit();
    }
});

//* Vậy nên phải có thêm /admin/.*
$router->before('GET|POST', '/admin/.*', function () {
    if (($_SESSION['user']['role']) == 0) {
        header('Location: /');
        exit();
    }
    // if (!isset($_SESSION['user'])) {
    //     header('Location: /auth/login');
    //     exit();
    // }
});

//* Sau khi đăng nhập thì không được vào trang login và register nữa
$router->before('GET|POST', '/auth/login', function () {
    if (isset($_SESSION['user'])) {
        header('Location: /');
        exit();
    }
});

$router->before('GET|POST', '/register', function () {
    if (isset($_SESSION['user'])) {
        header('Location: /');
        exit();
    }
});

// Run it!
$router->run();
