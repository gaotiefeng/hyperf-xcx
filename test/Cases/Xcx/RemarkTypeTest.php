<?php


namespace HyperfTest\Cases\Xcx;


use HyperfTest\HttpTestCase;

class RemarkTypeTest extends HttpTestCase
{
    public function testXcxRemarkTypeIndex()
    {
        $res = $this->client->get('/remark/type/index',[
            'offset' => 0,
            'limit' => 10,
        ]);

        $this->assertSame(0,$res['code']);
    }

}