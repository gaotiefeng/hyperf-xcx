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
class RemarkTypeTest extends HttpTestCase
{
    public function testXcxRemarkTypeIndex()
    {
        $res = $this->client->get('/remark/type/index', [
            'offset' => 0,
            'limit' => 10,
        ]);

        $this->assertSame(0, $res['code']);
    }
}
