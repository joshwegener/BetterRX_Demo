<?php

namespace App\Livewire;

use App\Services\NpiApiService;
use Livewire\Component;

class SearchProviders extends Component
{
    public $firstName;
    public $lastName;
    public $npiNumber;
    public $taxonomyDescription;
    public $city;
    public $state;
    public $zip;

    public function render(NpiApiService $api)
    {
        $results = $api->searchProviders([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'npiNumber' => $this->npiNumber,
            'taxonomyDescription' => $this->taxonomyDescription,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ]);

        return view('livewire.search-providers')->with(compact('results'));
    }
}
