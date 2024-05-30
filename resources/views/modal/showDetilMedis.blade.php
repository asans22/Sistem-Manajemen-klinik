<div id="modalShowDetilMedis" data-route="{{ route('showDetilMedis') }}" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center w-full sm:mt-0 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Detil Catatan Medis
                        </h3>
                        <div class="">
                            <table class="box-border bottom-1 text-center">
                                <thead class="font-semibold">
                                    <tr class="h-10">
                                        <td class="border-2 border-black w-16">No</td>
                                        <td class="border-2 border-black w-40">Email</td>
                                        <td class="border-2 border-black w-40">Nama</td>
                                        <td class="border-2 border-black w-40">Alamat</td>
                                        <td class="border-2 border-black w-48">Berobat ke Spesialis</td>
                                        <td class="border-2 border-black w-40">Dokter</td>
                                        <td class="border-2 border-black w-52">Jadwal Berobat</td>
                                        <td class="border-2 border-black w-44">Tanggal Berobat</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien as $user)
                                        @if ($user->name == auth()->user()->name)
                                            <tr class="h-10">
                                                <td class="border-2 border-black">{{ $loop->iteration }}</td>
                                                <td class="border-2 border-black">{{ $user->email }}</td>
                                                <td class="border-2 border-black">{{ $user->name }}</td>
                                                <td class="border-2 border-black">{{ $user->address }}</td>
                                                <td class="border-2 border-black">{{ $user->specialist }}</td>
                                                <td class="border-2 border-black">{{ $user->doctor }}</td>
                                                <td class="border-2 border-black">{{ $user->appointment_schedule }}</td>
                                                <td class="border-2 border-black">{{ $user->appointment_date }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" id="closeShowDetilMedis" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
