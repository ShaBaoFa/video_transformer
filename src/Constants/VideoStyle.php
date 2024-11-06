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

namespace Wlfpanda1012\VideoTransformer\Constants;

enum VideoStyle: string
{
    case H264_M3U8_720P = 'hls/m3u8,vcodec_h264,fps_25,fpsopt_1,s_960x,sopt_1,scaletype_fit,arotate_1,crf_26,acodec_aac,ar_44100,ac_2,ab_128000,abopt_1,st_5000,initd_30000';
    case H264_M3U8_540P = 'hls/m3u8,vcodec_h264,fps_25,fpsopt_1,s_720x,sopt_1,scaletype_fit,arotate_1,crf_25,acodec_aac,ar_44100,ac_2,ab_96000,abopt_1,st_10000,initd_30000';
    case H264_M3U8_360P = 'hls/m3u8,vcodec_h264,fps_25,fpsopt_1,s_480x,sopt_1,scaletype_fit,arotate_1,crf_25,acodec_aac,ar_44100,ac_2,ab_64000,abopt_1,st_10000,initd_30000';
    case H264_M3U8_1080P = 'hls/m3u8,vcodec_h264,fps_25,fpsopt_1,s_1920x,sopt_1,scaletype_fit,arotate_1,crf_26,acodec_aac,ar_44100,ac_2,ab_160000,abopt_1,st_5000,initd_30000';
}
