@extends('layouts.dashboard')

@section('content')

<div x-data="{filter_open: false,  payment_type: @entangle('payment_type'),  payment: @entangle('payment')}">
    <div class="my-4">
        <h1 class="text-2xl font-bold">Tenant Subscriptions</h1>
    </div>

    <div class="flex items-center justify-between w-full overflow-auto rounded-md border border-main-border bg-surface shadow-lg shadow-gray-400 p-4 flex-wrap md:flex-nowrap my-4 gap-2">

        <x-input.left-icon wire:model.live="subscription_search" placeholder="Search something...">
            <x-icons.search />
        </x-input.left-icon>


        <div class="flex items-center gap-2">
            <x-button class="flex items-center" @click="filter_open = !filter_open">
                <x-icons.filter />
                Filter
            </x-button>
        </div>
    </div>

    <!-- //! filter box -->
    <div x-show="filter_open"
        x-transition:enter="transition  origin-top ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition origin-top ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0"
        class="flex items-center justify-between w-full overflow-auto rounded-md border border-main-border bg-surface shadow-lg shadow-gray-400 p-4  my-4">
        <div>
            <div>
                <p class="font-medium">Status</p>

                <x-select class="text-sm" wire:model.live="status" wire:change="resetPage()">
                    <option value="">None</option>
                    @foreach ($statusMap as $index=>$s) <option value="{{$index}}">{{$s['label']}}</option>@endforeach
                </x-select>

            </div>
        </div>
    </div>

    <div
        class="relative w-full overflow-auto rounded-md border border-main-border bg-surface shadow-lg shadow-gray-400">
        <div class="w-full overflow-x-auto">

            <!-- // TODO FIX COLOR CODE 400  -->
            <table class="w-full text-left text-sm text-main-text rtl:text-right">
                <thead class="bg-primary  text-xs uppercase text-primary-text">

                    <tr>
                        <th scope="col" class="px-4 py-3">No.</th>
                        <th scope="col" class="px-4 py-3">Company</th>
                        <th scope="col" class="px-4 py-3">Domain</th>
                        <th scope="col" class="px-4 py-3">Pay Status</th>
                        <th scope="col" class="px-4 py-3 w-24">Expire at</th>
                        <th scope="col" class="px-4 py-3 w-24">Created at</th>
                        <th scope="col" class="px-4 py-3">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subscriptions as $index => $subscription)

                    <tr
                        class="border-b bg-surface text-main-text odd:bg-surface even:bg-accent" x-data="{actionOpen : false}">

                        <td class="px-4 py-3">{{ $subscriptions->firstItem() + $index}}</td>
                        <td class="px-4 py-3">{{$subscription->name}}</td>
                        <td class="px-4 py-3">{{$subscription->domain_name}}</td>
                        <td class="px-4 py-3">
                            <x-badge class="{{$statusMap[$subscription->status]['class']}}">
                                {{$statusMap[$subscription->status]['label']}}
                            </x-badge>

                        </td>
                        @php
                        $will_expire_soon = today()->addDays(14) > $subscription->expire_at ? 'text-danger' : '';
                        @endphp
                        <td class="px-4 py-3 {{$will_expire_soon}}">{{$subscription->expire_at}}</td>
                        <td class="px-4 py-3">{{$subscription->created_at}}</td>
                        <td class="px-4 py-3 relative">
                            <x-button @focus="actionOpen = true" @blur="actionOpen=false" class="flex items-center">
                                <span>Action</span>
                                <x-icons.arrow-down />
                            </x-button>
                            <div x-show="actionOpen" class="absolute mt-2 w-32 bg-white z-10 border rounded-lg" x-transition>
                                <a href="#" class=" py-1 px-3 block   hover:bg-surface select-none text-muted-text ">Action 1</a>

                                <a href="#" class=" py-1 px-3 block   hover:bg-surface select-none text-muted-text ">Action 2</a>

                                <a href="#" class=" py-1 px-3 block   hover:bg-surface select-none text-muted-text ">Action 3</a>

                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <x-paginator :paginators="$subscriptions" :$perPage />
        </div>
    </div>

    @teleport('#modal')

    <div class="bg-black/20 w-screen pb-8 h-screen flex items-start justify-center overflow-y-scroll">
        <form class="w-fit space-y-2 bg-white p-4 rounded-lg mt-16" x-data="imagePreview">
            <h4 class="text-lg font-bold py-2 border-b">Tenant Subscriptions</h4>

            <div class="flex items-center gap-4">
                <p>How many months to renew?</p>
                <x-input placeholder="e.g. 1" wire:model.live="renewMonth" />
            </div>
            <div class="flex items-center gap-4">
                <p class="text-sm text-muted-text/60">The expired date will be <span class="text-base text-danger">{{today()->addMonths((int)$renewMonth ?? 0)->format('d-m-Y')}}</span></p>
            </div>
            <hr>

            <!-- //! payment section  -->
            @if ($renewMonth)

            <div class="space-y-4 mx-auto lg:mx-0 w-full py-4 px-4 max-w-[448px] bg-white">
                <div class="flex gap-4 items-center">
                    <label class="w-32" for="">Total Price (1M)</label>
                    <p>: {{number_format(100000)}} mmk</p>
                </div>
                <div class="flex gap-4 items-center">

                    <label class="w-32" for="">Plan Duration</label>
                    <p>: {{$renewMonth}} months</p>
                </div>
                <div class="flex gap-4 items-center">

                    <label class="w-32" for="">Total Amount</label>
                    <p>: {{number_format( 100000 * $renewMonth )}} mmk</p>
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
                <div x-show="imageUrl && isViewingImage" class="fixed !m-0 top-0 left-0 bg-gray-800/20 backdrop-blur transition w-screen h-screen z-[9999] flex items-center justify-center" @click="isViewingImage = false" :class="isViewingImage ? 'opacity-1' : 'opacity-0 pointer-events-none'" x-transition>
                    <img :src="imageUrl" class="h-full object-contain">
                </div>


                <x-button class="w-full" type="submit">Submit</x-button>
            </div>

            @endif






        </form>
    </div>

    @endteleport
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