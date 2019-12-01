<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::addServer('http', function () {
    Router::get('/user/login', 'App\Controller\Xcx\UserController@login');
    Router::get('/user/info', 'App\Controller\Xcx\UserController@info');

    Router::get('/remark/index', 'App\Controller\Xcx\RemarkController@index');
    Router::post('/remark/save', 'App\Controller\Xcx\RemarkController@save');

    Router::get('/remark/type/index', 'App\Controller\Xcx\RemarkTypeController@index');
});

Router::addServer('admin', function () {
    Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');
    Router::post('/admin/login', 'App\Controller\Admin\AdminController@login');
    Router::post('/admin/register', 'App\Controller\Admin\AdminController@register');
});
