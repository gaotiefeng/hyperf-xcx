<?php

declare(strict_types=1);

namespace App\Controller\Xcx;

use App\Controller\IndexController;
use App\Job\UserJob;
use App\Services\Client\UserClient;
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

        $config = config('xcx');
        $code = $this->request->input('code');
        $app = Factory::miniProgram($config);

        $result = $app->auth->session($code);

        $accessToken = $this->getToken();

        $this->userInfo($accessToken,$result['openid']);

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

    /**
     * @param $accessToken string
     * @param $openId string
     * https://api.weixin.qq.com/wxa/getpaidunionid?access_token=ACCESS_TOKEN&openid=OPENID
     */
    public function userInfo(string $accessToken = '', string $openId = '')
    {
        $userInfo = di()->get(UserClient::class)->client($accessToken, $openId);

        var_dump($userInfo);
        //queue_push(new UserJob($userInfo),2);
    }
}
