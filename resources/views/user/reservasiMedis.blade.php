@extends('layouts.layout')

@section('content')

@include('layouts.component.header', ['pageTitle' => 'Reservasi', 'description' => 'Detil informasi catatan reservasi medis'])

<a href="myAccount" class="font-poppins flex w-[10%] ml-[12.5%] bg-navy rounded-lg hover:bg-blue-sky hover:rounded-lg active:bg-black mt-8">
    <p class="text-center p-3 w-full text-light">Kembali</p>
</a>
<div class="pl-10 my-10 flex justify-center">
    <table class="border-collapse border border-black w-[80%]">
        <thead>
            <tr>
                <th class="border border-black px-4 py-2">No</th>
                <th class="border border-black px-4 py-2">Dokter</th>
                <th class="border border-black px-4 py-2">Spesialis</th>
                <th class="border border-black px-4 py-2">Jadwal Dokter</th>
                <th class="border border-black px-4 py-2">Tanggal</th>
                <th class="border border-black px-4 py-2">Keluhan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservasi as $key => $user)
            @if ($user->name == auth()->user()->name)
            <tr class="text-center">
                <td class="border border-black px-4 py-2">{{ $key + 1 }}</td>
                <td class="border border-black px-4 py-2">{{ $user->dokter }}</td>
                <td class="border border-black px-4 py-2">{{ $user->spesialis }}</td>
                <td class="border border-black px-4 py-2">{{ $user->jadwal }}</td>
                <td class="border border-black px-4 py-2">{{ $user->tanggal }}</td>
                <td class="border border-black px-4 py-2">{{ $user->keluhan }}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection