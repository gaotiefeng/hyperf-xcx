<?php


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