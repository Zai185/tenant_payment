<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        {{$slot}}
    </div>
    <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[9999] " id="modal"></div>
    @livewireScripts
</body>

</html>