<?php

namespace GIS\PrivacyPolicy;

use GIS\PrivacyPolicy\Helpers\PageDataActionsManager;
use GIS\PrivacyPolicy\Livewire\Web\Cookies\NotificationWire;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class PrivacyPolicyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/config/privacy-policy.php', 'privacy-policy');
        $this->initFacades();
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'pp');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->addLivewireComponents();
    }

    protected function initFacades(): void
    {
        $this->app->singleton("privacy-page-data-actions", function () {
            $managerClass = config("privacy-policy.customPageDataActionsManage") ?? PageDataActionsManager::class;
            return new $managerClass;
        });
    }

    protected function addLivewireComponents(): void
    {
        $component = config("privacy-policy.customNotificationComponent");
        Livewire::component(
            "pp-cookies-notification",
            $component ?? NotificationWire::class
        );
    }
}
