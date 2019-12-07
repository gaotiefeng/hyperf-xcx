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

use App\Kernel\Helper\ModelHelper;
use App\Model\Remark;
use App\Model\User;
use App\Model\UserRemarkMoney;
use App\Services\Dao\UserDao;
use App\Services\Dao\UserRemarkMoneyDao;
use App\Services\Formatter\RemarkFormatter;
use App\Services\Services;
use Hyperf\DbConnection\Db;
use Swoole\Exception;

class RemarkBiz extends Services
{
    public function index(string $openId, $offset, $limit)
    {
        $model = Remark::query()->orderBy('id', 'desc');

        $model->where('openid', '=', $openId);

        [$count, $items] = ModelHelper::pagination($model, $offset, $limit);

        $result['count'] = $count;
        $result['items'] = [];
        foreach ($items as $item) {
            /* @var Remark $item */
            $result['items'][] = RemarkFormatter::instance()->detail($item, $item->remarkType);
        }

        return $result;
    }

    public function save(array $data)
    {
        Db::beginTransaction();
        try {
            $model = new Remark();

            $model->money = $data['money'] * 100;
            $model->openid = $data['openid'];
            $model->type_id = $data['type'];
            $model->remark = $data['content'];
            $model->save();

            $userRemark = di(UserRemarkMoneyDao::class)->first($data['openid'], $data['type'],false);
            if (empty($userRemark)) {
                $userRemark = new UserRemarkMoney();
            }
            $userRemark->openid = $data['openid'];
            $userRemark->type_id = $data['type_id'];
            $userRemark->money += $data['money'];
            $userRemark->save();

            /** @var User $userModel */
            $userModel = di(UserDao::class)->first($data['openid'],true);
            $userModel->money += $data['money'];
            $userModel->save();

            Db::commit();
            return $model;
        }catch (Exception $exception){
            Db::rollBack();
            $this->logger->error('remark save '.$exception->getMessage());
            return false;
        }
    }
}
