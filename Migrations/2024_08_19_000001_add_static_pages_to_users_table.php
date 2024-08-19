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
        StaticPage::createSystemPage('Dashboard', 'dashboard');
        StaticPage::createSystemPage('Login', 'login');
        StaticPage::createSystemPage('Register', 'register');
        StaticPage::createSystemPage('Reset password', 'reset_password');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
