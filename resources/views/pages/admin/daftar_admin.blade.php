@extends('layout.app')

@section('content')
    <div class="w-full p-1" x-data="{ tab: 'manager', search: '' }">

        {{-- CARD --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">

            {{-- HEADER --}}
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-[#0D1B5C]">Daftar Admin</h2>
                <a href="{{ route('admin.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Tambah
                </a>
            </div>

            {{-- TABS --}}
            <div class="flex gap-4 mb-4 border-b border-gray-300">
                <button @click="tab = 'manager'; history.replaceState(null,'', '?level=manager')"
                    :class="tab === 'manager' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-700'"
                    class="px-4 py-2 focus:outline-none transition">
                    Manager
                </button>

                <button @click="tab = 'general'; history.replaceState(null,'', '?level=general')"
                    :class="tab === 'general' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-700'"
                    class="px-4 py-2 focus:outline-none transition">
                    General
                </button>

                <button @click="tab = 'tuk'; history.replaceState(null,'', '?level=tuk')"
                    :class="tab === 'tuk' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-700'"
                    class="px-4 py-2 focus:outline-none transition">
                    TUK
                </button>
            </div>

            {{-- SEARCH BAR --}}
            <div class="mb-4">
                <input type="text" placeholder="Cari admin..." x-model="search"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- TAB MANAGER --}}
            <div x-show="tab === 'manager'" x-transition>
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border-b">No</th>
                                <th class="px-4 py-2 border-b">Kode</th>
                                <th class="px-4 py-2 border-b">Nama Lengkap</th>
                                <th class="px-4 py-2 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($managers as $admin)
                                <tr>
                                    <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border-b">{{ $admin->kode_admin }}</td>
                                    <td class="px-4 py-2 border-b">{{ $admin->name }}</td>
                                    <td class="px-4 py-2 border-b">
                                        <a href="{{ route('admin.edit', $admin->id) }}"
                                            class="text-yellow-400 hover:text-yellow-800 flex items-center gap-1 font-semibold">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @if($managers->isEmpty())
                                <tr>
                                    <td colspan="4" class="px-4 py-2 text-center">Belum ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- TAB GENERAL --}}
            <div x-show="tab === 'general'" x-transition>
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border-b">No</th>
                                <th class="px-4 py-2 border-b">Kode</th>
                                <th class="px-4 py-2 border-b">Nama Lengkap</th>
                                <th class="px-4 py-2 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($generals as $admin)
                                <tr>
                                    <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border-b">{{ $admin->kode_admin }}</td>
                                    <td class="px-4 py-2 border-b">{{ $admin->name }}</td>
                                    <td class="px-4 py-2 border-b">
                                        <a href="{{ route('admin.edit', $admin->id) }}"
                                            class="text-yellow-400 hover:text-yellow-800 flex items-center gap-1 font-semibold">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- TAB TUK --}}
            <div x-show="tab === 'tuk'" x-transition>
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border-b">No</th>
                                <th class="px-4 py-2 border-b">Kode</th>
                                <th class="px-4 py-2 border-b">Nama Lengkap</th>
                                <th class="px-4 py-2 border-b">TUK</th> {{-- Tambahan kolom --}}
                                <th class="px-4 py-2 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tuks as $admin)
                                <tr>
                                    <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td> {{-- pakai loop->iteration --}}
                                    <td class="px-4 py-2 border-b">{{ $admin->kode_admin }}</td>
                                    <td class="px-4 py-2 border-b">{{ $admin->name }}</td>
                                    <td class="px-4 py-2 border-b">
                                        {{ is_array($admin->tuk) ? implode(', ', $admin->tuk) : $admin->tuk }}
                                    </td>
                                    <td class="px-4 py-2 border-b">
                                        <a href="{{ route('admin.edit', $admin->id) }}"
                                            class="text-yellow-400 hover:text-yellow-800 flex items-center gap-1 font-semibold">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @if($tuks->isEmpty())
                                <tr>
                                    <td colspan="5" class="px-4 py-2 text-center">Belum ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
