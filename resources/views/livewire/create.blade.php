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
                            <label for="forIdplayer" class="block text-gray-700 text-sm font-bold mb-2">ID Player:</label>
                            <input type="text" wire:model="idplayer" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forIdplayer">
                            @error('idplayer')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">

                            <label for="fornama" class="block text-gray-700 text-sm font-bold mb-2 ">Nama</label>

                            <select name="nama" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="nama">
                                <option value="">--Pilih--</option>
                                @foreach($students as $item)
                                <option value="{{$item->nama}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="forTelp" class="block text-gray-700 text-sm font-bold mb-2">No Telp/WA:</label>
                            <input type="text" wire:model="telp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forTelp">
                            @error('telp')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="forStatus" class="block text-gray-700 text-sm font-bold mb-2">Status Pembelian:</label>
                            <select  wire:model="status" id="forStatus" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="1">Royal Pass</option>
                                <option value="0">Regular</option>
                            </select>
                            @error('status')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="forItem" class="block text-gray-700 text-sm font-bold mb-2">Item Pembelian:</label>
                            <select  wire:model="item" id="forItem" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option >25 UC - Rp 5.000</option>
                                <option >35 UC - Rp 7.000</option>
                                <option >50 UC - Rp 10.000</option>
                                <option >70 UC - Rp 14.000</option>
                                <option >125 UC - Rp 25.000</option>
                                <option >250 UC - Rp 50.000</option>
                                <option >500 UC - Rp 100.000</option>
                                <option >1250 UC - Rp 250.000</option>
                                <option >Paket Royal Pass - Rp 150.000 </option>
                                <option >Paket Elit Pass Plus - Rp 360.000 </option>
                            </select>
                            @error('item')
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
