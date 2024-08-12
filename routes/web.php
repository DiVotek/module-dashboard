<?php

use App\Models\StaticPage;
use App\Models\SystemPage;
use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Controllers\DashboardController;

function dashboard_slug()
{
    $dashboardPage = StaticPage::query()->where('id', SystemPage::query()->where('name', 'Dashboard')->first()->page_id ?? 0)->first();
    return $dashboardPage && $dashboardPage->slug ? $dashboardPage->slug : 'dashboard';
}
function login_slug()
{
    $loginPage = StaticPage::query()->where('id', SystemPage::query()->where('name', 'Login')->first()->page_id ?? 0)->first();
    return $loginPage && $loginPage->slug ? $loginPage->slug : 'login';
}
function register_slug()
{
    $registerPage = StaticPage::query()->where('id', SystemPage::query()->where('name', 'Register')->first()->page_id ?? 0)->first();
    return $registerPage && $registerPage->slug ? $registerPage->slug : 'register';
}
function reset_password_slug()
{
    $reset_passwordPage = StaticPage::query()->where('id', SystemPage::query()->where('name', 'Reset password')->first()->page_id ?? 0)->first();
    return $reset_passwordPage && $reset_passwordPage->slug ? $reset_passwordPage->slug : 'reset_password';
}
Route::get(login_slug(), [DashboardController::class, 'login'])->name('login');
Route::get(register_slug(), [DashboardController::class, 'register'])->name('register');
Route::get(reset_password_slug(), [DashboardController::class, 'reset_password'])->name('reset_password');
Route::get(dashboard_slug(), [DashboardController::class, 'dashboard'])->name('dashboard');
