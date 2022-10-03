<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class QuoteController extends Controller
{
    private $quotes = [];

    public function index()
    {
        for ($i = 0; $i < 5; $i++) {
            $response = Http::get('https://api.kanye.rest/');
            $data = json_decode($response->body());
            array_push($this->quotes, $data->quote);
        }
        return response()->json([
            'message' => 'success',
            'quotes'  => $this->quotes
        ]);
    }
}
