<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Post;
use App\Models\Setting;
use Livewire\Component;

class Read extends Component
{
    public $post;
    public $relatedPosts;

    public function mount($slug)
    {
        $this->post = Post::with('category', 'user')
            ->where('slug', $slug)
            ->first();
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
        return view('livewire.frontend.read')
            ->extends('layouts.frontend', [
                'title' => "$title | $setting->name"
            ])
            ->section('main');
    }
}
