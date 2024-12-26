<?php

namespace App\Providers;

use Filament\Support\Assets\Css;
use Bavix\Wallet\WalletConfigure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentAsset;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Coolify
        if ($this->app->environment('production')) {
            URL::forceRootUrl(config('app.url'));
        }

        Model::unguard();
        WalletConfigure::ignoreMigrations();
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['pt_BR', 'en'])
                ->labels([
                    'pt_BR' => 'Português (BR)',
                    'en' => 'English',
                ])
                ->circular()
            ;
        });
    }
}
