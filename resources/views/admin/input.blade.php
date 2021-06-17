<x-template-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $tittle }}
    </h2>

    <div>
        <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 ">
            <form action="{{(isset($students))?route('student.update', $students->id):route('student.store') }}" method="POST">
                @csrf
                @if (isset($students))
                    @method('PATCH')

                @endif
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-3">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{(isset($students))?$students->nama:old('nama') }}" class=" @error('nama') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md " placeholder="Masukan Nama Lengkap">
                        <div class="text-xs text-red-500">@error('nama'){{ $message }}@enderror</div>
                      </div>

                      <div class="col-span-6 sm:col-span-3">
                        <label for="role" class="block text-sm font-medium text-gray-700">Pilih Team</label>
                        <select class="form-control select2" style="width : 100%" name="role_id" id="role_id">
                            <option disabled value="">Pilih Team</option>

                            @foreach ($role as $item)
                                <option value="{{ $item->id }}">{{ $item->role }}</option>
                            @endforeach
                        </select>
                      </div>


                      <div class="col-span-6 sm:col-span-3">
                        <label for="nickname" class="block text-sm font-medium text-gray-700">NickName</label>
                        <input type="text" name="nickname" value="{{ (isset($students))?$students->nickname:old('nickname') }}" class=" @error('nickname') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Masukan NickName">
                        <div class="text-xs text-red-500">@error('nickname'){{ $message }}@enderror</div>
                      </div>

                      <div class="col-span-6 sm:col-span-3">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="gender"  value="{{ (isset($students))?$students->gender:old('gender') }} class="@error('gender') border-red-500 @enderror class="mt-1 block w-full py-2 px-3 border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Pilih</option>
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                        </select>
                        <div class="text-xs text-red-500">@error('gender'){{ $message }}@enderror</div>
                      </div>

                      <div class="col-span-6 sm:col-span-3">
                        <label for="telp" class="block text-sm font-medium text-gray-700">No Telepon/WA</label>
                        <input type="text" name="telp" value="{{ (isset($students))?$students->telp:old('telp') }}" class=" @error('telp') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Masukan No Telepon">
                        <div class="text-xs text-red-500">@error('telp'){{ $message }}@enderror</div>
                      </div>

                  <div class="px-5 py-4 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        <i class="fas fa-save mr-3"></i>
                        Simpan
                    </button>
                  </div>


                </div>
              </form>
        </div>

    </div>
    <div class="px-5 py-4 bg-gray-50 text-right sm:px-6">
        <a href="{{ route('student.index') }}"><button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <i class="fas fa-undo-alt mr-3"></i>
            Kembali</button></a>
      </div>
</x-app-template>
