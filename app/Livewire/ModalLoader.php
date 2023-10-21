<?php

namespace App\Livewire;

use App\Services\NpiApiService;
use Livewire\Component;

class ModalLoader extends Component
{
    public string $npiNumber = '';
    public array $providerData = [];

    protected $listeners = ['open-modal' => 'loadModal'];

    public function loadModal(string $npiNumber, NpiApiService $api)
    {
        $this->npiNumber = $npiNumber;

        $results = $api->searchProviders([ 'npiNumber' => $this->npiNumber ]);
        $this->providerData = $results[0];
        $this->dispatch('modal-open');
    }

    public function render()
    {
        return view('livewire.modal-loader');
    }
}