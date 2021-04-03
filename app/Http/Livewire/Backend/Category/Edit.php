<?php

namespace App\Http\Livewire\Backend\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    public $category;
    public $name;

    protected $rules = [
        'name' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Category $category)
    {
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
        $validatedData = $this->validate();
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
