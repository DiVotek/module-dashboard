<?php

namespace Modules\Dashboard\Livewire;

use App\Actions\GetCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('dashboard::livewire.login-component');
    }

    public function submit()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $isAuth = Auth::attempt(['email' => $this->email, 'password' => $this->password]);
        if ($isAuth) {
            if (module_enabled('Order')) {
                $cart = GetCart::run();
                if ($cart && !$cart->user_id) {
                    $cart->update(['user_id' => Auth::id()]);
                }
            }
            return redirect()->to(dashboard_slug());
        }
        $this->addError('email', 'Email or password is incorrect');
    }
}
