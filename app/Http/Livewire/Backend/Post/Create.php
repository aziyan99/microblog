<?php

namespace App\Http\Livewire\Backend\Post;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $category_id;
    public $thumbnail;

    protected $rules = [
        'title' => 'required',
        'body' => 'required',
        'category_id' => 'required',
        'thumbnail' => 'required|image|max:1024'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.backend.post.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate();
        $thumbnail = $this->thumbnail->store('thumbnails', 'public');
        Post::create([
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title']),
            'category_id' => $validatedData['category_id'],
            'body' => $validatedData['body'],
            'thumbnail' => $thumbnail
        ]);
        $this->resetForm();
        session()->flash('message', 'Post successfully saved.');
        return redirect()->route('post.index');
    }

    public function resetForm()
    {
        $this->title = "";
        $this->category_id = "";
        $this->body = "";
        $this->thumbnail = "";
    }
}
