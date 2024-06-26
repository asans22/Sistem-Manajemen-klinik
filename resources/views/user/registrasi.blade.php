@extends('layouts.layoutLogin')
@section('content')

<div class="">
    <div class="flex min-h-screen flex-col justify-center items-center px-6 py-12 lg:px-8 font-poppins bg-light">
        <div class="bg-linen w-full max-w-md rounded-[25px] py-7 shadow-xl px-16">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-[75px] w-auto" src="{{ url('assets/img/logo.png') }}" alt="Logo">
                <h2 class="mt-8 text-center text-3xl font-bold leading-9 tracking-tight text-gray-900">Daftar</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-5" action="registerUser" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-normal leading-6 text-gray-900">Nama Lengkap</label>
                        <div class="mt-2">
                            <input id="name" value="{{ Session::get('name') }}" name="name" type="text" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-sky sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-normal leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" value="{{ Session::get('email') }}" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-sky sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-normal leading-6 text-gray-900">Alamat</label>
                        <div class="mt-2">
                            <input id="alamat" value="{{ Session::get('alamat') }}" name="alamat" type="text" autocomplete="alamat" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-sky sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="no_hp " class="block text-sm font-normal leading-6 text-gray-900">No HP</label>
                        <div class="mt-2">
                            <input id="no_hp" value="{{ Session::get('no_hp') }}" name="no_hp" type="text" autocomplete="no_hp" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-sky sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-normal leading-6 text-gray-900">Kata Sandi</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" value="{{ Session::get('password') }}" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-sky sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-navy px-3 py-2.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-sky">Daftar</button>
                    </div>
                </form>

                <p class="mt-5 text-center text-sm text-gray-500">
                    Sudah punya akun?
                    <a href="/login" class="font-semibold leading-6 text-blue-sky hover:text-navy">Masuk</a>
                </p>
            </div>
        </div>
    </div>

    @endsection