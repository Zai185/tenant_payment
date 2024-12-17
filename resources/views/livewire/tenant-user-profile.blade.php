@extends('layouts.dashboard')
@section('content')
<div class="bg-white p-4 space-y-4" x-data="{isEditing: false}">

    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">User Profile</h1>
        <template x-if="isEditing">
            <div class="flex items-center gap-4">
                <x-button class="flex items-center bg-success">
                    <span>Confirm</span>
                </x-button>
                <x-button class="flex items-center bg-danger" @click="isEditing = false">
                    <span>Cancel</span>
                </x-button>
            </div>
        </template>
        <template x-if="!isEditing">
            <x-button class="flex items-center" @click="isEditing = true">
                <x-icons.pencil />
                <span>Edit</span>
            </x-button>
        </template>
    </div>

    <div class="rounded border p-4 flex gap-2">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi50-FcEbEamVMqvkhUo8jklEge0uZIG9pbg&s" alt="" class="size-12 rounded-full border">
        <div>
            <h4>User Name</h4>
            <p class="text-sm">user@example.com</p>
        </div>
    </div>

    <div class="rounded border p-4 ">
        <h2 class="text-xl mb-4 font-medium">Personal Information</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-muted-text">

            <div>
                <p class="text-sm">First Name</p>
                <template x-if="isEditing">
                    <x-input placeholder="First Name" />
                </template>
                <template x-if="!isEditing">
                    <p class="font-medium">First Name</p>
                </template>
            </div>


            <div class="md:col-span-3">
                <p class="text-sm">Last Name</p>
                <template x-if="isEditing">
                    <x-input placeholder="Last Name" class="md:w-1/3" />
                </template>
                <template x-if="!isEditing">
                    <p class="font-medium">Last Name</p>
                </template>
            </div>


            <div class="col-span-2 md:col-span-1">
                <p class="text-sm">Email</p>
                <template x-if="isEditing">
                    <x-input placeholder="user@example.com" />
                </template>
                <template x-if="!isEditing">
                    <p class="font-medium">user@example.com</p>
                </template>
            </div>


            <div class="md:col-span-3">
                <p class="text-sm">Phone</p>
                <template x-if="isEditing">
                    <x-input placeholder="09847384732" class="md:w-1/3" />
                </template>
                <template x-if="!isEditing">
                    <p class="font-medium">09847384732</p>
                </template>

            </div>
        </div>
    </div>
</div>

@endsection