<?php

namespace Modules\Dashboard\Controllers;

use App\Models\StaticPage;
use Illuminate\Support\Facades\Blade;
use Modules\Dashboard\Components\DashboardPage;
use Modules\Dashboard\Components\LoginPage;
use Modules\Dashboard\Components\RegisterPage;
use Modules\Dashboard\Components\ResetPasswordPage;

class DashboardController
{
    public function dashboard(string $dashboardSlug)
    {
        $dashboard = StaticPage::query()->where('slug', $dashboardSlug)->first();
        if ($dashboard) {
            return Blade::renderComponent(new DashboardPage($dashboard));
        }
        abort(404);
    }

    public function login(string $loginSlug)
    {
        $login = StaticPage::query()->where('slug', $loginSlug)->first();
        if ($login) {
            return Blade::renderComponent(new LoginPage($login));
        }
        abort(404);
    }

    public function register(string $registerSlug)
    {
        $register = StaticPage::query()->where('slug', $registerSlug)->first();
        if ($register) {
            return Blade::renderComponent(new RegisterPage($register));
        }
        abort(404);
    }

    public function reset_password(string $reset_passwordSlug)
    {
        $reset_password = StaticPage::query()->where('slug', $reset_passwordSlug)->first();
        if ($reset_password) {
            return Blade::renderComponent(new ResetPasswordPage($reset_password));
        }
        abort(404);
    }
}
