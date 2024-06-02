@extends('layouts.app')

@section('container')
    <!-- Isi konten halaman di sini -->
    <div class="my-10 py-10 border-b-2 pl-10 border-slate-400">
        <h1 class="font-bold text-3xl">Data Akun</h1>
    </div>

    <div class="pl-10 pt-10 w-[80%] m-auto flex justify-center">
        <table class="border-collapse border w-full text-center border-black">
            <thead class="font-semibold">
                <tr class="h-10">
                    <td class="border-2 border-black px-4 py-2">No</td>
                    <td class="border-2 border-black px-4 py-2">Email</td>
                    <td class="border-2 border-black px-4 py-2">Nama</td>
                    <td class="border-2 border-black px-4 py-2">No HP</td>
                    <td class="border-2 border-black px-4 py-2">Alamat</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                @if ($user->role == 'user')
                <tr class="h-8">
                    <td class="border-2 border-black">{{ $key + 1 }}</td>
                    <td class="border-2 border-black">{{ $user->email }}</td>
                    <td class="border-2 border-black">{{ $user->name }}</td>
                    <td class="border-2 border-black">{{ $user->no_hp }}</td>
                    <td class="border-2 border-black">{{ $user->alamat   }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
