@extends('layouts.app')

@section('container')
    <!-- Isi konten halaman di sini -->
    <div class="my-10 py-10 border-b-2 pl-10 border-slate-400">
        <h1 class="font-bold text-3xl">Data Akun</h1>
    </div>

    <div class="pl-10">
        <table class="box-border bottom-1 text-center">
            <thead class="font-semibold">
                <tr class="h-10">
                    <td class="border-2 border-black w-16">No</td>
                    <td class="border-2 border-black w-52">Email</td>
                    <td class="border-2 border-black w-52">Nama</td>
                    <td class="border-2 border-black w-52">No HP</td>
                    <td class="border-2 border-black w-52">Alamat</td>
                </tr>
            </thead>
            <tbody>
                @php $angka = 1; @endphp
                @foreach ($users as $key => $user)
                @if ($user->role == 'user')
                <tr class="h-8">
                    <td class="border-2 border-black">{{ $angka }}</td>
                    <td class="border-2 border-black">{{ $user->email }}</td>
                    <td class="border-2 border-black">{{ $user->name }}</td>
                    <td class="border-2 border-black">{{ $user->no_hp }}</td>
                    <td class="border-2 border-black">{{ $user->alamat   }}</td>
                </tr>
                @php $angka++; @endphp
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection