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

namespace App\Services\Formatter;

use App\Model\RemarkType;

class RemarkTypeFormatter extends Formatter
{
    public function base(RemarkType $model)
    {
        $result = [
            'id' => $model->id,
            'name' => $model->name,
        ];
        if ($model->display == 1) {
            $result['checked'] = true;
        }

        return $result;
    }
}
