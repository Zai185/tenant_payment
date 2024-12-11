<?php

use App\Livewire\Packages;
use App\Livewire\Payment;
use App\Livewire\TenantSignup;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tenant/sign-up', TenantSignup::class);
Route::get('/packages', Packages::class)->name('packages');
Route::get('/packages/payment', Payment::class)->name('packages.payment');
