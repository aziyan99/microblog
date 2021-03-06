<?php

namespace App\Http\Livewire\Backend\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{

    public $name;

    protected $rules = [
        'name' => 'required|unique:categories,name'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        return view('livewire.backend.category.create', [
            'slug' => Str::slug($this->name)
        ]);
    }

    public function store()
    {
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        $validatedData = $this->validate();
        Category::create([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name'])
        ]);
        $this->resetForm();
        session()->flash('message', 'Category successfully saved.');
        return redirect()->route('category.index');
    }

    public function resetForm()
    {
        $this->name = "";
    }
}
