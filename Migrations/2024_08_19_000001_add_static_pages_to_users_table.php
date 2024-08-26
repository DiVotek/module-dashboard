<?php

use App\Models\StaticPage;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        StaticPage::createSystemPage('Dashboard', 'dashboard', 'dashboard', 'dashboard::dashboard-component');
        StaticPage::createSystemPage('Login', 'login', 'login', 'dashboard::login-component');
        StaticPage::createSystemPage('Register', 'register', 'register', 'dashboard::register-component');
        StaticPage::createSystemPage('Reset password', 'reset-password', 'reset-password', 'dashboard::reset-password-component');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
