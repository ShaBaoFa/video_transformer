# video-transformer

```
composer require wlfpanda1012/video-transformer -oW
```

## Configuration

### Hyperf Publish config

```bash
php bin/hyperf.php vendor:publish wlfpanda1012/video-video-transformer
```

Config files:
```
+ ./config/autoload/translation.php
```

- ### Laravel Publish config
```
php artisan vendor:publish --tag=transformer-config
```

Config files:
```
+ ./config/translation.php
```

### Configuration

在.env 填入
```php
#aliyun
ALIYUN_OSS_ACCESS_ID=**************
ALIYUN_OSS_ACCESS_SECRET=**************
ALIYUN_OSS_BUCKET=bucket_name
```

## Usage
```php
$aliyun  = Config::get('transformer.aliyun');
$transformer = new Transformer($aliyun['accessId'],$aliyun['accessSecret'],$aliyun['endpoint'],$aliyun['bucketName'],$aliyun['region']);
var_dump($transformer->previewM3U8('video/2024-11/67298e3bbf920.mp4',VideoStyle::H264_M3U8_720P));
```
