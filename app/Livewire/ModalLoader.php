<?php

namespace App\Livewire;

use Livewire\Component;

class ModalLoader extends Component
{
    public $modalUrl;
    protected $listeners = ['open-modal' => 'loadModal'];

    public function loadModal($data)
    {
        $this->modalUrl = $data['url'];
        $this->dispatchBrowserEvent('modal-open');
    }

    public function render()
    {
        return view('livewire.modal-loader');
    }
}