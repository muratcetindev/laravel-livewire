<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Quote extends Component
{
    public $quotes;
    public $fetching = false;
    public function mount()
    {
        $this->getQuotes();
    }
    public function render()
    {
        return view('livewire.quote');
    }
    public function getQuotes()
    {
        $this->fetching = true;
        $this->quotes = [];
        for ($i = 0; $i < 5; $i++) {
            $response = Http::get('https://api.kanye.rest/');
            $data = json_decode($response->body());
            array_push($this->quotes, $data->quote);
        }
        $this->fetching = false;
    }
}
