@extends('layouts.dashboard')

@section('content')

<div x-data="{step: @entangle('step'), package: @entangle('form.package'), payment_type: @entangle('payment_type'), payment_id: @entangle('form.payment_id'), payment: @entangle('payment')}">
    <div class="my-4">
        <h1 class="text-2xl font-bold capitalize" x-text="makeTitle('{{$steps[$step - 1]['title']}}')"></h1>
        <p>{{$steps[$step - 1]['description']}}</p>
    </div>

    <div x-show="step == 1" class="my-4">
        <div class="grid gap-4 grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 justify-center">
            @foreach ($packages as $package)
            <div class="w-full relative mx-auto transition cursor-pointer rounded-lg"
                @click="package ='{{$package->name}}';$wire.updateCurrentPackage('{{$package->name}}')"
                :class="package == '{{$package->name}}' ? 'border border-primary' : ''">
                <template x-if="package ==  '{{$package->name}}'">
                    <x-badge class="absolute top-2 right-2 z-[99]">chosen package</x-badge>
                </template>
                <x-packages.card :$package />
            </div>
            @endforeach
        </div>
        @error('form')
        {{$message}}
        @enderror
        <x-input.error error="form.currentPackage" />

        <div class="mt-2 ">
            <x-button class="ms-auto" @click="$wire.stepForward()">Next</x-button>
        </div>
    </div>

    <div x-show="step == {{count($steps)}}" x-transition>

        @if (isset($form->currentPackage))
        <div class="flex flex-col lg:flex-row  mt-4 gap-4" x-data="imagePreview()">

            <div>
                <x-packages.card class="max-w-[448px] mx-auto" :package="$form->currentPackage" />
            </div>
            <div class="space-y-4 rounded-lg shadow-md mx-auto lg:mx-0 w-full py-4 px-4 max-w-[448px] bg-white">
                <div class="flex gap-4 items-center">
                    <label class="w-32" for="">Total Price (1M)</label>
                    <p>: {{number_format( $form->currentPackage->price)}} mmk</p>
                </div>
                <div class="flex gap-4 items-center">

                    <label class="w-32" for="">Plan Duration</label>
                    <p>: {{ $form->currentPackage->duration}} months</p>
                </div>
                <div class="flex gap-4 items-center">

                    <label class="w-32" for="">Total Amount</label>
                    <p>: {{number_format( $form->currentPackage->duration *  $form->currentPackage->price)}} mmk</p>
                </div>
                <div class="flex gap-4 md:items-center">

                    <label class="w-32" for="">Payment Type</label>
                    <div class="flex gap-2">

                        <div>
                            <label @click="payment_type = 'local'" :class="payment_type == 'local' ?'bg-primary text-primary-text' : 'text-primary'" class="border select-none cursor-pointer py-1 px-2 border-primary  rounded">Local</label>
                        </div>
                        <div>

                            <label @click="payment_type = 'credit'" :class="payment_type == 'credit' ?'bg-primary text-primary-text' : 'text-primary'" class="border select-none cursor-pointer py-1 px-2 border-primary rounded">Credit</label>
                        </div>
                    </div>
                </div>

                <!-- //! payment local  -->
                <template x-if="payment_type == 'local'">
                    <div class="space-y-2 w-full">

                        <x-select wire:model="form.payment_id" @change="$wire.updatePayment();imageUrl = null">

                            <option value="" disabled selected>Select a payment</option>
                            @foreach ($payments as $payment)
                            <option value="{{$payment['id']}}">{{$payment['name']}}</option>
                            @endforeach
                        </x-select>
                        <x-input.error error="form.payment_id" />

                        <p wire:loading>Loading...</p>
                        <template x-if="payment">

                            <div wire:loading.remove wire:target="updatePayment" class="space-y-2">
                                <template x-if="payment.qr_code">
                                    <div class="w-24 h-24 mx-auto">
                                        <img class="w-full h-full object-contain" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png">
                                    </div>
                                </template>
                                <div class="flex gap-4 items-center">
                                    <label class="w-32" for="">Account Name</label>
                                    <p x-text="': ' + payment.account_name"></p>
                                </div>
                                <div class="flex gap-4 items-center">
                                    <label class="w-32" for="">Account Number</label>
                                    <p x-text="': ' + payment.account_number"></p>

                                </div>
                                <div class="flex h-32">
                                    <div class="relative w-full rounded-lg bg-blue-50 border">

                                        <input type="file" class="hidden" x-ref="receiptInput" @change="previewImage($event)" accept="image/*">

                                        <x-button @click="$refs.receiptInput.click()" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 m-0">Upload Receipt</x-button>
                                    </div>

                                    <template x-if="imageUrl">
                                        <div class="relative h-full cursor-pointer group" @click="isViewingImage = true">
                                            <img :src="imageUrl" alt="" class="h-full border rounded">
                                            <div class="w-full h-full bg-black/20 absolute top-0 left-0 flex items-center justify-center group-hover:opacity-100 opacity-0 transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>

                <!-- //! payment credit card  -->

                <template x-if="payment_type == 'credit'">
                    <div class="grid grid-cols-2 gap-2">
                        <x-input layout-class="col-span-3" placeholder="Card Number" />
                        <x-input placeholder="Expired Date" class="col-span-2" />
                        <x-input type="number" placeholder="CVC" max="3" />
                    </div>
                </template>

                <x-button class="w-full" type="submit">Submit</x-button>
                <x-button class="w-full !bg-transparent !text-gray-500" @click="$wire.stepBack()">Back</x-button>
            </div>

            <div x-show="imageUrl && isViewingImage" class="fixed top-0 left-0 bg-gray-800/20 backdrop-blur  transition w-screen h-screen z-[9999] flex items-center justify-center" @click="isViewingImage = false" :class="isViewingImage ? 'opacity-1' : 'opacity-0 pointer-events-none'" x-transition>
                <img :src="imageUrl" class="h-full object-contain">
            </div>
        </div>
        @endif
    </div>

    <script>
        function makeTitle(text) {
            return text.replaceAll("_", " ")
        }

        function imagePreview() {
            return {
                imageUrl: null,
                isViewingImage: false,
                previewImage: function(event) {
                    const file = event.target.files[0]
                    if (file) {
                        this.imageUrl = URL.createObjectURL(file);
                    } else {
                        this.imageUrl = null
                    }
                }
            }
        }
    </script>
    @endsection