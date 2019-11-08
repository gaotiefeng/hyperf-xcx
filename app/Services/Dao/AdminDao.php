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
use App\Model\Admin;
use App\Services\Services;

class AdminDao extends Services
{
    public function first($mobile, bool $throw = false, bool $save = false)
    {
        $model = Admin::query()->where('mobile', '=', $mobile)->first();

        if (empty($model) && $throw) {
            throw new BusinessException(ErrorCode::MOBILE_NOT_EXISTS);
        }

        if (! empty($model) && $save) {
            throw new BusinessException(ErrorCode::MOBILE_EXISTS);
        }

        return $model;
    }

    public function save(array $data)
    {
        $this->first($data['mobile'], false, true);

        $model = new Admin();
        $model->mobile = $data['mobile'];
        $model->password = password_hash($data['password'], PASSWORD_DEFAULT, ['cost' => 12]);

        $model->save();

        return $model;
    }

    public function login(array $data)
    {
        $model = $this->first($data['mobile'], true, false);

        if (password_verify($data['password'], $model->password) === false) {
            throw new BusinessException(ErrorCode::PARAMETER_ERROR);
        }

        return $model;
    }
}
