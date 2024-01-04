@extends('layouts.admin')

@section('content')
    <div class="flex items-center border-b border-b-gray-300 pb-5 mb-5">
        <h3 class="mb-0">{{ $title }}</h3>
        <a href="{{ route('admin.categories.index') }}" class="btn-primary ml-auto">Kembali</a>
    </div>

    <form action="{{ route('admin.categories.update', ['category' => $kategori['id']]) }}" method="POST" class="flex gap-5"
        enctype="multipart/form-data">
        @csrf @method('patch')

        <div class="bg-white w-full md:w-2/3 lg:w-1/2 p-5 shadow">
            <label for="kode_kategori" class="flex flex-col gap-2 mb-4">
                <span>Kode</span>
                <input class="!border !border-gray-400" type="text" id="kode_kategori" name="kode_kategori"
                    placeholder="Masukkan kode kategori" value="{{ $kategori['kode_kategori'] }}">
                @error('kode_kategori')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
            </label>
            <label for="nama_kategori" class="flex flex-col gap-2 mb-4">
                <span>Nama</span>
                <input class="!border !border-gray-400" type="text" id="nama_kategori" name="nama_kategori"
                    placeholder="Masukkan nama kategori" value="{{ $kategori['nama_kategori'] }}">
                @error('nama_kategori')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
            </label>
            <label for="deskripsi_kategori" class="flex flex-col gap-2 mb-4">
                <span>Deskripsi</span>
                <textarea class="border border-gray-400" type="text" id="deskripsi_kategori" name="deskripsi_kategori"
                    placeholder="Deskripsi kategori">{{ $kategori['deskripsi_kategori'] }}</textarea>
                @error('deskripsi_kategori')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
            </label>
            <label for="status" class="flex flex-col gap-2 mb-4">
                <span>Status</span>
                <select class="border border-gray-400" name="status" id="status">
                    <option value="aktif" @if ($kategori['status'] === 'aktif') selected @endif>Aktif</option>
                    <option value="non aktif"@if ($kategori['status'] === 'non aktif') selected @endif>Non aktif</option>
                </select>
            </label>
        </div>

        <div class="flex flex-col gap-5 bg-white w-full md:w-2/3 lg:w-1/2 p-5 shadow">
            <img src="{{ !$kategori['foto'] ? asset('/images/thumb-placeholder.png') : 'http://localhost:8005' . $kategori['foto'] }}"
                alt="" class="w-[200px] aspect-square object-cover">
            <label for="status" class="flex flex-col gap-2 mb-4">
                <span>Foto kategori</span>
                <input type="file" name="foto" id="foto" class="border border-gray-400 p-5">
            </label>

            <button class="btn-primary mt-auto">Simpan</button>
            </img>
    </form>
@endsection
