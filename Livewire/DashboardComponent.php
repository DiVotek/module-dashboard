<?php

namespace Modules\Dashboard\Livewire;

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
        return view('dashboard::livewire.dashboard-component');
    }

    public function changeData(){

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to(dashboard_slug());
    }
}
