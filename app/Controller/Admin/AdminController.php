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

namespace App\Controller\Admin;

use App\Controller\IndexController;
use App\Request\Admin\LoginRequest;
use App\Services\Biz\Admin\AdminBiz;
use Hyperf\Di\Annotation\Inject;

class AdminController extends IndexController
{
    /**
     * @Inject
     * @var AdminBiz
     */
    protected $biz;

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $result = $this->biz->login($data);

        return $this->response->success($result);
    }

    public function register(LoginRequest $request)
    {
        $data = $request->validated();

        $result = $this->biz->save($data);

        return $this->response->success($result);
    }
}
