@props(['paginators', 'perPage'])

<div class="flex items-center justify-between px-2 pb-4 flex-wrap md:flex-nowrap">

    <p class="w-2/3 md:w-1/4 text-sm text-muted-text/70 order-1 md:order-none">Showing {{$paginators->firstItem()}} to {{$paginators->lastItem()}} of {{$paginators->total()}} results</p>
    <div class="w-full md:w-1/2">

        <nav class="w-fit flex items-center gap-2 border mx-auto my-4">
            @if($paginators->onFirstPage())
            <span class="inline-flex h-9 items-center justify-center gap-1 rounded-md px-3 py-2 pl-2.5 text-sm font-medium hover:bg-accent hover:text-accent-text/80 sm:h-10">
                <x-icons.left-arrow />
                <span class="hidden sm:inline">Previous</span>
            </span>
            @else
            <button wire:click="previousPage" class="inline-flex h-9 items-center justify-center gap-1 rounded-md px-3 py-2 pl-2.5 text-sm font-medium hover:bg-accent hover:text-accent-text/80 sm:h-10">
                <x-icons.left-arrow />
                <span class="hidden sm:inline">Previous</span>
            </button>
            @endif

            <ul class="flex flex-row items-center gap-1">
                @if($paginators->lastPage() > 6)
                <li wire:click="setPage(1)">
                    <button
                        class="inline-flex h-9 w-9 items-center justify-center gap-1 rounded-md text-sm hover:bg-accent hover:text-accent-text/80 sm:h-10 sm:w-10 {{$paginators->currentPage() == 1 ? ' border bg-primary text-primary-text' : ''}}">
                        1
                    </button>
                </li>

                <!-- //! dots  -->
                @if ($paginators->lastPage() > 6 && $paginators->currentPage() >3 )
                <li>
                    <span aria-hidden="true" class="flex h-9 w-9 items-center justify-center">
                        <x-icons.horizontal-dots />
                    </span>
                </li>
                @endif

                @if ($paginators->currentPage() > 2)

                <li>
                    <button wire:click="setPage({{$paginators->currentPage() - 1}})"
                        class="inline-flex h-9 w-9 items-center justify-center gap-1 rounded-md text-sm hover:bg-accent hover:text-accent-text/80 sm:h-10 sm:w-10 ">
                        {{$paginators->currentPage() - 1}}
                    </button>
                </li>
                @endif

                @if ($paginators->currentPage() > 1 && $paginators->currentPage() < $paginators->lastPage() )
                    <li>
                        <button wire:click="setPage({{$paginators->currentPage()}})"
                            class="inline-flex h-9 w-9 items-center justify-center gap-1 rounded-md text-sm hover:bg-accent hover:text-accent-text/80 sm:h-10 sm:w-10  border bg-primary text-primary-text">
                            {{$paginators->currentPage()}}
                        </button>
                    </li>
                    @endif

                    @if ($paginators->currentPage() < $paginators->lastPage() - 1)
                        <li>
                            <button wire:click="setPage({{$paginators->currentPage() + 1}})"
                                class="inline-flex h-9 w-9 items-center justify-center gap-1 rounded-md text-sm hover:bg-accent hover:text-accent-text/80 sm:h-10 sm:w-10">
                                {{$paginators->currentPage() + 1}}
                            </button>
                        </li>
                        @endif

                        <!-- //! dots  -->
                        @if ($paginators->lastPage() > 6 && $paginators->currentPage() < $paginators->lastPage() - 2 )

                            <li>
                                <span aria-hidden="true" class="flex h-9 w-9 items-center justify-center">
                                    <x-icons.horizontal-dots />
                                </span>
                            </li>
                            @endif

                            <li>
                                <button wire:click="setPage({{$paginators->lastPage()}})"
                                    class="inline-flex h-9 w-9 items-center justify-center gap-1 rounded-md text-sm hover:bg-accent hover:text-accent-text/80 sm:h-10 sm:w-10 {{$paginators->currentPage() == $paginators->lastPage() ? ' border bg-primary text-primary-text' : ''}}">
                                    {{$paginators->lastPage()}}
                                </button>
                            </li>

                            @else
                            @for($i = 1; $i <= $paginators->lastPage(); $i++)
                                <li wire:click="setPage({{$i}})">
                                    <button
                                        class="inline-flex h-9 w-9 items-center justify-center gap-1 rounded-md text-sm hover:bg-accent hover:text-accent-text/80 sm:h-10 sm:w-10  {{$paginators->currentPage() == $i ? 'border bg-primary text-primary-text' : ''}}">
                                        {{$i}}
                                    </button>
                                </li>
                                @endfor
                                @endif
            </ul>

            @if($paginators->onLastPage())
            <span class="inline-flex h-9 items-center justify-center gap-1 rounded-md px-3 py-2 pl-2.5 text-sm font-medium hover:bg-accent hover:text-accent-text/80 sm:h-10">
                <span class="hidden sm:inline">Next</span>
                <x-icons.right-arrow />
            </span>
            @else
            <button wire:click="nextPage" class="inline-flex h-9 items-center justify-center gap-1 rounded-md px-3 py-2 pl-2.5 text-sm font-medium hover:bg-accent hover:text-accent-text/80 sm:h-10">
                <span class="hidden sm:inline">Next</span>
                <x-icons.right-arrow />
            </button>
            @endif
        </nav>
    </div>


    <div class="order-2 md:order-none w-1/3 md:w-1/4 flex items-center justify-end gap-2">
        <span class="text-sm text-muted-text">PerPage</span>
        <x-select wire:model="perPage" class="form-control" wire:change="resetPage()">
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </x-select>
    </div>

</div>