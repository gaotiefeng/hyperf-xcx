<?php


namespace App\Services\Dao;


use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Model\User;
use App\Services\Services;

class UserDao extends Services
{
    public function first(string $openId, bool $throw = false)
    {
        $model = User::query()->where('openid', '=', $openId)->first();

        if(empty($model) && $throw) {
            throw new BusinessException(ErrorCode::OPENID_NOT_EXISTS);
        }

        return $model;
    }

    public function save(string $openId, array $data)
    {
        $model = $this->first($openId);
        if(empty($model)) {
            $model = new User();
            $model->openid = $openId;
        }
        $model->nike_name = $data['nikeName'];
        $model->avatarUrl = $data['avatarUrl'];
        $model->city = $data['city'];
        $model->province = $data['province'];

        return $model->save();
    }
}