@extends ('layouts.layout')
@section ('content')

@include ('layouts.component.header', ['pageTitle' => 'Akun'], ['description' => 'Pengaturan informasi akun'])

<div class="font-poppins bg-white rounded px-[30%] mt-12 pb-8 mb-4 text-navy">
    <div class="text-3xl text-navy font-bold text-center my-8">
        <h2>Perbarui Informasi Profil</h2>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-sm mb-2" for="nama">
            Nama
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="nama" type="text" placeholder="Masukkan nama">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-sm mb-2" for="telepon">
            No. Telepon
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="telepon" type="text" placeholder="Masukkan nomor telepon">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-sm mb-2" for="email">
            Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Masukkan email">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-sm mb-2" for="alamat">
            Alamat
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="alamat" type="text" placeholder="Masukkan alamat">
    </div>
    <div class="flex items-center justify-center mt-8">
        <button class="bg-blue-500 hover:bg-blue-700 text-linen bg-navy font-bold py-3 px-4 rounded-[7px] hover:text-blue-sky hover:bg-black hover:rounded-none active:text-black active:bg-transparent focus:ring focus:ring-blue-sky" type="button">
            Simpan Perubahan
        </button>
    </div>
</div>

<div>
    <div class="flex font-poppins">
        <div class="w-[85%] m-auto hover:shadow-navy p-16 my-16 shadow-md rounded-lg border-solid border-[1px] border-blue flex flex-col  transform hover:scale-105 transition duration-300">
            <div class="flex flex-row items-center justify-between">
                <div class="text-navy text-3xl font-bold">
                    <h4>Catatan Medis</h4>
                </div>
                <div class="text-center mr-7">
                    <div class="mx-auto rounded-full bg-linen h-24 w-24 flex items-center justify-center mb-6">
                        <img src="{{ url('assets/img/img-upcoming-event.png') }}" alt="Logo" class="h-16">
                    </div>
                    <h5 class="mb-1 text-[18px] text-navy font-normal">Terkini</h5>
                    <p class="mb-6 text-sm text-[16px] text-navy font-normal">Lihat Detil</p>
                    <h1 class="text-2xl text-[20px] text-navy font-bold">Catatan terakhir</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="flex font-poppins">
        <div class="w-[85%] m-auto hover:shadow-navy p-16 mt-0 mb-24 my-16 shadow-md rounded-lg border-solid border-[1px] border-blue flex flex-col  transform hover:scale-105 transition duration-300">
            <div class="flex flex-row items-center justify-between">
                <div class="text-navy text-3xl font-bold">
                    <h4>Reservasi</h4>
                </div>
                <div class="text-center">
                    <div class="mx-auto rounded-full bg-linen h-24 w-24 flex items-center justify-center mb-6">
                        <img src="{{ url('assets/img/img-upcoming-event.png') }}" alt="Logo" class="h-16">
                    </div>
                    <h5 class="mb-1 text-[18px] text-navy font-normal">Pemesanan Mendatang</h5>
                    <p class="mb-6 text-sm text-[16px] text-navy font-normal">Lihat Detil</p>
                    <h1 class="text-2xl text-[20px] text-navy font-bold">Reservasi mendatang</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection