<?php

use App\Services\ExternalApiService;
use App\Services\JsonApiService;

it('tests that ExternalApiService getResults returns the expected data structure', function () {
    // Mock the JsonApiService
    $jsonApiService = mock(JsonApiService::class);

    // Define the behavior of the request method on the mock object
    $jsonApiService->shouldReceive('request')->andReturn([
        [
            'userId' => 1,
            'id' => 1,
            'title' => 'test title',
            'completed' => false,
        ]
    ]);

    // Bind the mock instance into the service container
    $this->instance(JsonApiService::class, $jsonApiService);

    // Create an instance of ExternalApiService
    $externalApiService = resolve(ExternalApiService::class);

    // Call the getResults method
    $results = $externalApiService->getResults();

    // Assertions
    expect($results)->toBeArray();
    foreach ($results as $result) {
        expect($result)->toHaveKeys(['USERID', 'ID', 'TITLE', 'COMPLETED']);
    }
});

it('tests that ExternalApiService getResults returns an empty array when the api returns an empty array', function () {
    // Mock the JsonApiService
    $jsonApiService = mock(JsonApiService::class);

    // Define the behavior of the request method on the mock object
    $jsonApiService->shouldReceive('request')->andReturn([]);

    // Bind the mock instance into the service container
    $this->instance(JsonApiService::class, $jsonApiService);

    // Create an instance of ExternalApiService
    $externalApiService = resolve(ExternalApiService::class);

    // Call the getResults method
    $results = $externalApiService->getResults();

    // Assertions
    expect($results)->toBeArray()->and($results)->toBeEmpty();
});
