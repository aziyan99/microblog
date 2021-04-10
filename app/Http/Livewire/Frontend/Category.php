<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Setting;
use App\Models\Category as CategoryData;
use Livewire\Component;

class Category extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = CategoryData::all();
    }

    public function render()
    {
        $setting = Setting::first();
        return view('livewire.frontend.category')
            ->extends('layouts.frontend', [
                'title' => "Category | $setting->name"
            ])
            ->section('main');
    }
}
