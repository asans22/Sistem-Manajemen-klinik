@extends('layouts.app')

@section('container')
    <!-- Isi konten halaman di sini -->
    <div class="my-10 py-10 border-b-2 pl-10 border-slate-400">
        <h1 class="font-bold text-3xl">Data Dokter</h1>
    </div>

    <div id="openModalCreateDokter" class="box-border border-2 border-button hover:bg-neon ml-10 inline-block mb-5 py-1 px-3 rounded-md text-base font-semibold bg-blue-sky text-navy hover:text-blue">
        <p data-toggle="modalDokter" data-target="#modalCreateDokter">Tambah</p>
    </div>
    
    @include('modal.createDokter')
    @include('modal.editDokter')

    <div class="pl-10">
        <table class="box-border bottom-1 text-center">
            <thead class="font-semibold">
                <tr class="h-10">
                    <td class="border-2 border-black w-16">No</td>
                    <td class="border-2 border-black w-52">Email</td>
                    <td class="border-2 border-black w-52">ID Dokter</td>
                    <td class="border-2 border-black w-52">Nama</td>
                    <td class="border-2 border-black w-52">Alamat</td>
                    <td class="border-2 border-black w-52">No HP</td>
                    <td class="border-2 border-black w-52">Password</td>
                    <td class="border-2 border-black w-36">Spesialis</td>
                    <td class="border-2 border-black w-52">Jadwal Praktek</td>
                    <td class="border-2 border-black w-20">Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokters as $item => $dokter)
                <tr class="h-8">
                    <td class="border-2 border-black">{{ $item + 1 }}</td>
                    <td class="border-2 border-black">{{ $dokter->email }}</td>
                    <td class="border-2 border-black">{{ $dokter->id_dokter }}</td>
                    <td class="border-2 border-black">{{ $dokter->name }}</td>
                    <td class="border-2 border-black">{{ $dokter->alamat }}</td>
                    <td class="border-2 border-black">{{ $dokter->no_hp }}</td>
                    <td class="border-2 border-black">{{ $dokter->password }}</td>
                    <td class="border-2 border-black">{{ $dokter->spesialis }}</td>
                    <td class="border-2 border-black">{{ $dokter->jadwal }}</td>
                    <td class="border-2 border-black">
                        <button class="openEditModalDokter box-border border-2 flex flex-row w-16 px-2 rounded text-white border-button bg-navy mx-auto py-0.5 hover:scale-105 active:scale-100 hover:duration-75" data-id="{{ $dokter->id }}">
                            <svg width="15" height="15" viewBox="0 0 144 144" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M107.753 0L89.7943 17.9589L125.712 53.8766L143.671 35.9177L107.753 0ZM71.8355 35.9177L0 107.753V143.671H35.9177L107.753 71.8355L71.8355 35.9177Z" fill="white"/>
                            </svg>
                            <p>edit</p>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Event listener untuk membuka modal createDokter
        document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('openModalCreateDokter').addEventListener('click', function() {
        document.getElementById('modalCreateDokter').classList.remove('hidden');
    });

    document.getElementById('closeCreateModalDokter').addEventListener('click', function() {
        document.getElementById('modalCreateDokter').classList.add('hidden');
    });

    document.querySelectorAll('.openEditModalDokter').forEach(button => {
        button.addEventListener('click', function() {
            let modalEdit = document.getElementById('modalEditDokter');
            let id = this.getAttribute('data-id');
            fetch(`/adminDokter/${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data && data.id) {
                        modalEdit.querySelector('#editId').value = data.id;
                        modalEdit.querySelector('#editEmail').value = data.email;
                        modalEdit.querySelector('#editId_dokter').value = data.id_dokter;
                        modalEdit.querySelector('#editName').value = data.name;
                        modalEdit.querySelector('#editAlamat').value = data.alamat;
                        modalEdit.querySelector('#editNo_hp').value = data.no_hp;
                        modalEdit.querySelector('#editPassword').value = data.password;
                        modalEdit.querySelector('#editSpesialis').value = data.spesialis;
                        modalEdit.querySelector('#editJadwal').value = data.jadwal;
                        modalEdit.classList.remove('hidden');
                    } else {
                        console.error('Data tidak ditemukan');
                    }
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    });

    document.getElementById('closeEditModalDokter').addEventListener('click', function() {
        document.getElementById('modalEditDokter').classList.add('hidden');
    });
});

    </script>
@endsection
