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

class RemarkTest extends \HyperfTest\HttpTestCase
{
    public function testXcxRemarkIndex()
    {
        $res = $this->client->get('/remark/index', [
            'offset' => 0,
            'limit' => 10,
            'openid' => 'oCID10O8mXhkB2StEjNrL9wytUcU',
        ]);

        $this->assertSame(0, $res['code']);
    }
}
