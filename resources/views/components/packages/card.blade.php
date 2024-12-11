<div id="package_{{$package->id}}" wire:key="{{$package->id}}"
    {{$attributes->merge(['class'=>"relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md"])}}>
    <div
        class="relative bg-clip-border !mt-4 mx-4 rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none !m-0 p-6">
        <h6
            class="block antialiased tracking-normal font-sans text-base leading-relaxed text-blue-gray-900 capitalize font-bold mb-1">
            {{$package->name}}
        </h6>
        <p
            class="block antialiased font-sans text-sm leading-normal text-inherit font-normal !text-gray-500">
            Free access for 2 members
        </p>
        <h3
            class="antialiased tracking-normal font-sans font-semibold leading-snug text-blue-gray-900 !mt-4 flex gap-1 !text-4xl">
            ${{$package->price}}<span
                class="block antialiased font-sans leading-relaxed text-blue-gray-900 -translate-y-0.5 self-end opacity-70 text-lg font-bold">/<!-- -->year</span>
        </h3>
    </div>
    <div class="p-6 pt-0">
        <ul class="flex flex-col gap-3 mb-6">
            <li class="flex items-center gap-3 text-gray-700">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                    class="h-5 w-5 text-blue-gray-900">
                    <path
                        fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                        clip-rule="evenodd"></path>
                </svg>
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-inherit">
                    Maximum User : {{$package->max_users}} users
                </p>
            </li>
            <li class="flex items-center gap-3 text-gray-700">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                    class="h-5 w-5 text-blue-gray-900">
                    <path
                        fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                        clip-rule="evenodd"></path>
                </svg>
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-inherit">
                    Maximum Products : {{$package->max_products}} products
                </p>
            </li>
            <li class="flex items-center gap-3 text-gray-700">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                    class="h-5 w-5 text-blue-gray-900">
                    <path
                        fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                        clip-rule="evenodd"></path>
                </svg>
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-inherit">
                    Maximum Invoice : {{$package->max_invoices}} invoices
                </p>
            </li>
            <li class="flex items-center gap-3 text-gray-700">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2.5"
                    stroke="currentColor"
                    aria-hidden="true"
                    class="h-5 w-5 text-blue-gray-900">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-inherit">
                    40GB Cloud storage
                </p>
            </li>
            <li class="flex items-center gap-3 text-gray-700">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2.5"
                    stroke="currentColor"
                    aria-hidden="true"
                    class="h-5 w-5 text-blue-gray-900">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-inherit">
                    Support team full assist
                </p>
            </li>
        </ul>

        @if (isset($haslink))
        <button>
            <a href="/tenant/sign-up?package={{$package->name}}" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] bg-gradient-to-tr from-gray-900 to-gray-800 block w-full"
                type="button"
                data-ripple-light="true">
                Purchase
            </a>
        </button>
        @endif

    </div>
</div>