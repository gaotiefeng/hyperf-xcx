<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Services\Biz\Xcx;

use App\Services\Dao\UserDao;
use App\Services\Services;
use Hyperf\Di\Annotation\Inject;

class UserBiz extends Services
{
    /**
     * @Inject
     * @var UserDao
     */
    protected $dao;

    public function userSave(string $openId, array $data)
    {
        return $this->dao->save($openId, $data);
    }
}
