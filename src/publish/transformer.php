<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    'aliyun' => [
        'accessId' => \Hyperf\Support\env('ALIYUN_OSS_ACCESS_ID'),
        'accessSecret' => \Hyperf\Support\env('ALIYUN_OSS_ACCESS_SECRET'),
        'bucketName' => \Hyperf\Support\env('ALIYUN_OSS_BUCKET'),
        'endpoint' => \Hyperf\Support\env('ALIYUN_OSS_ENDPOINT', 'https://oss-cn-hangzhou.aliyuncs.com'),
        'region' => \Hyperf\Support\env('ALIYUN_OSS_REGION', 'cn-hangzhou'),
    ],
];
