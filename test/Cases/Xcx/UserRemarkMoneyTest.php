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

namespace HyperfTest\Cases\Xcx;

use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class UserRemarkMoneyTest extends HttpTestCase
{
    public function testXcxUserRemarkMoneyIndex()
    {
        $res = $this->client->get('/user/remark/money/index', [
            'openid' => 'oCID10O8mXhkB2StEjNrL9wytUcU',
        ]);

        $this->assertSame(0, $res['code']);
    }
}
