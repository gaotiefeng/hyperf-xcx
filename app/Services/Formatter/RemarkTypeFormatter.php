<?php


namespace App\Services\Formatter;


use App\Model\RemarkType;

class RemarkTypeFormatter extends Formatter
{
    public function base(RemarkType $model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
        ];
    }
}