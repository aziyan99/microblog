<?php

namespace App\Http\Livewire\Backend\Profile;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public $email;
    public $role;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->role = auth()->user()->role;
    }

    public function render()
    {
        return view('livewire.backend.profile.index');
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $user = User::find(auth()->user()->id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        session()->flash('message', 'Profile successfully updated.');
    }

    public function updatePassword()
    {
        $this->validate([
            'password' => 'required|min:6|confirmed'
        ]);
        $user = User::find(auth()->user()->id);
        $user->update([
            'password' => bcrypt($this->password)
        ]);
        session()->flash('message', 'Password successfully updated.');
        $this->clearPasswordForm();
    }

    public function clearPasswordForm()
    {
        $this->password = "";
        $this->password_confirmation = "";
    }
}
