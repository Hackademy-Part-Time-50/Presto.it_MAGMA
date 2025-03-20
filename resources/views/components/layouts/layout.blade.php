<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Presto</title>
</head>

<body>
    <x-navbar class="navbar_custom"/>

    <div class="min-vh-100" id="sfondo">
        {{ $slot }}
    </div>

    <x-footer />

</body>

</html>
