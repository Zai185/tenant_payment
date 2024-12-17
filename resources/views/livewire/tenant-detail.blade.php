@extends('layouts.dashboard')
@section('content')

<div class="flex gap-4">

    <div class="w-1/3 shadow-lg self-start bg-white rounded-lg py-4 px-8">
        <h3 class="text-2xl font-bold">Tenant Name</h3>
        <hr class="divider my-2">

        <div class="space-y-4">

            <div>
                <h5 class="text font-medium">Business Name</h5>
                <p class="text-sm">business name small</p>
            </div>

            <div>
                <h5 class="text font-medium">Business Name</h5>
                <p class="text-sm">business name small</p>
            </div>

            <div>
                <h5 class="text font-medium">Business Name</h5>
                <p class="text-sm">business name small</p>
            </div>

        </div>

    </div>


    <div class="flex-1 py-4 px-8">
        <div class="space-y-2">


            <!-- //! stepper tab  -->
            <div class="flex items-center ">
                @foreach ($steps as $step)
                <button wire:click="$set('currentStep', '{{ $step }}')" class="py-2 px-4 border-b-2 font-medium  {{$currentStep == $step ? 'text-primary border-primary' : ''}}">
                    {{$step}}
                </button>
                @endforeach
            </div>

            @if($currentStep == $steps[0])
            <div class="space-y-2">

                <!-- //! isolated rounded whtie box -->
                <div class="rounded-lg bg-white shadow-lg p-4 ">
                    <div class="border-s-4 px-2">
                        <h5 class="text font-medium">Status</h5>
                        <x-badge class="bg-success text-sm">Running</x-badge>
                    </div>
                </div>


                <!-- //! isolated rounded whtie box -->
                <div class="rounded-lg bg-white shadow-lg p-4 space-y-4 ">

                    <!-- // ! inner text section  -->
                    <div class="border-s-4 px-2">
                        <h5 class="text font-medium">Business Name</h5>
                        <p class="text-sm"><span class="text-lg font-medium">Big text</span> name small</p>
                    </div>

                    <div class="border-s-4 px-2">
                        <h5 class="text font-medium">Business Name</h5>
                        <p class="text-sm"><span class="text-lg font-medium">Big text</span> name small</p>
                    </div>
                </div>
            </div>
            @endif

            @if($currentStep == $steps[1])
            <div class="space-y-4" x-data="{modalOpen : ''}">

                <!-- //! isolated rounded whtie box -->
                <div class="rounded-lg bg-white shadow-lg py-4 px-8 space-y-4 ">
                    <h3 class="text-xl font-medium">Tenant Default Account</h3>

                    <div>
                        <!-- //! Information Row -->
                        <div class="flex border-b border-muted/40 py-6 text-muted-text/60">
                            <p class="w-32 font-medium">Username</p>
                            <p class="flex-1">{{$name}}</p>
                            <span class="cursor-pointer" @click="modalOpen = 'username'">
                                <x-icons.pencil />
                            </span>
                        </div>
                        @teleport('#modal')
                        <div x-show="modalOpen == 'username'" class="bg-black/20 w-screen h-screen flex items-center justify-center" x-transition>
                            <div class="bg-white rounded-lg w-2/5 py-2">
                                <div class="py-4 px-8 border-b">
                                    <h3 class="text-xl font-medium">Username</h3>
                                </div>
                                <div class="py-4 px-16">
                                    <h5 class="my-2 text-muted-text/80 font-medium">Username</h5>
                                    <x-input class="!bg-muted/30 !border-muted/30" wire:model.live="name"/>
                                </div>

                                <div class="flex justify-center pt-16 pb-8 items-center gap-2 font-medium">     
                                    <x-button wire:click="" @click="modalOpen = ''" bg-class="bg-muted text-surface-text/60 ">Cancel</x-button>
                                    <x-button>Submit</x-button>
                                </div>
                            </div>
                        </div>
                        @endteleport

                        <!-- //! Information Row -->
                        <div class="flex border-b border-muted/40 py-6 text-muted-text/60">
                            <p class="w-32 font-medium">Password</p>
                            <p class="flex-1">Password</p>
                            <span class="cursor-pointer" @click="modalOpen = 'password'">
                                <x-icons.pencil />
                            </span>
                        </div>
                        @teleport('#modal')
                        <div x-show="modalOpen == 'password'" class="bg-black/20 w-screen h-screen flex items-center justify-center" x-transition>
                            <div class="bg-white rounded-lg w-2/5 py-2">
                                <div class="py-4 px-8 border-b">
                                    <h3 class="text-xl font-medium">Password</h3>
                                </div>
                                <div class="py-4 px-16">
                                    <h5 class="my-2 text-muted-text/80 font-medium">Password</h5>
                                    <x-input class="!bg-muted/30 !border-muted/30" />
                                </div>
                                <div class="py-4 px-16">
                                    <h5 class="my-2 text-muted-text/80 font-medium">New Password</h5>
                                    <x-input class="!bg-muted/30 !border-muted/30" />
                                    <div class="grid grid-cols-4 gap-1 mt-2">

                                        @for ($i=1; $i<=4;$i++)
                                            <p class="h-1 w-full bg-muted/80">
                                            </p>
                                            @endfor
                                    </div>
                                    <p class="text-muted-text/70 text-xs mt-1">Use 8 or more characters with a mix of letters, numbers & symbols.</p>
                                </div>
                                <div class="py-4 px-16">
                                    <h5 class="my-2 text-muted-text/80 font-medium">Confirm Password</h5>
                                    <x-input class="!bg-muted/30 !border-muted/30" />
                                </div>

                                <div class="flex justify-center pt-16 pb-8 items-center gap-2 font-medium">
                                    <x-button @click="modalOpen = ''" bg-class="bg-muted text-surface-text/60 ">Cancel</x-button>
                                    <x-button>Submit</x-button>
                                </div>
                            </div>
                        </div>
                        @endteleport

                        <!-- //! Information Row -->
                        <div class="flex border-b border-muted/40 py-6 text-muted-text/60">
                            <p class="w-32 font-medium">Role</p>
                            <p class="flex-1">Role</p>
                            <span class="cursor-pointer" @click="modalOpen = 'role'">
                                <x-icons.pencil />
                            </span>
                        </div>
                        @teleport('#modal')
                        <div x-show="modalOpen == 'role'" class="bg-black/20 w-screen h-screen flex items-center justify-center" x-transition>
                            <div class="bg-white rounded-lg w-2/5 py-2">
                                <div class="py-4 px-8 border-b">
                                    <h3 class="text-xl font-medium">Role</h3>
                                </div>
                                <div class="py-4 px-16">
                                    <h5 class="my-2 text-muted-text/80 font-medium">Role</h5>
                                    <x-input class="!bg-muted/30 !border-muted/30" />
                                </div>

                                <div class="flex justify-center pt-16 pb-8 items-center gap-2 font-medium">
                                    <x-button @click="modalOpen = ''" bg-class="bg-muted text-surface-text/60 ">Cancel</x-button>
                                    <x-button>Submit</x-button>
                                </div>
                            </div>
                        </div>
                        @endteleport
                    </div>
                </div>

                <!-- //! isolated rounded whtie box -->
                <div class="rounded-lg bg-white shadow-lg py-4 px-8 space-y-4 ">
                    <h3 class="text-xl font-medium">Database Info</h3>

                    <div>
                        <!-- //! Information Row -->
                        <div class="flex border-b border-muted/40 py-6 text-muted-text/60">
                            <p class="w-32 font-medium">Username</p>
                            <p class="flex-1">username</p>
                            <x-icons.pencil />
                        </div>
                        <!-- //! Information Row -->
                        <div class="flex border-b border-muted/40 py-6 text-muted-text/60">
                            <p class="w-32 font-medium">Password</p>
                            <p class="flex-1">Password</p>
                            <x-icons.pencil />
                        </div>
                        <!-- //! Information Row -->
                        <div class="flex border-b border-muted/40 py-6 text-muted-text/60">
                            <p class="w-32 font-medium">Role</p>
                            <p class="flex-1">Role</p>
                            <x-icons.pencil />
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($currentStep == $steps[2])
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

                            @for($i = 0; $i < 6; $i++)

                            <tr
                                class="border-b bg-surface text-main-text odd:bg-surface even:bg-accent" x-data="{actionOpen:false}">

                                <td class="px-4 py-3">Cell</td>
                                <td class="px-4 py-3">Cell</td>
                                <td class="px-4 py-3">Cell</td>
                                <td class="px-4 py-3"> </td>
                                <td class="px-4 py-3">Cell</td>
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
                            @endfor


                        </tbody>
                    </table>

                </div>



            </div>



            @endif
        </div>
    </div>
</div>

@endsection