<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JsonApiService
{
    private string $url = 'https://jsonplaceholder.typicode.com';

    public function request(): array
    {
        // make some request to external API
        return Http::baseUrl($this->url)->get('/todos')->json();
    }
}
