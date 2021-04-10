<?php

namespace App\Http\Livewire\Frontend\Read;

use App\Models\Post;
use App\Models\Setting;
use Livewire\Component;

class Index extends Component
{
    public $post;
    public $relatedPosts;

    public function mount($slug)
    {
        $this->post = Post::with('category', 'user')
            ->where('slug', $slug)
            ->first();
        if($this->post == null){
            abort(404);
        }
        $this->relatedPosts = Post::where('category_id', $this->post->category_id)
            ->limit(4)
            ->latest()
            ->get();
        $this->post->views += 1;
        $this->post->save();
    }

    public function render()
    {
        $title = $this->post->title;
        $setting = Setting::first();
        return view('livewire.frontend.read.index')
            ->extends('layouts.frontend', [
                'title' => "$title | $setting->name"
            ])
            ->section('main');
    }
}
