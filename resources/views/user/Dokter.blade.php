@extends ('layouts.layout')
@section ('content')

@include ('layouts.component.header', ['pageTitle' => 'Daftar Dokter'], ['description' => 'Informasi daftar dokter'])

<ul class="flex flex-col gap-7 my-16 mx-48">
    @foreach($doctors as $doctors)
    <li class="flex justify-between items-center py-5 font-poppins">
        <div class="flex items-center gap-5">
            @if ($doctors->image && file_exists(public_path('images/' . $doctors->image)))
            <div class="h-24 w-24 mr-10">
                <img src="{{ asset('images/' . $doctors->image) }}" alt="Foto Dokter" class="rounded-full bg-linen h-full w-full flex-shrink-0 ">
            </div>
            @else
            <!-- Gambar default jika tidak ada gambar -->
            <div class="h-24 w-24 mr-10">
                <img src="{{ url('assets/img/doctor_default.png') }}" alt="Foto Dokter" class="rounded-full bg-linen w-full h-full flex-shrink-0">
            </div>
            @endif

            <div class="text-navy">
                <h2 class="font-bold text-xl">{{ $doctors->name }}</h2>
                <p class="mt-1 font-light">{{ $doctors->spesialis }}</p>
                <p class="mt-2 truncate text-sm font-normal">{{ $doctors->deskripsi }}</p>
                <p class="mt-1 truncate text-sm font-normal">{{ $doctors->jadwal }}</p>
            </div>
        </div>

        <div class="flex flex-col items-end bg-navy rounded-lg hover:bg-blue-sky hover:rounded-lg active:bg-black mt-2 justify-end">
            <div style="margin-left: auto;">
                <a href="{{ route('reservasiDokter', ['id' => $doctors->id]) }}" class="bg-navy rounded-lg hover:bg-blue-sky hover:rounded-lg active:bg-black mt-2 justify-end">
                    <p class="p-3 text-light">Reservasi</p>
                </a>
            </div>
        </div>

    </li>
    @endforeach
</ul>

@endsection