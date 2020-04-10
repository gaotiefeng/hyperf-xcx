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

use App\Controller\AbstractController;
use App\Services\Biz\Xcx\RemarkTypeBiz;
use Hyperf\Di\Annotation\Inject;

class RemarkTypeController extends AbstractController
{
    /**
     * @Inject
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
