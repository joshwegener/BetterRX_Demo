<?php

namespace App\Livewire;

use App\Services\NpiApiService;
use Livewire\Component;

class SearchProviders extends Component
{
    public $firstName;

    public function render(NpiApiService $api)
    {
        sleep(1); // simulate slow api call

        $results = $api->searchProviders();

        return view('livewire.search-providers')->with(compact('results'));
    }
}
