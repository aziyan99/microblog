<?php

namespace App\Http\Livewire\Backend\Setting;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    use WithFileUploads;

    public $name;
    public $instagram;
    public $youtube;
    public $facebook;
    public $address;
    public $phone_number;
    public $logo;
    public $short_desc;
    public $oldLogo;

    protected $rules = [
        'name' => 'required',
        'youtube' => 'required',
        'facebook' => 'required',
        'instagram' => 'required',
        'address' => 'required',
        'phone_number' => 'required',
        'short_desc' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $setting = Setting::first();
        $this->name = $setting->name;
        $this->instagram = $setting->instagram;
        $this->facebook = $setting->facebook;
        $this->address = $setting->address;
        $this->youtube = $setting->youtube;
        $this->phone_number = $setting->phone_number;
        $this->short_desc = $setting->short_desc;
        $this->oldLogo = $setting->logo;
    }

    public function render()
    {
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        return view('livewire.backend.setting.index');
    }

    public function updateInformations()
    {
        $validatedData = $this->validate();
        $setting = Setting::first();
        $setting->update($validatedData);
        session()->flash('message', 'Web informations updated.');
        return redirect()->route('setting');
    }

    public function updateLogo()
    {
        $this->validate([
            'logo' => 'image|required|max:1024'
        ]);
        \Storage::disk('public')->delete($this->oldLogo);
        $logo = $this->logo->store('logo', 'public');
        $setting = Setting::first();
        $setting->update(['logo' => $logo]);
        session()->flash('message', 'Web logo updated.');
        return redirect()->route('setting');
    }
}
