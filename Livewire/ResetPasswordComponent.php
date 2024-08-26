<?php

namespace Modules\Dashboard\Livewire;

use App\Models\SystemPage;
use App\Models\User;
use Livewire\Component;

class ResetPasswordComponent extends Component
{
    public $email;
    public function render()
    {
        $page = SystemPage::query()->where('page_id', $this->page->id)->first();
        $design = 'page.default';
        if ($page && $page->design) {
            $design = $page->setting_key . '.' . $page->design;
        }
        return view('template::' . $design);    }

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        User::query()->where('email', $this->email)->first()->sendPasswordResetNotification('reset-password');
    }
}
