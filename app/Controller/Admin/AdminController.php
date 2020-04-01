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
//        $str = '{"NextValid":true,"NextTime":1585559207267,"RequestId":"8A4D2819-5C3F-42A5-A300-FD24209F4643","PropertyDataInfos":{"PropertyDataInfo":[{"Identifier":"Temperature","List":{"PropertyInfo":[{"Value":"16","Time":1585709623222},{"Value":"16","Time":1585561102630},{"Value":"16","Time":1585560866885},{"Value":"16","Time":1585559809114}]}},{"Identifier":"RiceWeight","List":{"PropertyInfo":[{"Value":"4","Time":1585709622742},{"Value":"4","Time":1585561102249},{"Value":"4","Time":1585560866710},{"Value":"4","Time":1585559808810},{"Value":"5","Time":1585559207268}]}},{"Identifier":"ALARM1","List":{"PropertyInfo":[{"Value":"0","Time":1585709623237},{"Value":"0","Time":1585561103103},{"Value":"0","Time":1585560867198},{"Value":"0","Time":1585559809780}]}}]},"Code":"","Success":true}';
//
//        $arr = json_decode($str,true);
//        $arr3 = $arr['PropertyDataInfos']['PropertyDataInfo'];
//        $Identifier = [];
//        foreach ($arr3 as $k=> $v) {
//            var_dump($v['Identifier']);
//            if ($v['Identifier'] == "Temperature") {
//                var_dump($v['List']['PropertyInfo'][0]['Value']);
//            }
//            if ($v['Identifier'] == "RiceWeight") {
//                var_dump($v['List']['PropertyInfo'][0]['Value']);
//            }
//            if ($v['Identifier'] == "ALARM1") {
//                var_dump($v['List']['PropertyInfo'][0]['Value']);
//            }
//        }
        $data = $request->validated();

        $result = $this->biz->save($data);

        return $this->response->success();
    }


}
