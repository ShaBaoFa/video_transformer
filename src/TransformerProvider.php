<?php

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
        if (function_exists('config_path')) {
            $publishPath = config_path('transformer.php');
        } else {
            $publishPath = base_path('config/transformer.php');
        }
        $this->publishes([$configPath => $publishPath], 'transformer-config');
    }
    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/publish/transformer.php', 'transformer');
    }

}