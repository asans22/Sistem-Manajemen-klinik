@extends('layouts.layoutLogin')
@section('content')

<div class="">
    <div class="flex min-h-screen flex-col justify-center items-center px-6 py-12 lg:px-8 font-poppins bg-light">
        <div class="bg-linen w-full max-w-md rounded-[25px] py-7 shadow-xl px-16">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-[75px] w-auto" src="{{ url('assets/img/logo.png') }}" alt="Logo">
                <h2 class="mt-8 text-center text-3xl font-bold leading-9 tracking-tight text-gray-900">Masuk</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-5" action="#" method="POST">
                    <div>
                        <label for="email" class="block text-sm font-normal leading-6 text-gray-900">Alamat Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-sky sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-normal leading-6 text-gray-900">Kata Sandi</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-sky sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-navy px-3 py-2.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-sky">Masuk</button>
                    </div>
                </form>

                <p class="mt-5 text-center text-sm text-gray-500">
                    Belum punya akun?
                    <a href="/register" class="font-semibold leading-6 text-blue-sky hover:text-navy">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>

    @endsection