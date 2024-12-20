<?php

use App\Livewire\Packages;
use App\Livewire\Payment;
use App\Livewire\TenantRegister;
use Illuminate\Support\Facades\Route;

Route::get('/', Packages::class);

Route::get('/tenant/sign-up', TenantRegister::class);

