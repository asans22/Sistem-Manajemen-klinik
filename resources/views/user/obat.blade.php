@extends ('layouts.layout')
@section ('content')

@include ('layouts.component.header', ['pageTitle' => 'Daftar Obat'], ['description' => 'Obat yang tertera adalah obat yang tersedia di klinik kami'])

<div class="flex flex-wrap justify-center m-20">
    @foreach($obats as $obat)
    <div class="flex flex-wrap w-80 h-96 border m-10 border-slate-500 rounded-3xl hitem transform transition duration-300 ease-in-out hover:scale-105 shadow-xl hover:shadow-3xl ">
        <div class="flex flex-col w-full items-center justify-center">
            <div class="mb-5">
                <img src="{{ url('assets/img/img-list-obat.png') }}" alt="">
            </div>
            <p class="text-xl font-semibold text-navy">Stok: {{ $obat->stok }}</p>
            <p class="text-lg font-normal text-navy">Jenis: {{ $obat->jenis }}</p>
            <p class="text-2xl font-bold text-navy">{{ $obat->name }}</p>
        </div>
    </div>
    @endforeach
</div>

@endsection
