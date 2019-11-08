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

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("Server Error！")
     */
    const SERVER_ERROR = 500;

    /**
     * @Message("mobile exists！")
     */
    const MOBILE_EXISTS = 14001;

    /**
     * @Message("password error！")
     */
    const PASSWORD_ERROR = 14002;

    /**
     * @Message("mobile not exists！")
     */
    const MOBILE_NOT_EXISTS = 14002;

    /**
     * @Message("Token Error！")
     */
    const NOT_TOKEN = 14000;

    /**
     * @Message("参数错误！")
     */
    const PARAMETER_ERROR = 15000;
}
