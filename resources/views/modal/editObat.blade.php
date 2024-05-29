<div id="modalEditObat" class="fixed z-10 inset-0 overflow-y-auto hidden">
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
                            Edit Data Obat
                        </h3>
                        <div class="mt-2">
                            <form method="POST" action="{{ route('obat.update') }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" id="editId">
                                <div class="mb-4">
                                    <label for="editName" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                                    <input type="text" name="name" id="editName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mb-4">
                                    <label for="editJenis" class="block text-gray-700 text-sm font-bold mb-2">Jenis:</label>
                                    <input type="text" name="jenis" id="editJenis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mb-4">
                                    <label for="editStok" class="block text-gray-700 text-sm font-bold mb-2">Stok:</label>
                                    <input type="number" name="stok" id="editStok" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="flex items-center justify-between">
                                    <button type="submit" class="bg-neon hover:bg-[#1e939b] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Simpan
                                    </button>
                                    <button type="button" id="closeEditModal" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
