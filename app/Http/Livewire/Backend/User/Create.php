<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;
    public $role;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'role' => 'required',
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
        return view('livewire.backend.user.create');
    }

    public function store()
    {
        $validatedData = $this->validate();
        User::create($validatedData + ['password' => bcrypt($validatedData['email'])]);
        $this->resetForm();
        session()->flash('message', 'User successfully saved.');
        return redirect()->route('user.index');
    }

    public function resetForm()
    {
        $this->name = "";
        $this->email = "";
        $this->role = "";
    }
}
