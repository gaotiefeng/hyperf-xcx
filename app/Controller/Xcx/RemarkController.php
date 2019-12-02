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
use App\Job\TemplateJob;
use App\Request\Xcx\RemarkRequest;
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
        $limit = $this->request->input('limit', 10);

        $result = $this->biz->index($openId, $offset, $limit);

        return $this->response->success($result);
    }

    public function save(RemarkRequest $request)
    {
        $input = $request->validated();

        $result = $this->biz->save($input);

        queue_push(new TemplateJob($input),2);

        return $this->response->success($result);
    }
}