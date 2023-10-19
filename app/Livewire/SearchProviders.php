<?php

namespace App\Livewire;

use Livewire\Component;

class SearchProviders extends Component
{
    public $firstName;

    public function render()
    {
        sleep(1); // simulate slow api call

        $results = ['test 1', 'test 2']; // get results from api

        return view('livewire.search-providers')->with(compact('results'));
    }
}
