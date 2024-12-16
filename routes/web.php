<?php

use App\Livewire\Packages;
use App\Livewire\Payment;
use App\Livewire\TenantCreate;
use App\Livewire\TenantList;
use App\Livewire\TenantRegister;
use App\Livewire\TenantSubscription;
use App\Livewire\TenantUserProfile;
use Illuminate\Support\Facades\Route;

Route::get('/', Packages::class);

Route::get('/tenant-user/register', TenantRegister::class)->name('tenant-user.register');

Route::get('/tenants', TenantList::class)->name('tenants.list');
Route::get('/tenants/create', TenantCreate::class)->name('tenants.create');

Route::get('/tenant-user/profile', TenantUserProfile::class)->name('tenant-user.profile');
Route::get('/tenants/subscriptions', TenantSubscription::class)->name('tenants.subscriptions');

