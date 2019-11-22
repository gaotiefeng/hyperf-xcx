<?php

declare(strict_types=1);

namespace App\Controller\Xcx;

use App\Controller\IndexController;
use App\Job\UserJob;
use App\Services\Biz\Xcx\UserBiz;
use App\Services\Client\UserClient;
use EasyWeChat\Factory;
use Hyperf\Di\Annotation\Inject;

class UserController extends IndexController
{
    /**
     * @Inject()
     * @var UserBiz
     */
    protected $biz;

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

        $config = config('xcx');
        $code = $this->request->input('code');
        $app = Factory::miniProgram($config);

        $result = $app->auth->session($code);

        queue_push(new UserJob($result),1);

        return $this->response->success($result);
    }

    /**
     * https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET
     */
    public function getToken()
    {
        $config = config('xcx');
        $app = Factory::miniProgram($config);

        $result = $app->access_token->getToken();

        $tokenKey  = $app->access_token->getTokenKey();

        return $result[$tokenKey];
    }


    public function info()
    {
        $userInfo = $this->request->input('userInfo');
        $openId = $this->request->input('openid');
var_dump($userInfo);
        $result = $this->biz->userSave($openId, $userInfo);

        return $result;
    }
}
