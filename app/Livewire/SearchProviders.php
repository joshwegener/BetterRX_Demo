<?php

namespace App\Livewire;

use App\Services\NpiApiService;
use Livewire\Component;

class SearchProviders extends Component
{
    public $firstName;

    public function render(NpiApiService $api)
    {
        $results = $api->searchProviders(compact(
            'firstName'
        ));

        return view('livewire.search-providers')->with(compact('results'));
    }
}
