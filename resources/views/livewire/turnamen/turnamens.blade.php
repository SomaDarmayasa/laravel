
<div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 ">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Turnamen
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
                    <button wire:click="createturnamen()" class="bg-purple-700 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded my-3">
                        <i class="fas fa-calendar-plus mr-3"></i>
                        Tambah Info Turnamen / Scrim</button>

                    @if ($isModal)

                        @include('livewire.turnamen.createturnamens')

                    @endif
                    <input type="search" class="form-control rounded float-right" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" wire:model ="search">




                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-red-400 text-white font-bold py-2 px-4 rounded">
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Turnamen/Scrim</th>
                                <th class="px-4 py-2" width="20%">Gambar</th>
                                <th class="px-4 py-2">Tim Yang Diikuti</th>
                                <th class="px-4 py-2">Pelatih Tim</th>
                                <th class="px-4 py-2">Tanggal Turnamen</th>
                                <th class="px-4 py-2">Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($turnamens as $index=>$turnamen)
                                <tr>
                                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $turnamen->namaturnamen }}</td>
                                    <td class="border px-4 py-2"><img src="{{ asset('storage/gambar/'.$turnamen->gambar)}}" alt="gambar turnamen" class="img-fluid"></td>
                                    <td class="border px-4 py-2">{{ $turnamen->role}}</td>
                                    <td class="border px-4 py-2">{{ $turnamen->nama}}</td>
                                    <td class="border px-4 py-2">{{ $turnamen->tgl}}</td>
                                    <td class="border px-4 py-2">
                                        {{-- edit&delet data --}}
                                        {{-- <button wire:click="edit({{ $turnamen->id }})" class="bg-green-500 hover:green-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-edit"></i>
                                        </button> --}}
                                        <button  wire:click="delete({{ $turnamen->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-center">
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

