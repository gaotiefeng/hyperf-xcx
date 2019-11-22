<?php


namespace App\Services\Biz\Xcx;


use App\Services\Dao\UserDao;
use App\Services\Services;
use Hyperf\Di\Annotation\Inject;

class UserBiz extends Services
{
    /**
     * @Inject()
     * @var UserDao
     */
    protected $dao;

    public function userSave(string $openId, array $data)
    {
        return $this->dao->save($openId, $data);
    }
}