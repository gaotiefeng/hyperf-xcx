<?php


namespace App\Job;


use App\Model\User;
use Hyperf\AsyncQueue\Job;

class UserJob extends Job
{
    public $params;

    public function __construct($params)
    {
        // 这里最好是普通数据，不要使用携带 IO 的对象，比如 PDO 对象
        $this->params = $params;
    }

    public function handle()
    {
        $data = $this->params;
        if($openId = $data['openid'] ?? null) {
            $model = User::query()->where('openid','=', $openId)->first();
            if(empty($model)) {
                $model = new User();
                $model->openid = $openId;
                $model->session_key = $data['session_key'];
                $model->save();
            }
        }

    }
}