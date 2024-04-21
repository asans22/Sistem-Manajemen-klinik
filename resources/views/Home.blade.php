@extends('layouts.layoutHome')
@section('content')

<!-- Elemen latar belakang dengan pseudo-element untuk gambar -->
<div class="relative bg-black">
    <div class="absolute inset-0 bg-[url('/public/assets/img/bg.jpg')] bg-cover bg-center opacity-[20.11%]"></div>
    <!-- Konten utama -->
    <div class="relative z-10 p-[15%] font-poppins">
        <div class="flex flex-col font-poppins">
            <div class="text-linen cursor-default mb-[5%]">
                <h1 class="font-semibold text-[44px] tracking-[-2px] mb-[10px]">Selamat datang di klinik kami!</h1>
                <p class="font-light text-[23px] ">Dapatkan akses cepat dan mudah ke informasi obat, reservasi, dan saran ahli untuk meningkatkan kualitas hidup Anda.</p>
            </div>
            <div class="text-[24px]">
                <button class="text-linen bg-navy border-[1px] border-navy hover:text-navy hover:bg-blue-sky active:bg-black active:text-linen focus:ring focus:ring-linen rounded-[10px] p-3 px-7">
                    Log In
                </button>
                <button class="hover:text-navy hover:bg-linen border-[1px] text-light border-black active:bg-black active:text-linen focus:ring focus:ring-black rounded-[10px] p-3 px-5">
                    Sign Up
                </button>
            </div>
        </div>
    </div>
</div>


@endsection