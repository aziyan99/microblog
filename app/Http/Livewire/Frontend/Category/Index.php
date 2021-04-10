<?php

namespace App\Http\Livewire\Frontend\Category;

use App\Models\Category as CategoryData;
use App\Models\Setting;
use Livewire\Component;

class Index extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = CategoryData::all();
    }

    public function render()
    {
        $setting = Setting::first();
        return view('livewire.frontend.category.index')
            ->extends('layouts.frontend', [
                'title' => "Category | $setting->name"
            ])
            ->section('main');
    }
}
