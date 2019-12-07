<?php


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
            'money' => $model->money /100,
            'created_at' => (string)$model->created_at,
        ];
    }

    public function detail(UserRemarkMoney $model, $userRemark)
    {
        $result = $this->base($model);
        $result['remark_type'] = RemarkTypeFormatter::instance()->base($userRemark);

        return $result;
    }
}