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

use App\Kernel\Helper\ModelHelper;
use App\Model\Remark;
use App\Services\Services;

class RemarkBiz extends Services
{
    public function index(string $openId, int $offset, int $limit)
    {
        $model = Remark::query();

        $model->where('openid', '=', $openId);

        return ModelHelper::pagination($model, $offset, $limit);
    }

    public function save(array $data)
    {
        $model = new Remark();

        $model->openid = $data['openid'];
        $model->type_id = $data['type'];
        $model->remark = $data['content'];

        return $model->save();
    }
}
