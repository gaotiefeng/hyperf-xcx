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
        $params = $this->params;
        $model = User::query()->where('openid','=', $params['openid'])->first();
        if(empty($model)) {
            $user = new User();
            $user->openid = $params['openid'];
            $user->session_key = $params['session_key'];
            $user->save();
        }
    }
}