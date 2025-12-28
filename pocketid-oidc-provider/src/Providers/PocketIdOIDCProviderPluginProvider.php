<?php

namespace Spoocy99\PocketIdOIDCProvider\Providers;

use App\Extensions\OAuth\OAuthService;
use Illuminate\Support\ServiceProvider;
use Spoocy99\PocketIdOIDCProvider\Extensions\OAuth\Schemas\PocketIdSchema;

class PocketIdOIDCProviderPluginProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->app->afterResolving(OAuthService::class, function (OAuthService $service) {
            $service->register(new PocketIdSchema());
        });
    }
}
