<?php

namespace Modules\Dashboard\Livewire;

use App\Models\User;
use Livewire\Component;

class ResetPasswordComponent extends Component
{
    public $email;
    public function render()
    {
        return view('dashboard::livewire.reset-password-component');
    }

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        User::query()->where('email', $this->email)->first()->sendPasswordResetNotification('reset-password');
    }
}
