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

namespace App\Services\Biz\Xcx;

use App\Services\Dao\RemarkTypeDao;
use App\Services\Services;
use Hyperf\Di\Annotation\Inject;

class RemarkTypeBiz extends Services
{
    /**
     * @Inject
     * @var RemarkTypeDao
     */
    protected $dao;

    public function list($offset, $limit)
    {
        return $this->dao->list($offset, $limit);
    }
}
