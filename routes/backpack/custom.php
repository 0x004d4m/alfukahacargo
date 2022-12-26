<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('contact-request', 'ContactRequestCrudController');
    Route::crud('company-type', 'CompanyTypeCrudController');
    Route::crud('legal-status', 'LegalStatusCrudController');
    Route::crud('country', 'CountryCrudController');
    Route::crud('state', 'StateCrudController');
    Route::crud('city', 'CityCrudController');
    Route::crud('company', 'CompanyCrudController');
    Route::crud('auction', 'AuctionCrudController');
    Route::crud('auction-location', 'AuctionLocationCrudController');
    Route::crud('cargo-type', 'CargoTypeCrudController');
    Route::crud('port', 'PortCrudController');
    Route::crud('rate', 'RateCrudController');
}); // this should be the absolute last line of this file
