<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Setting;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        $setting = Setting::first();
        return view('livewire.frontend.about')
            ->extends('layouts.frontend', [
                'title' => "About me | $setting->name"
            ])
            ->section('main');
    }
}
