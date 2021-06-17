<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="forNama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                            <input type="text" wire:model="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forNama">
                            @error('nama')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Gambar:</label>
                            <div class="custom-file">
                                <input wire:model="gambar" type="file" class="custom-file-input" id="customfile">
                                <label for="customfile" class="custom-file-label">Choose Image</label>
                                @error('gambar')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            </div>
                            {{-- @if ($gambar)
                                <label class="mt-2">Preview Gambar :</label>
                                <img src="{{ $gambar->temporaryUrl()}}" class="img-fluid"alt="Preview Gambar">
                                 @endif --}}
                        </div>
                        <div class="mb-4">
                            <label for="forDeskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
                            <input type="text" wire:model="deskripsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forDeskripsi">
                            @error('deskripsi')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="forHarga" class="block text-gray-700 text-sm font-bold mb-2">Harga:</label>
                            <input type="text" wire:model="harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forHarga">
                            @error('harga')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    <i class="fas fa-save mr-3 "></i>Simpan
                                </button>
                            </span>
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                                <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-red-300 px-4 py-2 bg-red text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-red-500 focus:outline-none focus:border-red-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                                    <i class="far fa-window-close mr-3"></i>    Batal
                                </button>
                            </span>

                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
