<?php

namespace Modules\Dashboard\Livewire;

use App\Models\SystemPage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterComponent extends Component
{
    public $fields = [];
    public function mount()
    {
        $this->fields = [];
    }
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
            'fields.firstname' => 'required',
            'fields.lastname' => 'required',
            'fields.email' => 'required|email',
            'fields.password' => 'required|min:6',
        ]);
        $user = User::query()->create($this->fields);
        Auth::login($user);
        return redirect()->to(dashboard_slug());
    }
}
