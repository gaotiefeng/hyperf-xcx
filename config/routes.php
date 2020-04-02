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

Router::addRoute(['GET', 'POST', 'HEAD'], '/api', 'app\Controller\IndexController@index');
Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'app\Controller\IndexController@html');


Router::addServer('http', function () {
    Router::get('/user/login', 'app\Controller\Xcx\UserController@login');
    Router::get('/user/info', 'app\Controller\Xcx\UserController@info');

    Router::get('/remark/index', 'app\Controller\Xcx\RemarkController@index');
    Router::post('/remark/save', 'app\Controller\Xcx\RemarkController@save');

    Router::get('/remark/type/index', 'app\Controller\Xcx\RemarkTypeController@index');

    Router::get('/user/remark/money/index', 'app\Controller\Xcx\UserRemarkMoneyController@index');
});

Router::addServer('admin', function () {
    Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'app\Controller\IndexController@index');
    Router::post('/admin/login', 'app\Controller\Admin\AdminController@login');
    Router::post('/admin/register', 'app\Controller\Admin\AdminController@register');
});

Router::addServer('ws', function () {
    Router::get('/', 'App\Controller\WebSocketController');
});
