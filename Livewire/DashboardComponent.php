<?php

namespace Modules\Dashboard\Livewire;

use App\Models\SystemPage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function mount()
    {
        if (Auth::check()) {
            return redirect()->to(dashboard_slug());
        }
    }
    public function render()
    {
        $page = SystemPage::query()->where('page_id', $this->page->id)->first();
        $design = 'page.default';
        if ($page && $page->design) {
            $design = $page->setting_key . '.' . $page->design;
        }
        return view('template::' . $design);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to(dashboard_slug());
    }
}
