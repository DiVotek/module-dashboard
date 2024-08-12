<?php

namespace Modules\Dashboard\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Dashboard';

    public function boot(): void
    {
        $this->mergeConfigFrom(
            module_path('Dashboard', 'config/settings.php'),
            'settings'
        );
        $this->loadMigrations();
    }

    public function register(): void
    {
    }

    private function loadMigrations(): void
    {
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Migrations'));
    }
}
