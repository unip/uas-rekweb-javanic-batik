@extends('layouts.admin')

@section('content')
    <h3>{{ $title }}</h3>

    <div x-data="{ deleteConfirm: false, id: null, name: null }" class="table-kategori h-full flex">
        @if ($categories->count() === 0)
            <div class="maaf bg-white p-5 flex-1 flex flex-col items-center justify-center">
                <h3>Kategori Masih Kosong</h3>
                <p class="mb-5">Tambah kategori yuk</p>

                <a href="{{ route('kategori.create') }}" class="btn-primary">Tambah Kategori</a>
            </div>
        @endif

        @if ($categories->count() > 0)
            <div class="w-full overflow-auto">
                <table class="w-full self-start bg-white">
                    <thead class="bg-gray-100 border-b border-b-gray-300">
                        <tr>
                            <th class="p-3 text-left"></th>
                            <th class="p-3 text-left">Nama</th>
                            <th class="p-3 text-left">Kode</th>
                            <th class="p-3 text-left">Deskripsi</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Dibuat</th>
                            <th class="p-3 text-left">Diupdate</th>
                            <th class="p-3 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories->all() as $item)
                            <tr
                                class="border-b border-b-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition duration-200">
                                <td class="p-3">
                                    <img src="http://localhost:8005{{ $item['foto'] }}" alt=""
                                        class="w-[60px] aspect-square">
                                </td>
                                <td class="p-3 font-bold">
                                    <a href="{{ route('admin.categories.edit', ['category' => $item['id']]) }}"
                                        class="hover:text-yellow-500">
                                        {{ $item['nama_kategori'] }}
                                    </a>
                                </td>
                                <td class="p-3 font-bold">
                                    {{ $item['kode_kategori'] }}
                                </td>
                                <td class="p-3">
                                    {{ $item['deskripsi_kategori'] }}
                                </td>
                                <td class="p-3">
                                    <span class="bg-green-100 px-3 py-1 rounded-full">{{ $item['status'] }}</span>
                                </td>
                                <td class="p-3 dark:text-white">
                                    {{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}
                                </td>
                                <td class="p-3 dark:text-white">
                                    {{ \Carbon\Carbon::parse($item['updated_at'])->format('d M Y') }}
                                </td>
                                <td class="p-3 dark:text-white">
                                    <button class="bg-red-400 text-white p-3 hover:bg-red-600"
                                        class="bg-red-400 text-white p-3 hover:bg-red-600"
                                        @click="deleteConfirm = true; id = {{ $item['id'] }}; name = `{{ $item['nama_kategori'] }}`">delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Modal -->
        <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
            x-show="deleteConfirm" x-cloak x-transition.opacity>
            <!-- Modal inner -->
            <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg"
                @click.away="deleteConfirm = false">

                <!-- Title / Close-->
                <div class="flex items-center justify-between">
                    <h5 class="mr-3 text-black max-w-none">Alert</h5>

                    <button type="button" class="z-50 cursor-pointer ml-auto" @click="deleteConfirm = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- content -->
                <form action="{{ route('admin.categories.destroy', ['category' => $item['id']]) }}">
                    @csrf @method('delete')
                    <p class="mt-4 mb-3">Kategori <span x-text="name"></span> akan dihapus. Boleh?</p>

                    <div class="flex w-full gap-5 *:flex-1">
                        <button type="button" class="p-3" @click="deleteConfirm = false">Tidak</button>
                        <button class="bg-red-400 text-center text-white p-3 hover:bg-red-600">
                            Boleh
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
