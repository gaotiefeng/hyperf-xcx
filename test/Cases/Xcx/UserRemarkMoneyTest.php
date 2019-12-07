<?php


namespace HyperfTest\Cases\Xcx;


use HyperfTest\HttpTestCase;

class UserRemarkMoneyTest extends HttpTestCase
{
    public function testXcxUserRemarkMoneyIndex()
    {
        $res = $this->client->get('/user/remark/money/index',[
            'openid' => 'oCID10O8mXhkB2StEjNrL9wytUcU'
        ]);

        $this->assertSame(0,$res['code']);
    }
}