@php
$navmenus =[
[
'label' => 'Tenant List',
'route' => 'tenants.list',
'icon' => 'user-group'
],
[
'label' => 'Tenant Create',
'route' => 'tenants.create',
'icon' => 'user-plus'
],
[
'label' => 'Subscriptions',
'route' => 'tenants.subscriptions',
'icon' => 'subscription'
],
[
'label' => 'Profile',
'route' => 'tenant-user.profile',
'icon' => 'user-circle'
]
];
@endphp
<div class="flex" x-data="{sidebarOpen : false}">
    <aside
        class="w-screen h-full min-h-[100dvh] max-w-64 basis-64 fixed lg:sticky left-0 top-0 z-40 space-y-2 overflow-y-auto  border-r border-main-border bg-surface px-3 pb-4 pt-2 shadow-sm ease-out transition flex flex-col justify-between duration-300 lg:translate-x-0" :class="sidebarOpen ? '' : '-translate-x-full'">
        <div class="flex-1">
            <div class="flex items-center gap-2">
                <button
                    @click="sidebarOpen = false"
                    class="inline-flex lg:hidden h-10 w-10 items-center justify-center gap-1 rounded-md border text-sm hover:bg-accent hover:text-accent-text">
                    <x-icons.sidebar-close />
                </button>
                <h5 class="flex items-center gap-1 font-extrabold text-main-text">
                    PicoSBS
                </h5>
            </div>

            <ul class="w-full list-none space-y-1 p-1">

                @foreach ($navmenus as $navmenu)
                <li>

                    <a wire:ignore
                        href="{{route($navmenu['route'])}}"
                        class="inline-flex h-10 w-full cursor-pointer items-center justify-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-primary hover:text-primary-text transition duration-100 {{Route::is($navmenu['route']) ? 'bg-primary text-primary-text ' : ''}}">
                        <span
                            class="flex size-5 flex-shrink-0 items-center justify-center [&>svg]:h-4 [&>svg]:w-4">
                            @includeIf("components.icons.{$navmenu['icon']}")
                        </span>
                        <div class="flex-1 text-left">
                            <p class="flex-1 text-sm font-medium">{{$navmenu['label']}}</p>
                        </div>
                    </a>
                </li>

                @endforeach
            </ul>
        </div>
        <a
            href="#"
            class="inline-flex bg-accent mb-12 md:mb-0 w-full cursor-pointer items-center justify-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-primary hover:text-primary-text transition duration-100">
            <span
                class="flex size-5 flex-shrink-0 items-center justify-center [&>svg]:h-4 [&>svg]:w-4">
                @includeIf("components.icons.logout}")
            </span>
            <div class="flex-1 text-left">
                <p class="flex-1 text-sm font-medium">Logout</p>
            </div>
        </a>
    </aside>

    <div class="flex-1 w-full" >
        <div class="flex lg:hidden items-center py-4 px-4 md:px-8 justify-between bg-white">
            <x-icons.menu @click="sidebarOpen = true" />
        </div>
        <div class="p-4 md:p-8" @click="sidebarOpen = false">
            @yield('content')
        </div>
    </div>
</div>