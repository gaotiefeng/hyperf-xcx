<?php

declare(strict_types=1);

namespace App\Controller\Xcx;

use App\Constants\ErrorCode;
use App\Controller\IndexController;
use App\Exception\BusinessException;
use App\Services\Biz\Xcx\UserRemarkMoneyBiz;
use Hyperf\Di\Annotation\Inject;

class UserRemarkMoneyController extends IndexController
{
    /**
     * @Inject()
     * @var UserRemarkMoneyBiz
     */
    protected $biz;

    public function index()
    {
        $openid = $this->request->input('openid');

        if(empty($openid)) {
            throw new BusinessException(ErrorCode::OPENID_NOT_EXISTS);
        }

        $result = $this->biz->index($openid);

        return $this->response->success($result);
    }
}
