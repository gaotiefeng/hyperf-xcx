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

class AdminAdminTest extends \HyperfTest\HttpTestCase
{
    public function testAdminAdminLogin()
    {
        $res = $this->adminClient->post('/admin/login', [
            'mobile' => '15904432745',
            'password' => '123456',
        ]);

        $this->assertSame(0, $res['code']);
    }

    public function testAdminAdminRegister()
    {
        $mobile = rand(1000, 9999);
        $res = $this->adminClient->post('/admin/register', [
            'mobile' => '1590443' . $mobile,
            'password' => '123456',
        ]);

        $this->assertSame(0, $res['code']);
    }
}
