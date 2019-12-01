<?php


namespace App\Services\Biz\Xcx;


use App\Services\Dao\RemarkTypeDao;
use App\Services\Services;
use Hyperf\Di\Annotation\Inject;

class RemarkTypeBiz extends Services
{
    /**
     * @Inject()
     * @var RemarkTypeDao
     */
    protected $dao;

    public function list($offset, $limit)
    {
        return $this->dao->list($offset, $limit);
    }
}