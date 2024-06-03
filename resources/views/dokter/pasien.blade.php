<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>pasien terjadwal</title>
</head>

<body class="font-poppins">
    @include('modal.editPasien')
    <div>
        <div class="flex m-5 justify-end">
            <a class="bg-navy px-2 mr-5 rounded-md hover:bg-blue hover:text-navy hover:font-medium cursor-pointer text-linen" href="userLogout">Keluar</a>
            <p class="mr-2 text-right font-bold text-navy">{{ auth()->user()->name }}</p>
            <a>
                <svg width="24" height="24" viewBox="0 0 31 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5 0C11.2375 0 7.75 5.88 7.75 13.125C7.75 20.37 11.2375 26.25 15.5 26.25C19.7625 26.25 23.25 20.37 23.25 13.125C23.25 5.88 19.7625 0 15.5 0ZM7.40125 26.25C3.29375 26.5125 0 31.08 0 36.75V42H31V36.75C31 31.08 27.745 26.5125 23.5988 26.25C21.5063 29.4525 18.6388 31.5 15.5 31.5C12.3612 31.5 9.49375 29.4525 7.40125 26.25Z" fill="#2E4A70" fill-opacity="0.7" />
                </svg>
            </a>
        </div>

        <div class="h-36 w-full bg-navy">
            <p class="text-4xl font-bold text-white text-center pt-12">Data Pasien</p>
        </div>

        <div class="pl-10 pt-10 w-[80%] m-auto flex justify-center">
            <table class="border-collapse border w-full text-center border-black">
                <thead>
                    <tr>
                        <th class="border border-black px-4 py-2">No</th>
                        <th class="border border-black px-4 py-2">Nama Pasien</th>
                        <th class="border border-black px-4 py-2">Keluhan</th>
                        <th class="border border-black px-4 py-2">Obat</th>
                        <th class="border border-black px-4 py-2">Hasil Pemeriksaan</th>
                        <th class="border border-black px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $index => $pasien)
                    @if ($pasien->dokter == auth()->user()->name)
                    <tr>
                        <td class="border border-black px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-black px-4 py-2">{{ $pasien->name }}</td>
                        <td class="border border-black px-4 py-2">{{ $pasien->keluhan }}</td>
                        <td class="border border-black px-4 py-2">{{ $pasien->obat }}</td>
                        <td class="border border-black px-4 py-2">{{ $pasien->hasil_pemeriksaan }}</td>
                        <td class="border border-black px-4 py-2">
                            <button class="openEditModalPasien items-center gap-1 box-border border-2 flex flex-row w-16 px-2 rounded text-white border-button bg-navy mx-auto py-0.5 hover:scale-105 active:scale-100 hover:duration-75" data-id="{{ $pasien->id }}">
                                <svg width="15" height="15" viewBox="0 0 144 144" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M107.753 0L89.7943 17.9589L125.712 53.8766L143.671 35.9177L107.753 0ZM71.8355 35.9177L0 107.753V143.671H35.9177L107.753 71.8355L71.8355 35.9177Z" fill="white" />
                                </svg>
                                <p>Edit</p>
                            </button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
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
</body>
<script>
    // Event listener untuk membuka modal createDokter
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.openEditModalPasien').forEach(button => {
            button.addEventListener('click', function() {
                let modalEdit = document.getElementById('modalEditPasien');
                let id = this.getAttribute('data-id');
                fetch(`/dokterPasien/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.id) {
                            modalEdit.querySelector('#editId').value = data.id;
                            modalEdit.querySelector('#editKeluhan').value = data.keluhan;
                            modalEdit.querySelector('#editObat').value = data.obat;
                            modalEdit.querySelector('#editHasilPemeriksaan').value = data.hasil_pemeriksaan;
                            modalEdit.classList.remove('hidden');
                        } else {
                            console.error('Data tidak ditemukan');
                        }
                    })
                    .catch(error => console.error('Error fetching data:', error));
            });
        });

        document.getElementById('closeEditModalPasien').addEventListener('click', function() {
            document.getElementById('modalEditPasien').classList.add('hidden');
        });
    });
</script>

</html>