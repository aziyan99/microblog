<?php

namespace App\View\Components\Frontend\Layouts;

use App\Models\Setting;
use Illuminate\View\Component;

class Topbar extends Component
{
    public $setting;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setting = Setting::first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.layouts.topbar');
    }
}
