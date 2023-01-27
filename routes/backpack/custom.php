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
    Route::crud('department', 'DepartmentCrudController');
    Route::crud('branch', 'BranchCrudController');
    Route::crud('loading-status', 'LoadingStatusCrudController');
    Route::crud('order-status', 'OrderStatusCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('inspection', 'InspectionCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('document', 'DocumentCrudController');
    Route::crud('note', 'NoteCrudController');
    Route::crud('part', 'PartCrudController');
    Route::crud('addon-service', 'AddonServiceCrudController');
    Route::crud('insurance', 'InsuranceCrudController');
    Route::crud('order-type', 'OrderTypeCrudController');
    Route::crud('payment-method', 'PaymentMethodCrudController');
    Route::crud('payment', 'PaymentCrudController');
    Route::crud('invoice', 'InvoiceCrudController');
    Route::crud('location', 'LocationCrudController');
}); // this should be the absolute last line of this file
