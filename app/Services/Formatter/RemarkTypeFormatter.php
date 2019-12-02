<?php


namespace App\Services\Formatter;


use App\Model\RemarkType;

class RemarkTypeFormatter extends Formatter
{
    public function base(RemarkType $model)
    {
        $result = [
            'id' => $model->id,
            'name' => $model->name,
        ];
        if($model->display == 1) {
            $result['checked'] = true;
        }

        return $result;
    }
}