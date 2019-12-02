<?php


namespace App\Job;


use App\Controller\Xcx\UserController;
use App\Services\Client\UserClient;
use Hyperf\AsyncQueue\Job;

class TemplateJob extends Job
{
    public $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function handle()
    {
        $data =  $this->params;
        $accessToken = di()->get(UserController::class)->getToken();
        $openId = $data['openid'];
        $formId = $data['formId'];

        di()->get(UserClient::class)->client($accessToken, $openId, $formId,$data);
    }
}