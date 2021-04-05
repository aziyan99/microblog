<?php

namespace App\Http\Livewire\Backend\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    public $category;
    public $name;

    public function mount(Category $category)
    {
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        $this->category = $category;
        $this->name = $category->name;
    }

    public function render()
    {
        return view('livewire.backend.category.edit', [
            'slug' => Str::slug($this->name)
        ]);
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => "required|unique:categories,name," . $this->category->id
        ]);
        $this->category->update([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name'])
        ]);
        $this->resetForm();
        session()->flash('message', 'Category successfully updated.');
        return redirect()->route('category.index');
    }

    public function resetForm()
    {
        $this->name = "";
    }
}
