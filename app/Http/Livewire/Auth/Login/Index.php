<?php

namespace App\Http\Livewire\Auth\Login;

use Livewire\Component;

class Index extends Component
{
    public $email;
    public $password;
    public $isShowPassword = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.auth.login.index')
            ->extends('layouts.auth')
            ->section('main');
    }

    public function showPassword()
    {
        if($this->isShowPassword){
            $this->isShowPassword = false;
        }else{
            $this->isShowPassword = true;
        }
    }

    public function authenticate()
    {
        $validatedData = $this->validate();
        if(\Auth::attempt($validatedData)){
            request()->session()->regenerate();
            return redirect()->intended('backend/dashboard');
        }
        session()->flash('message', 'Invalid credentials!');
    }
}
