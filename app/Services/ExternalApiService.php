<?php

namespace App\Services;

class ExternalApiService
{

    public function getResults(): array
    {
        $service = app(JsonApiService::class);

        $results = collect($service->request());

        if ($results->isEmpty()) {
            return [];
        }

        // Map our data to the expected format
        return $results->map(function ($result) {
            return [
                'USERID'    => data_get($result, 'userId'),
                'ID'        => data_get($result, 'id'),
                'TITLE'     => data_get($result, 'title'),
                'COMPLETED' => data_get($result, 'completed'),
            ];
        })->toArray();
    }
}
