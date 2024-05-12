@extends ('layouts.layout')
@section ('content')

@include ('layouts.component.header', ['pageTitle' => 'Selamat Datang'], ['description' => 'Kami siap akan memberikan layanan kesehatan terbaik bagi Anda dan keluarga'])

<div class="flex justify-center gap-10 text-center font-poppins">
    <div class="w-[40%] hover:shadow-navy p-16 my-16 shadow-md rounded-lg border-solid border-[1px] border-blue flex flex-col justify-center items-center transform hover:scale-105 transition duration-300">
        <div class="mx-24 pb-48">
            <div class="mx-auto rounded-full bg-linen h-24 w-24 flex items-center justify-center mb-6">
                <img src="{{ url('assets/img/img-upcoming-event.png') }}" alt="Logo" class="h-16">
            </div>
            <h5 class="mb-1 text-[18px] text-navy font-normal">Pemesanan Mendatang</h5>
            <p class="mb-6 text-sm text-[16px] text-navy font-normal">Kelola</p>
            <h1 class="text-2xl text-[20px] text-navy font-bold">Lakukan Reservasi</h1>
        </div>
    </div>
    <div class="w-[40%] hover:shadow-navy p-16 my-16 shadow-md  rounded-lg border-solid border-[1px] border-blue flex flex-col justify-center items-center transform hover:scale-105 transition duration-300">
        <div class="mx-24 pb-48">
            <div class="mx-auto rounded-full bg-linen h-24 w-24 flex items-center justify-center mb-6">
                <img src="{{ url('assets/img/img-list-obat.png') }}" alt="Logo" class="h-16">
            </div>
            <h5 class="mb-1 text-[18px] text-navy font-normal">Obat</h5>
            <p class="mb-6 text-sm text-[16px] text-navy font-normal">Detil</p>
            <h1 class="text-2xl text-[20px] text-navy font-bold">Lihat Obat</h1>
        </div>
    </div>
</div>





@endsection