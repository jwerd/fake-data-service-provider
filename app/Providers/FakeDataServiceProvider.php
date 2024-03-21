<?php

namespace App\Providers;

use App\Services\MockServices\JsonApiService;
use App\Services\MockServices\MockJsonApiService;
use Illuminate\Support\ServiceProvider;

class FakeDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        if (config('app.uses_fake_data') === false) {
            return;
        }

        $this->app->bind(JsonApiService::class, MockJsonApiService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
