@extends ('layouts.layout')
@section ('content')

@include ('layouts.component.header', ['pageTitle' => 'Daftar Dokter'], ['description' => 'Informasi daftar dokter'])

<ul class="flex flex-col gap-7 my-16 mx-48">
    @foreach($doctors as $doctor)
    <li class="flex justify-between items-center py-5 font-poppins">
        <div class="flex items-center gap-5">
            <img class="rounded-full bg-linen h-24 w-24 flex-shrink-0 mr-10" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            <div class="text-navy">
                <h2 class="font-bold text-xl">{{ $doctor->user->name }}</h2>
                <p class="mt-1 font-light">{{ $doctor->spesialisasi }}</p>
                <p class="mt-2 truncate text-sm font-normal">{{ $doctor->deskripsi }}</p>
                <p class="mt-1 truncate text-sm font-normal">{{ $doctor->jadwal }}</p>
            </div>
        </div>
        <div class="flex flex-col items-end">
            <div style="margin-left: auto;">
                <button class="bg-navy rounded-lg hover:bg-blue-sky hover:rounded-lg active:bg-black mt-2 justify-end">
                    <p class="p-3 text-light">Reservasi</p>
                </button>
            </div>
        </div>
    </li>
    @endforeach
</ul>

@endsection