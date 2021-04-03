<?php

namespace App\Http\Livewire\Backend\Post;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $body;
    public $category_id;
    public $thumbnail;
    public $oldThumbnail;

    protected $rules = [
        'title' => 'required',
        'body' => 'required',
        'category_id' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->category_id = $post->category_id;
        $this->oldThumbnail = $post->thumbnail;
    }

    public function render()
    {
        return view('livewire.backend.post.edit', [
            'categories' => Category::all()
        ]);
    }

    public function update()
    {
        $validatedData = $this->validate();
        if($this->thumbnail){
            $oldThumbnail = $this->post->thumbnail;
            \Storage::disk('public')->delete($oldThumbnail);
            $thumbnail = $this->thumbnail->store('thumbnails', 'public');
            $this->post->update([
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'category_id' => $validatedData['category_id'],
                'body' => $validatedData['body'],
                'thumbnail' => $thumbnail
            ]);
        }else{
            $this->post->update([
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'category_id' => $validatedData['category_id'],
                'body' => $validatedData['body'],
                'thumbnail' => $this->oldThumbnail
            ]);
        }
        $this->resetForm();
        session()->flash('message', 'Post successfully updated.');
        return redirect()->route('post.index');
    }

    public function resetForm()
    {
        $this->title = "";
        $this->category_id = "";
        $this->body = "";
        $this->thumbnail = "";
        $this->oldThumbnail = "";
    }
}
