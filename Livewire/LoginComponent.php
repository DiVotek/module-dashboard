<?php

namespace Modules\Dashboard\Livewire;

use App\Actions\GetCart;
use App\Models\SystemPage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email;
    public $password;

    public function render()
    {
        $page = SystemPage::query()->where('page_id', $this->page->id)->first();
        $design = 'page.default';
        if ($page && $page->design) {
            $design = $page->setting_key . '.' . $page->design;
        }
        return view('template::' . $design);
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
