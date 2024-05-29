@extends ('layouts.layout')
@section ('content')

@include ('layouts.component.header', ['pageTitle' => 'Pesan Reservasi Anda'], ['description' => 'Pilih waktu yang nyaman untuk kunjungan dan pemeriksaan anda.'])
{{-- main start --}}
<div class="my-10 mx-10 flex flex-row">
    {{-- image start --}}
    <div class="flex w-[50%] ml-10 mt-10 h-[500px] ">
        <img class="" src="{{ url('assets/img/reservasi.jpeg') }}" alt="">
    </div>
    {{-- image end --}}

    {{-- form reservasi start--}}
    <div class="flex flex-col justify-items-center ml-16 font-poppins">
        <h2 class="font-bold text-4xl text-navy my-3">Detil Formulir Reservasi</h2>
        <p class="font-medium text-base text-navy my-3">Silahkan isi informasi yang diperlukan</p>
        <form action="{{ route('reservasi.store') }}" method="POST">
            @csrf
            <div class="">
                <label for="spesialis" class="block text-xl font-semibold leading-6 text-navy my-2">Pilih Spesialis</label>
                <div class="mt-2 mb-5">
                    <select id="spesialis" name="spesialis" autocomplete="spesialis" required class="block w-full border border-solid border-slate-400 rounded-md hover:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2">
                        <option value="" disabled>Pilih Spesialis</option>
                        <option value="{{ $dokter->spesialis }}" selected>{{ $dokter->spesialis }}</option>
                        @foreach ($allDokters as $doc)
                        @if ($doc->spesialis !== $dokter->spesialis)
                        <option value="{{ $doc->spesialis }}">{{ $doc->spesialis }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="dokter" class="block text-xl font-semibold leading-6 text-navy my-2">Pilih Dokter</label>
                    <div class="mt-2 mb-5">
                        <select id="dokter" name="dokter" autocomplete="dokter" required class="block w-full border border-solid border-slate-400 rounded-md hover:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2">
                            <option value="" disabled>Pilih Dokter</option>
                            <option value="{{ $dokter->name }}" selected>{{ $dokter->name }}</option>
                            @foreach ($allDokters as $doc)
                            @if ($doc->spesialis === $dokter->spesialis && $doc->name !== $dokter->name)
                            <option value="{{ $doc->name }}">{{ $doc->name }}</option>
                            @endif
                            @endforeach
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
                                    <option value="" disabled>Pilih Jadwal</option>
                                    <option value="{{ $dokter->jadwal }}" selected>{{ $dokter->jadwal }}</option>
                                    @foreach ($allDokters as $doc)
                                    @if ($doc->spesialis === $dokter->spesialis && $doc->jadwal !== $dokter->jadwal)
                                    <option value="{{ $doc->jadwal }}">{{ $doc->jadwal }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="keluhan" class="block text-xl font-semibold leading-6 text-navy my-2">Keluhan yang dirasakan</label>
                                <div class="mt-2 mb-10">
                                    <input id="keluhan" value="" name="keluhan" type="text" autocomplete="keluhan" required class="block w-full border border-solid border-slate-400 rounded-md hover:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2">
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="flex w-full justify-center rounded-md bg-navy px-3 py-2.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-sky">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- form reservasi end --}}
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const spesialisSelect = document.getElementById('spesialis');
        spesialisSelect.addEventListener('change', function() {
            const selectedSpesialis = spesialisSelect.value;

            fetch(`/get-doctors/${selectedSpesialis}`)
                .then(response => response.json())
                .then(data => {
                    const dokterSelect = document.getElementById('dokter');
                    dokterSelect.innerHTML = '<option value="" disabled selected>Pilih Dokter</option>';

                    data.forEach(dokter => {
                        const option = document.createElement('option');
                        option.value = dokter.name;
                        option.textContent = dokter.name;
                        dokterSelect.appendChild(option);
                    });

                    // Trigger change event for the new doctor select
                    dokterSelect.dispatchEvent(new Event('change'));
                })
                .catch(error => console.error('Error fetching doctors:', error));
        });

        const dokterSelect = document.getElementById('dokter');
        dokterSelect.addEventListener('change', function() {
            const selectedDokter = dokterSelect.value;

            fetch(`/get-schedules/${selectedDokter}`)
                .then(response => response.json())
                .then(data => {
                    const jadwalSelect = document.getElementById('jadwal');
                    jadwalSelect.innerHTML = '<option value="" disabled selected>Pilih Jadwal</option>';

                    data.forEach(jadwal => {
                        const option = document.createElement('option');
                        option.value = jadwal.jadwal;
                        option.textContent = jadwal.jadwal;
                        jadwalSelect.appendChild(option);
                    });

                    // Trigger change event for the new schedule select
                    jadwalSelect.dispatchEvent(new Event('change'));
                })
                .catch(error => console.error('Error fetching schedules:', error));
        });
    });

    // JavaScript untuk menampilkan pesan sukses sebagai pop-up
    document.addEventListener("DOMContentLoaded", function() {
        @if(Session::has('success'))
        alert("{{ Session::get('success') }}");
        @endif
    });
</script>




@endsection