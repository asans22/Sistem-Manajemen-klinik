@extends('layouts.app')

@section('container')
    <div class="my-10 py-10 border-b-2 pl-10 border-slate-400">
        <h1 class="font-bold text-3xl">Data Obat</h1>
    </div>

    <!-- Tombol Tambah -->
    <div id="openModal" class="box-border border-2 border-button hover:bg-[#1e939b] ml-10 inline-block mb-5 py-1 px-3 rounded-md text-base font-semibold bg-neon text-blue hover:text-white hover:scale-105 active:scale-100 hover:duration-75 cursor-pointer">
        <p data-toggle="modal" data-target="#modalCreate">Tambah</p>
    </div>

    <!-- Sertakan Modal -->
    @include('modal.createObat')
    @include('modal.editObat')

    <div class="pl-10">
        <table class="box-border bottom-1 text-center">
            <thead class="font-semibold">
                <tr class="h-12">
                    <td class="border-2 border-black w-16">No</td>
                    <td class="border-2 border-black w-52">Nama</td>
                    <td class="border-2 border-black w-52">Jenis</td>
                    <td class="border-2 border-black w-52">Stok</td>
                    <td class="border-2 border-black w-52">Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($obats as $item => $obat)
                <tr class="h-8">
                    <td class="border-2 border-black">{{ $item + 1 }}</td>
                    <td class="border-2 border-black">{{ $obat->name }}</td>
                    <td class="border-2 border-black">{{ $obat->jenis }}</td>
                    <td class="border-2 border-black">{{ $obat->stok }}</td>
                    <td class="border-2 border-black">
                        <div class="flex flex-row justify-center">
                            <button class="openEditModal box-border border-2 flex flex-row w-16 px-2 rounded text-white border-button bg-navy mr-5 py-0.2 hover:scale-105 active:scale-100 hover:duration-75" data-id="{{ $obat->id }}">
                                <svg width="15" height="15" viewBox="0 0 144 144" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M107.753 0L89.7943 17.9589L125.712 53.8766L143.671 35.9177L107.753 0ZM71.8355 35.9177L0 107.753V143.671H35.9177L107.753 71.8355L71.8355 35.9177Z" fill="white"/>
                                </svg>
                                <p>edit</p>
                            </button>
                            <form method="POST" action="{{ route('obat.destroy', $obat->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="box-border border-2 flex flex-row w-16 px-2 rounded text-white border-red-700 bg-red-600 py-0.2 hover:scale-105 active:scale-100 hover:duration-75">
                                    <svg width="15" height="15" viewBox="0 0 144 144" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M107.753 0L89.7943 17.9589L125.712 53.8766L143.671 35.9177L107.753 0ZM71.8355 35.9177L0 107.753V143.671H35.9177L107.753 71.8355L71.8355 35.9177Z" fill="white"/>
                                    </svg>
                                    <p>Hapus</p>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event listener untuk membuka modal tambah
            document.getElementById('openModal').addEventListener('click', function() {
                document.getElementById('modalCreateObat').classList.remove('hidden');
            });

            // Event listener untuk menutup modal tambah
            document.getElementById('closeCreateModal').addEventListener('click', function() {
                document.getElementById('modalCreateObat').classList.add('hidden');
            });

            // Event listener untuk membuka modal edit
            document.querySelectorAll('.openEditModal').forEach(button => {
                button.addEventListener('click', function() {
                    let modalEdit = document.getElementById('modalEditObat');
                    let id = this.getAttribute('data-id');
                    // Set the values for the form fields inside modal based on the selected obat
                    fetch(`/obat/${id}`)
                        .then(response => response.json())
                        .then(data => {
                            modalEdit.querySelector('#editId').value = data.id;
                            modalEdit.querySelector('#editName').value = data.name;
                            modalEdit.querySelector('#editJenis').value = data.jenis;
                            modalEdit.querySelector('#editStok').value = data.stok;
                            modalEdit.classList.remove('hidden');
                        });
                });
            });

            // Event listener untuk menutup modal edit
            document.getElementById('closeEditModal').addEventListener('click', function() {
                document.getElementById('modalEditObat').classList.add('hidden');
            });
        });
    </script>
@endsection
