@extends ('layouts.layout')
@section ('content')

@include ('layouts.component.header', ['pageTitle' => 'pesan Reservasi Anda'], ['description' => 'Pilih waktu yang nyaman untuk kunjungan dan pemeriksaan anda.'])
{{-- main start --}}
<div class="my-10 flex flex-row">
    {{-- image start --}}
    <div class="flex w-1/2 px-24 h-[500px] ">
        <img class="" src="{{ url('assets/img/reservasi.jpeg') }}" alt="">
    </div>
    {{-- image end --}}

    {{-- form reservasi start--}}
    <div class="flex flex-col justify-items-center ml-16">
        <h2  class="font-bold text-4xl text-navy my-3">Detil Formulir Reservasi</h2>
        <p class="font-medium text-base text-navy my-3">Silahkan isi informasi yang diperlukan</p>
        <form action="reservasi" method="POST">
            @csrf
            <div class="">
                <label  for="spesialis" class="block text-xl font-semibold leading-6 text-navy my-2">Pilih Poli</label>
                <div class="mt-2 mb-5">
                    <select id="spesialis" name="spesialis" autocomplete="spesialis" required class="block w-full border border-solid border-slate-400 rounded-md hover:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2">
                        <option value="" >Poli Umum</option>
                        <option value="spesialis1">Poli 1</option>
                        <option value="spesialis2">Poli 2</option>
                        <option value="spesialis3">Poli 3</option>
                        <!-- Tambahkan lebih banyak opsi sesuai kebutuhan -->
                    </select>
            </div>   

            <div>
                <label for="dokter" class="block text-xl font-semibold leading-6 text-navy my-2">Pilih Dokter</label>
                <div class="mt-2 mb-5">
                    <select id="dokter" name="dokter" autocomplete="dokter" required class="block w-full border border-solid border-slate-400 rounded-md hover:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2">
                        <option value="spesialis1">Dokter A</option>
                        <option value="spesialis2">Dokter B</option>
                        <option value="spesialis3">Dokter C</option>
                        <!-- Tambahkan lebih banyak opsi sesuai kebutuhan -->
                    </select>
            </div>   
            
            <div>
                <label for="tanggal" class="block text-xl font-semibold leading-6 text-navy my-2">Pilih Tanggal Daftar</label>
                <div class="mt-2 mb-5">
                    <input type="date" id="tanggal" class="block w-full border border-solid border-slate-400 rounded-md hover:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" name="tanggal">
                   
            </div>   
                
                
            <div>
                <label for="jadwal" class="block text-xl font-semibold leading-6 text-navy my-2">Pilih Jadwal Dokter</label>
                <div class="mt-2 mb-5">
                    <select id="jadwal" name="jadwal" autocomplete="jadwal" required class="block w-full border border-solid border-slate-400 rounded-md hover:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2">
                        <option value="" disabled selected>Jadwal Dokter</option>
                        <option value="spesialis1">pagi pukul(8.00 - 10.00)</option>
                        <option value="spesialis2">siang pukul(14.00 - 16.00)</option>
                        <option value="spesialis3">malam pukul (20.00 - 22.00)</option>
                        <!-- Tambahkan lebih banyak opsi sesuai kebutuhan -->
                    </select>
            </div>   

            <div>
                <label for="keluhan" class="block text-xl font-semibold leading-6 text-navy my-2">Keluahan yang dirasakan</label>
                <div class="mt-2 mb-10">
                    <input id="keluhan" value="" name="keluhan" type="text" autocomplete="keluhan" required class="block w-full border border-solid border-slate-400 rounded-md hover:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2">
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-navy px-3 py-2.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-sky">Daftar</button>
            </div>

        </form>
    </div>
    {{-- form reservasi end --}}
</div>

@endsection