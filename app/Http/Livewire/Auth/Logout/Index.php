<?php

namespace App\Http\Livewire\Auth\Logout;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return <<<'blade'
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="javascript:;" wire:click="logout"
                           aria-expanded="false">
                            <i class="mdi mdi-logout"></i>
                            <span class="hide-menu">Logout</span>
                        </a>
                    </li>
        blade;
    }

    public function logout()
    {
        \Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
