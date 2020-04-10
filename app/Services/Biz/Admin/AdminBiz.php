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

namespace App\Services\Biz\Admin;

use App\Model\Admin;
use App\Services\Dao\AdminDao;
use App\Services\Services;
use App\Untils\JwtAuthInterface;
use Hyperf\Di\Annotation\Inject;

class AdminBiz extends Services
{
    /**
     * @Inject()
     * @var AdminDao
     */
    protected $dao;

    /**
     * @Inject()
     * @var JwtAuthInterface
     */
    protected $jwtAuth;

    public function login(array $data)
    {
        /** @var Admin $items */
        $items = $this->dao->login($data);

        $result['mobile'] = $items->mobile;
        $result['token'] = $this->jwtAuth->init($items->id)->getToken();

        return $result;
    }

    public function save(array $data)
    {
        /** @var Admin $items */
        $items = $this->dao->save($data);

        $result['mobile'] = $items->mobile;
        $result['token'] = $this->jwtAuth->init($items->id)->getToken();

        return $result;
    }
}
