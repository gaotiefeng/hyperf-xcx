<?php


namespace App\Services\Dao;


use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Model\UserRemarkMoney;
use Pimple\Tests\Fixtures\Service;

class UserRemarkMoneyDao extends Service
{
    public function first(string $openid, $type, bool $throw = false){

        $model = UserRemarkMoney::query()->where('openid','=',$openid)->where('type_id','=',$type)->first();

        if (empty($model) && $throw) {
            throw new BusinessException(ErrorCode::OPENID_NOT_EXISTS);
        }

        return $model;
    }
}