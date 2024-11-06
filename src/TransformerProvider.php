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

use Illuminate\Support\ServiceProvider;

class TransformerProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
    }

    public function boot()
    {
        $configPath = __DIR__ . '/publish/transformer.php';
        if (! function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen
            return;
        }
        $publishPath = config_path('transformer.php');
        $this->publishes([$configPath => $publishPath], 'transformer-config');
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/publish/transformer.php', 'transformer');
    }
}
