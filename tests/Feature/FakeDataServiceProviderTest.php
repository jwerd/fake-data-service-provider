<?php

use App\Providers\FakeDataServiceProvider;
use App\Services\JsonApiService;
use App\Services\MockServices\MockJsonApiService;

it('tests that FakeDataServiceProvider binds JsonApiService to MockJsonApiService when app.uses_fake_data is true', function () {
    // Set the configuration to use fake data
    config(['app.uses_fake_data' => true]);

    // Create an instance of FakeDataServiceProvider
    $fakeDataServiceProvider = new FakeDataServiceProvider(app());

    // Call the register method
    $fakeDataServiceProvider->register();

    // Assertions
    expect(app(JsonApiService::class))->toBeInstanceOf(MockJsonApiService::class);
});

it('tests that FakeDataServiceProvider will not bind anything if app.uses_fake_data is false', function () {
    // Set the configuration to use real data
    config(['app.uses_fake_data' => false]);

    // Create an instance of FakeDataServiceProvider
    $fakeDataServiceProvider = new FakeDataServiceProvider(app());

    // Assertions
    expect($fakeDataServiceProvider->register())->toBe(null);
});
