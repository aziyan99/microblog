<?php

namespace App\View\Components\Backend\Layouts;

use App\Models\Message;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $inboxCount = 0;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->inboxCount = Message::where('receiver_id', auth()->user()->id)->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.layouts.sidebar');
    }
}
