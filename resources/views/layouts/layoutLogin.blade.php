<!DOCTYPE html>
<html class="h-full bg-white lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMAK</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Script ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   
</head>

<body class="h-full">
    <main>
        @yield('content')
    </main>
</body>

</html>