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
        /*$array1 = [0,1,2,3,4,5,6,7,8,9];
        $array2 = [0,1,2,3,4,5,6,7,8,9];
        $array3 = [0,1,2,3,4,5,6,7,8,9];
        $array4 = [0,1,2,3,4,5,6,7,8,9];
        $array5 = [0,1,2,3,4,5,6,7,8,9];
        $array6 = [0,1,2,3,4,5,6,7,8,9];
        $result = $this->combineDika($array1,$array2,$array3,$array4,$array5,$array6);
        file_put_contents(__DIR__.'/log/number.json',json_encode($result));*/

        /*$t1 = microtime(true);
        $str = file_get_contents(__DIR__.'/number.txt');
        $t2 = microtime(true);
        echo $t2 - $t1;
        $array = json_decode($str);
        $key = array_rand($array,1);
        $t3 = microtime(true);
        echo PHP_EOL;
        echo $t3 - $t2;
        var_dump($key);
        var_dump($array[$key]);
        var_dump(count($array));
        echo PHP_EOL;
        $t4 = microtime(true);
        array_splice($array,$key,1);
        var_dump(count($array));
        file_put_contents(__DIR__.'/number.txt',json_encode($array));*/

        $data = $request->validated();

        $result = $this->biz->save($data);

        return $this->response->success($result);
    }

    function combineDika() {

        $data = func_get_args();
        $cnt = count($data);
        $result = array();
        foreach($data[0] as $item) {
            $result[] = array($item);
        }
        for($i = 1; $i < $cnt; $i++) {
            $result = $this->combineArray($result,$data[$i]);
        }
        $str = [];
        foreach($result as $va) {
            $strN = 'AF';
            foreach ($va as $j) {
                $strN = $strN.$j;
            }
            array_push($str,$strN);
        }
        return $str;
    }

    function combineArray($arr1,$arr2) {

        $result = array();
        foreach ($arr1 as $item1) {
            foreach ($arr2 as $item2) {
                $temp = $item1;
                $temp[] = $item2;
                $result[] = $temp;
            }
        }
        return $result;
    }
}
