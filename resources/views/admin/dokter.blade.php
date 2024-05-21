@extends('layouts.app')

@section('container')
<div class="my-10 py-10 border-b-2 pl-10 border-slate-400 ">
    <h1 class="font-bold text-3xl">Data Dokter</h1>
</div>

<a href="{{ route('doctors.create') }}" class="box-border border-2 border-button hover:bg-neon ml-10 inline-block mb-5 py-1 px-3 rounded-md text-base font-semibold bg-blue-sky text-navy hover:text-blue">
    <p>Tambah</p>
</a>

<div class="pl-10">
    <table class="box-border bottom-1 text-center">
        <thead class="font-semibold">
            <tr class="h-10">
                <td class="border-2 border-black w-16">No</td>
                <td class="border-2 border-black w-52">Email</td>
                <td class="border-2 border-black w-52">ID Dokter</td>
                <td class="border-2 border-black w-52">Nama</td>
                <td class="border-2 border-black w-36">Spesialis</td>
                <td class="border-2 border-black w-52">Jadwal Praktek</td>
                <td class="border-2 border-black w-20">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr class="h-8">
                <td class="border-2 border-black">{{ $loop->iteration }}</td>
                <td class="border-2 border-black">{{ $doctor->user->email }}</td>
                <td class="border-2 border-black">{{ $doctor->id }}</td>
                <td class="border-2 border-black">{{ $doctor->user->name }}</td>
                <td class="border-2 border-black">{{ $doctor->spesialisasi }}</td>
                <td class="border-2 border-black">{{ $doctor->jadwal }}</td>
                <td class="border-2 border-black">
                    <a href="{{ route('doctors.edit', $doctor) }}" class="box-border border-2 flex flex-row w-16 px-2 rounded text-white border-button bg-navy mx-auto py-0.5 hover:scale-105 active:scale-100 hover:duration-75">
                        <svg width="15" height="15" viewBox="0 0 144 144" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M107.753 0L89.7943 17.9589L125.712 53.8766L143.671 35.9177L107.753 0ZM71.8355 35.9177L0 107.753V143.671H35.9177L107.753 71.8355L71.8355 35.9177Z" fill="white" />
                        </svg>
                        <p>edit</p>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection