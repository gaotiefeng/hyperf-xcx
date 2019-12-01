<?php

declare(strict_types=1);

namespace App\Controller\Xcx;


use App\Controller\IndexController;
use App\Services\Biz\Xcx\RemarkTypeBiz;
use Hyperf\Di\Annotation\Inject;

class RemarkTypeController extends IndexController
{
    /**
     * @Inject()
     * @var RemarkTypeBiz
     */
    protected $biz;

    public function index()
    {
        $offset = 0;
        $limit = 10;
        $result = $this->biz->list($offset, $limit);

        return $this->response->success($result);
    }
}
