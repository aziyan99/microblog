<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Post;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $slug = null;
    public $isShowByCategory = false;
    public $limitPerPage = 3;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount($slug = null)
    {
        if($slug != null){
            $this->slug = $slug;
        }
    }

    public function render()
    {
        $posts = null;
        if ($this->slug == null){
            $posts = Post::with('category', 'user')
                ->latest()
                ->paginate($this->limitPerPage);
        }else{
            $this->isShowByCategory = true;
            $posts = \App\Models\Category::with('posts')
                ->where('categories.slug', $this->slug)
                ->first();
        }

        $setting = Setting::first();

        return view('livewire.frontend.home', [
            'posts' => $posts
            ])
            ->extends('layouts.frontend', [
                'title' => "Home | $setting->name",
            ])
            ->section('main');
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }
}
