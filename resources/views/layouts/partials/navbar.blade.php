<nav class="p-6 flex bg-linen justify-between font-poppins">
    <div class="text-2xl flex flex-row gap-2 items-center">
        <img class=w-16 src="{{ url('assets/img/logo.png') }}" alt="Logo">
        SIMAK
    </div>

    <div class="flex items-center">
        <div class="nav-links duration-500 md:static absolute bg-linen md:min-h-fit min-h-[50vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5 ">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-6 gap-8 pr-11 font-light">
                <li>
                    <a class="hover:text-navy hover:font-medium cursor-pointer " href="/home">Beranda</a>
                </li>
                <li>
                    <a class="hover:text-navy hover:font-medium cursor-pointer" href="/dokter">Dokter</a>
                </li>
                <li>
                    <a class="hover:text-navy hover:font-medium cursor-pointer" href="/reservasi">Reservasi</a>
                </li>
                <li>
                    <a class="hover:text-navy hover:font-medium cursor-pointer" href="/obat">Obat</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center gap-5">
            <button class="px-2 font-bold">@Username</button>
            <ion-icon onclick="onToggleMenu(this)" name="menu-outline" class="text-2xl cursor-pointer md:hidden"></ion-icon>
        </div>
    </div>
    <script>
        const navLinks = document.querySelector('.nav-links');
        function onToggleMenu(e) {
            e.name = e.name === 'menu-outline' ? 'close' : 'menu-outline';
            console.log(e.name);
            navLinks.classList.toggle('top-[9%]');
        }
    </script>
</nav>