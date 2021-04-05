<?php

namespace App\View\Components\Backend\Layouts;

use App\Models\Setting;
use Illuminate\View\Component;

class Topbar extends Component
{
    public $webName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $setting = Setting::first();
        $this->webName = $setting->name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.layouts.topbar');
    }
}
