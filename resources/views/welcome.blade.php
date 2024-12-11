<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <section class="py-24 px-8">
        <div class="container mx-auto">
            <p
                class="block antialiased font-sans leading-relaxed text-blue-gray-900 mb-4 font-bold text-lg">
                Pricing Plans
            </p>
            <h1
                class="block antialiased tracking-normal font-sans font-semibold text-blue-gray-900 mb-4 !leading-snug lg:!text-4xl !text-2xl max-w-2xl">
                Invest in a plan that's as ambitious as your corporate goals.
            </h1>
            <p
                class="block antialiased font-sans text-xl leading-relaxed text-inherit mb-10 font-normal !text-gray-500 max-w-xl">
                Compare the benefits and features of each plan below to find the ideal
                match for your business's budget and ambitions.
            </p>
            <div
                class="grid gap-x-10 gap-y-8 md:grid-cols-2 lg:grid-cols-3 max-w-5xl">


                <x-packages.card href="/tenant/sign-up?package=normal" />
                <x-packages.card href="/tenant/sign-up?package=intermediate" />
                <x-packages.card href="/tenant/sign-up?package=advanced" />

            </div>
            <p
                class="block antialiased font-sans text-sm leading-normal text-inherit mt-10 font-normal !text-gray-500">
                You have Free Unlimited Updates and Premium Support on each package. You
                also have 30 days to request a refund.
            </p>
        </div>
    </section>


    @livewireScripts

</body>

</html>