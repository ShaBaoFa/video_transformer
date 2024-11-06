<?php

namespace Wlfpanda1012\VideoTransformer;

use Illuminate\Support\ServiceProvider;

class TransformerProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/publish/transformer.php', 'transformer');
    }

}