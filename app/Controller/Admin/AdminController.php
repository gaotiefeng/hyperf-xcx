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

class AdminController extends IndexController
{
    public function login(LoginRequest $request)
    {
        $result = $request->validated();

        return $this->response->success($result);
    }
}
