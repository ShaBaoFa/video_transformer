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

namespace Wlfpanda1012\VideoTransformer;

use OSS\Core\OssException;
use OSS\Credentials\StaticCredentialsProvider;
use OSS\Http\RequestCore_Exception;
use OSS\OssClient;
use Wlfpanda1012\VideoTransformer\Constants\VideoStyle;

class Transformer
{
    public const DEFAULT_TIMESTAMP = 7200;

    private OssClient $ossClient;

    private string $bucket;

    public function __construct(
        string $accessId,
        string $accessKey,
        string $endpoint,
        string $bucket,
        string $region
    ) {
        $provider = new StaticCredentialsProvider($accessId, $accessKey);
        $config = [
            'provider' => $provider,
            'endpoint' => $endpoint,
            'bucket' => $bucket,
            'signatureVersion' => OssClient::OSS_SIGNATURE_VERSION_V4,
            'region' => $region,
        ];
        $this->bucket = $bucket;
        $this->ossClient = new OssClient($config);
    }

    /**
     * @throws OssException
     * @throws RequestCore_Exception
     */
    public function toM3U8(string $source_object, VideoStyle $style): mixed
    {
        $target_object = 'living-hls/' . $style->name . '/' . $this->toObjectDir($source_object) . '/media.m3u8';
        $process = $style->value .
            '|sys/saveas' .
            ',o_' . $this->base64url_encode($target_object) .
            ',b_' . $this->base64url_encode($this->bucket);
        return $this->ossClient->asyncProcessObject($this->bucket, $source_object, $process);
    }

    public function previewM3U8(string $source_object, VideoStyle $style): string
    {
        $target_object = 'living-hls/' . $style->name . '/' . $this->toObjectDir($source_object) . '/media.m3u8';
        if (! $this->ossClient->doesObjectExist($this->bucket, $target_object)) {
            $result = $this->toM3U8($source_object, $style);
        }
        $option = ['x-oss-process' => 'hls/sign,live_1'];
        return $this->ossClient->signUrl($this->bucket, $target_object, self::DEFAULT_TIMESTAMP, OssClient::OSS_HTTP_GET, $option);
    }

    private function toObjectDir(string $object): string
    {
        $objName = substr($object, strrpos($object, '/') + 1);
        return str_replace('.', '-', $objName);
    }

    private function base64url_encode(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}
