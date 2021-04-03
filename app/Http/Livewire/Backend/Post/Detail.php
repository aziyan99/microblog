<?php

namespace App\Http\Livewire\Backend\Post;

use App\Models\Post;
use Livewire\Component;

class Detail extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.backend.post.detail');
    }
}
