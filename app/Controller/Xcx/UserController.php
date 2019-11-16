<?php

declare(strict_types=1);

namespace App\Controller\Xcx;

use App\Controller\IndexController;
use EasyWeChat\Factory;

class UserController extends IndexController
{

    public function login()
    {
        $config = [
            'app_id' => 'wx45d028d42222a99d',
            'secret' => '41e617fbfab0a1b244abf0a7a92e8c4a',

            // 下面为可选项
            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
            'response_type' => 'array',

            'log' => [
                'level' => 'debug',
                'file' => __DIR__.'/wechat.log',
            ],
        ];
        $code = $this->request->input('code');
        $app = Factory::miniProgram($config);
        $result = $app->auth->session($code);

        var_dump($result);
    }
}
