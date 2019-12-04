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

return  [
    'app_id' => env('APP_ID', 'wx45d028d42222a99d'),
    'secret' => env('SECRET', '41e617fbfab0a1b244abf0a7a92e8c4a'),

    // 下面为可选项
    // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
    'response_type' => 'array',

    'log' => [
        'level' => 'debug',
        'file' => BASE_PATH . '/runtime/xcx/wechat.log',
    ],

    'client' => [
        'uri' => 'https://api.weixin.qq.com',
        'template_id' => [
            'remark_id' => 'jKuq4vYRjVhCSSW0i6ApPpDEVhXJol0XuH4cvg4fSN4',
            'page' => 'pages/index/index',
        ],
    ],
];
