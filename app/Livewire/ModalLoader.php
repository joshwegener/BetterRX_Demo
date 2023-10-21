<?php

namespace App\Livewire;

use Livewire\Component;

class ModalLoader extends Component
{
    public string $npiNumber = '';

    protected $listeners = ['open-modal' => 'loadModal'];

    public function loadModal(string $npiNumber)
    {
        $this->npiNumber = $npiNumber;
        //$this->dispatch('modal-open');
    }

    public function render()
    {
        return view('livewire.modal-loader');
    }
}