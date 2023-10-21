<?php

namespace App\Livewire;

use Livewire\Component;

class ModalLoader extends Component
{
    public $modalUrl;
    protected $listeners = ['open-modal' => 'loadModal'];

    public function loadModal($url)
    {
        $this->modalUrl = $url;
        $this->dispatch('modal-open');
    }

    public function render()
    {
        return view('livewire.modal-loader');
    }
}