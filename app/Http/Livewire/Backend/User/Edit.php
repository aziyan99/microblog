<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $email;
    public $role;
    public $userId;

    public function mount(User $user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->userId = $user->id;
    }
    public function render()
    {
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        return view('livewire.backend.user.edit');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'role' => 'required'
        ]);
        $user = User::find($this->userId);
        $user->update($validatedData);
        session()->flash('message', 'User successfully updated.');
        return redirect()->route('user.index');
    }
}
