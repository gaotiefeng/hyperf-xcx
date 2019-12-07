<?php

declare(strict_types=1);

namespace App\Controller\Xcx;

use App\Controller\IndexController;
use App\Services\Biz\Xcx\UserRemarkMoneyBiz;
use Hyperf\Di\Annotation\Inject;

class UserRemarkMoney extends IndexController
{
    /**
     * @Inject()
     * @var UserRemarkMoneyBiz
     */
    protected $biz;

    public function index()
    {
        $openid = $this->request->input('openid');

        $result = $this->biz->index($openid);

        return $this->response->success($result);
    }
}
