<!DOCTYPE html>
<html lang="en">
<html class="h-full bg-white lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMAK</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ url('assets/img/logo.png') }}">
    <!-- Script ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   
</head>


<body>
    <nav class="absolute mx-[15%] mt-[3%] flex items-center gap-3 z-20">
        <img src="{{ url('assets/img/logo.png') }}" alt="Logo">
        <h1 class="font-poppins font-bold text-linen cursor-default">SIMAK</h1>
    </nav>
    <main>
        @yield('content')
    </main>
    @include('layouts.partials.footer')
</body>

</html>