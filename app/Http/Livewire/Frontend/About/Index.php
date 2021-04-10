<?php

namespace App\Http\Livewire\Frontend\About;

use App\Models\Setting;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $setting = Setting::first();
        return view('livewire.frontend.about.index')
            ->extends('layouts.frontend', [
                'title' => "About me | $setting->name"
            ])
            ->section('main');
    }
}
