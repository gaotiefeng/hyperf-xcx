<?php


namespace App\Services\Biz\Xcx;


use App\Model\User;
use App\Model\UserRemarkMoney;
use App\Services\Dao\UserDao;
use App\Services\Formatter\UserRemarkMoneyFormatter;
use Pimple\Tests\Fixtures\Service;

class UserRemarkMoneyBiz extends Service
{
    public function index(string $openId)
    {
        $items = UserRemarkMoney::query()->where('openid','=',$openId)->get();

        /* @var User $user */
        $user = di(UserDao::class)->first($openId, true);
        $result = [];
        foreach($items as $item)  {

             /* @var UserRemarkMoney $item */
            $result[] = UserRemarkMoneyFormatter::instance()->detail($item,$item->remarkType);
        }
        $data = [];
        $data['total'] = $user->money / 100;
        $data['name'] = [];
        $data['money'] = [];
        foreach ($result as $key=>$val) {
            array_push($data['money'],$val['money']);
            array_push($data['name'],$val['remark_type']['name'].'/'.($val['money']));
        }

        return $data;
    }
}