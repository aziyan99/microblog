<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Post;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $limitPerPage = 3;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function render()
    {
        $posts = null;
        $posts = Post::with('category', 'user')
            ->latest()
            ->paginate($this->limitPerPage);


        $setting = Setting::first();

        return view('livewire.frontend.home.index', [
            'posts' => $posts
        ])
            ->extends('layouts.frontend', [
                'title' => "Home | $setting->name",
            ])
            ->section('main');
    }

    public function loadMore()
    {
        $this->limitPerPage += 1;
    }
}
