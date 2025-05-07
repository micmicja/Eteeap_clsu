<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SliderManager extends Component
{
    use WithFileUploads;

    public $tab = 'general';
    public $site_title;
    public $logo;
    public $favicon;

    public function mount()
    {
        $this->site_title = setting('site_title') ?? 'My Website';
    }

    public function saveSettings()
    {
        setting()->set('site_title', $this->site_title)->save();
        session()->flash('success', 'Settings saved successfully.');
    }

    public function uploadLogo()
    {
        if ($this->logo) {
            $this->logo->storeAs('public/uploads', 'logo.png');
            session()->flash('success', 'Logo uploaded successfully.');
        }
    }

    public function uploadFavicon()
    {
        if ($this->favicon) {
            $this->favicon->storeAs('public/uploads', 'favicon.png');
            session()->flash('success', 'Favicon uploaded successfully.');
        }
    }

    public function render()
    {
        return view('livewire.slider-manager');
    }
}
