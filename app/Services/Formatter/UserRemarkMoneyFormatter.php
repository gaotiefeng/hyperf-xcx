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

use App\Model\UserRemarkMoney;

class UserRemarkMoneyFormatter extends Formatter
{
    public function base(UserRemarkMoney $model)
    {
        return [
            'id' => $model->id,
            'openid' => $model->openid,
            'type_id' => $model->type_id,
            'money' => $model->money / 100,
            'created_at' => (string) $model->created_at,
        ];
    }

    public function detail(UserRemarkMoney $model, $userRemark)
    {
        $result = $this->base($model);
        $result['remark_type'] = RemarkTypeFormatter::instance()->base($userRemark);

        return $result;
    }
}
