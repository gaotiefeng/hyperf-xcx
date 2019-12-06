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

        if (empty($model) && $throw) {
            throw new BusinessException(ErrorCode::OPENID_NOT_EXISTS);
        }

        return $model;
    }

    public function save(string $openId, array $data)
    {
        $model = $this->first($openId, true);

        $model->nickName = $data['nickName'];
        $model->avatarUrl = $data['avatarUrl'];
        $model->city = $data['city'];
        $model->province = $data['province'];
        $model->save();

        return $model;
    }
}
