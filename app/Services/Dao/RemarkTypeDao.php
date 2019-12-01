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

use App\Kernel\Helper\ModelHelper;
use App\Model\RemarkType;
use App\Services\Services;

class RemarkTypeDao extends Services
{
    public function list($offset, $limit)
    {
        $model = RemarkType::query();

        return ModelHelper::pagination($model, $offset, $limit);
    }
}
