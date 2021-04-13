<?php

namespace App\Http\Livewire\Backend\Dashboard;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $totalUsers;
    public $totalPosts;
    public $totalCategories;
    public $totalViews;

    public function mount()
    {
        $this->totalUsers = User::all()->count();
        $this->totalPosts = Post::all()->count();
        $this->totalCategories = Category::all()->count();
        $this->totalViews = Post::select('views')->get()->sum('views');
    }

    public function render()
    {
        return view('livewire.backend.dashboard.index', [
            'posts' => Post::with('category', 'user')->limit(3)->latest()->get()
        ]);
    }
}
