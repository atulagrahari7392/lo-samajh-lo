<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AI\AIProviderInterface;
use App\Services\AI\AIService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AIProviderInterface::class, function ($app) {
            return new AIService();
        });
        
        // Notification service bindings can be added here
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
