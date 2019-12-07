<?php


namespace App\Services\Biz\Xcx;


use App\Model\UserRemarkMoney;
use Pimple\Tests\Fixtures\Service;

class UserRemarkMoneyBiz extends Service
{
    public function index(string $openId)
    {
        return UserRemarkMoney::query()->where('openid','=',$openId)->get()->toArray();
    }
}