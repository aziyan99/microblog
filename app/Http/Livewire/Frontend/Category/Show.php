<?php

namespace App\Http\Livewire\Frontend\Category;

use App\Models\Post;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $slug = null;
    public $limitPerPage = 3;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $posts = null;
        $posts = \App\Models\Category::with('posts')
            ->where('categories.slug', $this->slug)
            ->first();

        if ($posts == null){
            abort(404);
        }

        $setting = Setting::first();

        return view('livewire.frontend.category.show', [
            'posts' => $posts
        ])
            ->extends('layouts.frontend', [
                'title' => "Category | $setting->name",
            ])
            ->section('main');
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }
}
