<x-template-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

    </h2>

    <div>
        <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 ">
            <div class="grid grid-cols-12">
                <div class="col-span-6 p-4">
                    <a href="{{ route('student.create') }}"><button class="px-4 py-1 text-sm rounded text-purple-600 font-semibold border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none">TAMBAH</button></a>
                    <!--<a href=""><button class="px-4 py-1 text-sm rounded text-green-600 font-semibold border border-green-200 hover:text-white hover:bg-green-600 hover:border-transparent focus:outline-none">PUBLISH</button></a>
                    <a href=""><button class="px-4 py-1 text-sm rounded text-red-600 font-semibold border border-red-200 hover:text-white hover:bg-red-600 hover:border-transparent focus:outline-none">DELETE</button></a> -->
                </div>
            </div>

            <!--<div class="col-span-6 p-4 flex justify-end">
                <input type="search" name="" class="px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-none rounded-l-md sm:text-sm border-gray-500">
                <button type="submit" class="rounded-r-md border border-l-0 px-4 py-1 border-gray-300 bg-gray-50  text-blue-600 hover:text-white hover:bg-blue-600">CARI</button>
            </div>
        -->
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <div class="row">
                    <div class="row">

                            <div class="form-group col-span-6 p-4 flex justify-end">
                                <form action="/cari" method="get">
                                    <input placeholder="Cari Nama" type="search" name="search" placeholder="Search"
                                        class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                                        <button class="rounded-r-md border border-1-0 px-4 py-1 border-gray-300 bg-gray-50 text-gray-500 text-black hover:text-white hover:bg-blue-600"
                                type="submit" class="btn btn-primary mb-2">Cari</button>
                            </div>

                            </form>

                    </div>
                </div>
        </nav>

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg m-3">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                   <tr class="text-lg text-left">
                       <th>Tandai</th>
                       <th>No</th>
                       <th>Nama</th>
                       <th>Role</th>
                       <th>NickName</th>
                       <th>Jenis Kelamin</th>
                       <th>No Telepon/WA</th>
                       <th>Aksi</th>
                   </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                   @foreach ($students as $item)
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td scope ="row" >{{ $loop->iteration}}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->role->role }}</td>
                                <td>{{ $item->nickname }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->telp }}</td>
                                <td>
                                    <form action="{{ route('student.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('student.edit', $item->id) }}" class=" btn btn-xs p-2 rounded bg-green-400 m-3 hover:bg-green-200 hover:text-blue-900 ">Edit</a>
                                        <button type="submit" class=" btn btn-xs p-2 rounded bg-red-400 m-3 hover:bg-red-200 hover:text-blue-900 ">Delete</button>
                                    </form>
                                </td>
                            </tr>

                   @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>

</x-app-template>
