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
use App\Services\Formatter\RemarkFormatter;
use App\Services\Services;

class RemarkBiz extends Services
{
    public function index(string $openId, $offset, $limit)
    {
        $model = Remark::query()->orderBy('id', 'desc');

        $model->where('openid', '=', $openId);

        [$count, $items] = ModelHelper::pagination($model, $offset, $limit);

        $result['count'] = $count;
        $result['items'] = [];
        foreach ($items as $item) {
            /* @var Remark $item */
            $result['items'][] = RemarkFormatter::instance()->detail($item, $item->remarkType);
        }

        return $result;
    }

    public function save(array $data)
    {
        $model = new Remark();

        $model->money = $data['money'] * 100;
        $model->openid = $data['openid'];
        $model->type_id = $data['type'];
        $model->remark = $data['content'];

        $model->save();
        return $model;
    }
}
