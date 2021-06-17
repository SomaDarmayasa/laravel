<div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 ">
    <div class="container">
    <div class="row">
        <div class ="col-md-8">
            <div class="card">
                <div class ="card-body">
                    <h1  class="font-semibold text-xl text-gray-800 leading-tight">List Produk Akun</h1>
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div  class="card-body" >
                                        <img src="{{ asset('storage/gambar/'.$product->gambar)}}" alt="product" class="img-fluid" width="20%">
                                    </div>
                                    <div class="card-footer">
                                        <h6 class="font-semibold  text-gray-800 ">{{ $product->nama }}</h6>
                                        <button wire:click="addItem({{ $product->id }})" class="inline-flex justify-center  rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Tambahkan ke keranjang</button>

                                </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

            <div class="card">
                 <div class ="card-body">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Keranjang</h2>
                    <table class="bg-red-400 text-white font-bold py-2 px-4 rounded">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Nama Akun</th>
                                <th class="px-4 py-2">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $index=>$cart )
                                <tr>
                                    <td class="border px-4 py-2">{{ $index +1 }}</td>
                                    <td class="border px-4 py-2">{{ $cart ['name']}}</td>
                                    <td class="border px-4 py-2">{{ $cart['price']}}</td>
                                </tr>
                            @empty
                            <td colspan="3">
                                <h6 class="text-center">Keranjang Kosong</h6>
                            </td>

                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="card">
                <div class ="card-body">
                    <h4 class="font-weight-bold">Jumlah Keranjang</h4>
                    <h5 class="font-weight-bold">Sub Total :{{ $summary['sub_total'] }}</h5>
                    <h5 class="font-weight-bold">Pajak :{{ $summary['pajak'] }}</h5>
                    <h5 class="font-weight-bold">Total :{{ $summary['total'] }}</h5>
                </div>
            </div>
