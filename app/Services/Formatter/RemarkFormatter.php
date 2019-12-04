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

namespace App\Services\Formatter;

use App\Model\Remark;

class RemarkFormatter extends Formatter
{
    public function base(Remark $model)
    {
        return [
            'money' => $model->money / 100,
            'remark' => $model->remark,
            'openid' => $model->openid,
            'remark_type' => $model->type_id,
            'created_at' => (string) $model->created_at,
        ];
    }

    public function detail(Remark $model, $remarkType)
    {
        $result = $this->base($model);

        $result['remark_type'] = RemarkTypeFormatter::instance()->base($remarkType);

        return $result;
    }
}
