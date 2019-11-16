<?php

declare(strict_types=1);

namespace App\Controller\Xcx;

use App\Controller\IndexController;
use App\Job\UserJob;
use EasyWeChat\Factory;

class UserController extends IndexController
{

    /**
     * xcx 登陆地址 https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=SECRET&js_code=JSCODE&grant_type=authorization_code
     * param [ 'appid'=> '', 'secret' => '', 'js_code' => code , 'grant_type'=> authorization_code]
     * return [ openid,session_key]
     * @return mixed
     * @throws
     *
     */
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

        queue_push(new UserJob($result),1);

        return $this->response->success($result);
    }
}
