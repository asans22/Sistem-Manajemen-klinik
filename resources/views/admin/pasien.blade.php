@extends('layouts.app')

@section('container')
<!-- Isi konten halaman di sini -->
<div class=" my-10 py-10 border-b-2 pl-10 border-slate-400 ">
    <h1 class=" font-bold text-3xl">Data Pasien</h1>
</div>

<div class="pl-10 pr-5">
    <table class="box-border bottom-1 text-center">
        <thead class="font-semibold">
            <tr class="h-10 ">
                <td class="border-2 border-black w-16">No</td>
                <td class="border-2 border-black w-40">Email</td>
                <td class="border-2 border-black w-40">Nama</td>
                <td class="border-2 border-black w-40">Alamat</td>
                <td class="border-2 border-black w-48">Berobat ke Spesialis</td>
                <td class="border-2 border-black w-40">Dokter</td>
                <td class="border-2 border-black w-52">Jadwal Berobat</td>
                <td class="border-2 border-black w-44">Tanggal Berobat</td>
            </tr>
        </thead>
        <tbody>
            @foreach($pasien as $index => $pasien)
            <tr class="h-8">
                <td class="border-2 border-black">{{ $index + 1 }}</td>
                <td class="border-2 border-black">{{ $pasien->email }}</td>
                <td class="border-2 border-black">{{ $pasien->name }}</td>
                <td class="border-2 border-black">{{ $pasien->alamat }}</td>
                <td class="border-2 border-black">{{ $pasien->spesialis }}</td>
                <td class="border-2 border-black">{{ $pasien->dokter }}</td>
                <td class="border-2 border-black">{{ $pasien->jadwal }}</td>
                <td class="border-2 border-black">{{ $pasien->tanggal }}</td>

            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection