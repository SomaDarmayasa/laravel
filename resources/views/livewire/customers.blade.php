
<div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 ">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Pelanggan saya
                 </h1>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"  role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('message')}}</p>
                                </div>
                            </div>
                        </div>

                    @endif

                    {{-- tambah data --}}
                    <button wire:click="create()" class="bg-purple-700 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded my-3">
                        <i class="fas fa-user-plus mr-3"></i>
                        Tambah Pelanggan</button>

                    @if ($isModal)

                        @include('livewire.create')

                    @endif

                    <input type="search" class="form-control rounded float-right" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" wire:model ="search">




                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-red-400 text-white font-bold py-2 px-4 rounded">
                                <th class="px-4 py-2">ID Player</th>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">No Telp/WA</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Item Pembelian</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customers as $customer)
                                <tr>
                                    <td class="border px-4 py-2">{{ $customer->idplayer }}</td>
                                    <td class="border px-4 py-2">{{ $customer->nama }}</td>
                                    <td class="border px-4 py-2">{{ $customer->telp }}</td>
                                    <td class="border px-4 py-2">{!!$customer->status_label!!}</td>
                                    <td class="border px-4 py-2">{{ $customer->item}}</td>

                                    <td class="border px-4 py-2">
                                        {{-- edit&delet data --}}
                                        <button wire:click="edit({{ $customer->id }})" class="bg-green-500 hover:green-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button  wire:click="delete({{ $customer->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
