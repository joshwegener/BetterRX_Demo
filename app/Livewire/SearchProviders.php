<?php

namespace App\Livewire;

use App\Services\NpiApiService;
use Livewire\Component;

class SearchProviders extends Component
{
    public string $firstName = '';
    public string $lastName = '';
    public string $npiNumber = '';
    public string $taxonomyDescription = '';
    public string $city = '';
    public string $state = '';
    public string $zip = '';
    public int $pageNumber = 0;
    public bool $hasMorePages = false;

    public function render(NpiApiService $api)
    {
        $filters = [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'npiNumber' => $this->npiNumber,
            'taxonomyDescription' => $this->taxonomyDescription,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ];

        $results = $api->searchProviders($filters, $this->pageNumber);
        $this->hasMorePages = (bool) count($api->searchProviders($filters, $this->pageNumber + 1));

        return view('livewire.search-providers')->with(compact('results'));
    }
}
