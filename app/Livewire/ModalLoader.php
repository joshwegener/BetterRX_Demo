<?php

namespace App\Livewire;

use Livewire\Component;

class ModalLoader extends Component
{
    public $modalUrl;

    protected $listeners = ['loadModal'];

    public function loadModal($url)
    {
        $this->modalUrl = $url;
        $this->dispatchBrowserEvent('modal-open');
    }

    public function render()
    {
        return view('livewire.modal-loader');
    }
}