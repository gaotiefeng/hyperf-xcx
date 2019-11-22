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

namespace App\Controller\Xcx;

use App\Controller\IndexController;
use App\Services\Biz\Xcx\RemarkBiz;
use Hyperf\Di\Annotation\Inject;

class RemarkController extends IndexController
{
    /**
     * @Inject
     * @var RemarkBiz
     */
    protected $biz;

    public function index()
    {
        $openId = $this->request->input('openid');
        $offset = $this->request->input('offset', 0);
        $limit = $this->request->input('limit', 0);

        $result = $this->biz->index($openId, $offset, $limit);

        return $this->response->success($result);
    }

    public function save()
    {
        $input = $this->request->all();

        $result = $this->biz->save($input);

        return $this->response->success($result);
    }
}
