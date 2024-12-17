@extends('layouts.dashboard')
@section('content')

<div x-data="{filter_open: false}">
    <div class="my-4">
        <h1 class="text-2xl font-bold">Tenants</h1>
    </div>

    <div class="flex items-center justify-between w-full overflow-auto rounded-md border border-main-border bg-surface shadow-lg shadfow-gray-400 p-4 my-4 flex-wrap md:flex-nowrap gap-2">

        <x-input.left-icon wire:model.live="tenant_search" placeholder="Search something..." class="w-full">
            <x-icons.search />
        </x-input.left-icon>


        <div class="flex items-center gap-2">
            <x-button class="flex items-center" @click="filter_open = !filter_open">
                <x-icons.filter />
                Filter
            </x-button>
            <x-button>
                <a href="{{route('tenants.create')}}">
                    + Create a tenant</x-button>
            </a>
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
                <thead class="bg-primary text-xs uppercase text-primary-text">
                    <tr>
                        <th scope="col" class="px-4 py-3">No.</th>
                        <th scope="col" class="px-4 py-3">Name</th>
                        <th scope="col" class="px-4 py-3">Domain</th>
                        <th scope="col" class="px-4 py-3">Status</th>
                        <th scope="col" class="px-4 py-3">Created at</th>
                        <th scope="col" class="px-4 py-3">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($tenants as $index => $tenant)

                    <tr
                        class="border-b bg-surface text-main-text odd:bg-surface even:bg-accent" x-data="{actionOpen:false}">

                        <td class="px-4 py-3">{{ $tenants->firstItem() + $index}}</td>
                        <td class="px-4 py-3">{{$tenant->name}}</td>
                        <td class="px-4 py-3">{{$tenant->domain_name}}</td>
                        <td class="px-4 py-3">
                            <x-badge class="{{$statusMap[$tenant->status]['class']}}">
                                {{$statusMap[$tenant->status]['label']}}
                            </x-badge>
                        </td>
                        <td class="px-4 py-3">{{$tenant->created_at}}</td>
                        <td class="px-4 py-3">
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
            <x-paginator :paginators="$tenants" :$perPage />
        </div>
    </div>
</div>

@endsection