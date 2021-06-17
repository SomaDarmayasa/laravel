<x-template-layout>


    <div>
        <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 ">

        <nav class="navbar navbar-light">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Anggota Squad
            </h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="row">

                            <div class="form-group col-span-6 p-4 flex justify-end">
                                <form action="/cari" method="get">
                                    <input placeholder="Cari Nama" type="search" name="search" placeholder="Search"
                                        class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                                        <button class="rounded-r-md border border-1-0 px-4 py-1 border-gray-300 bg-gray-50 text-gray-500 text-black hover:text-white hover:bg-blue-600"
                                type="submit" class="btn btn-primary mb-2">
                                <i class="fas fa-search"></i>
                                Cari</button>
                            </div>

                            </form>
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-4">
                                    <a href="{{ route('student.create') }}"><button class="bg-purple-700 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded my-3">
                                        <i class="fas fa-user-plus mr-3"></i>
                                         TAMBAH ANGGOTA SQUAD</button></a>
                                    <!--<a href=""><button class="px-4 py-1 text-sm rounded text-green-600 font-semibold border border-green-200 hover:text-white hover:bg-green-600 hover:border-transparent focus:outline-none">PUBLISH</button></a>
                                    <a href=""><button class="px-4 py-1 text-sm rounded text-red-600 font-semibold border border-red-200 hover:text-white hover:bg-red-600 hover:border-transparent focus:outline-none">DELETE</button></a> -->
                                </div>
                            </div>


                    </div>
                </div>
        </nav>

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg m-3">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-red-400">
                   <tr class="text-lg text-white font-bold py-2 px-4 rounded">
                        {{-- <th>Tandai</th> --}}
                       <th>No</th>
                       <th>Nama</th>
                       <th>Team</th>
                       <th>NickName</th>
                       <th>Jenis Kelamin</th>
                       <th>No Telepon/WA</th>
                       <th>Aksi</th>
                   </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                   @foreach ($students as $item)
                            <tr>
                                {{-- <td><input type="checkbox" name="" id=""></td> --}}
                                <td scope ="row" class="border px-4 py-2" >{{ $loop->iteration}}</td>
                                <td class="border px-4 py-2">{{ $item->nama }}</td>
                                <td class="border px-4 py-2">{{ $item->role->role }}</td>
                                <td class="border px-4 py-2">{{ $item->nickname }}</td>
                                <td class="border px-4 py-2">{{ $item->gender }}</td>
                                <td class="border px-4 py-2">{{ $item->telp }}</td>
                                <td>
                                    <form action="{{ route('student.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('student.edit', $item->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="submit" class=" btn btn-xs p-2  bg-red-500 m-3 hover:bg-red-200 text-white- font-bold py-2 px-4 rounded ">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                   @endforeach

                  </tbody>
                </table>

              </div>
              {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{$students->links()}}
        </div>
        </div>
    </div>

</x-app-template>
