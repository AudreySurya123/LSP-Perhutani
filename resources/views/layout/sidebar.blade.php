<aside id="sidebar" class="text-[13px] w-64 bg-gradient-to-b from-[#0D1B5C] to-[#1a237e] text-white min-h-screen p-4 shadow-2xl
    fixed md:static inset-y-0 left-0 transform -translate-x-full md:translate-x-0
    transition-transform duration-300 z-50 border-r border-white/10 flex flex-col">

    <!-- Logo & Brand Area -->
    <div class="flex justify-between items-center mb-6 pb-4 border-b border-white/10">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-lg overflow-hidden">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Perhutani" class="w-8 h-8 object-contain">
            </div>

            <div>
                @php
                    $user = Auth::user();
                    $role = $user->role ?? 'guest';

                    // 🔥 MODE AKSES ASESI OLEH ADMIN
                    $aksesSebagai = session('akses_sebagai'); // null | 'asesi'
                    $aksesAsesiId = session('akses_asesi_id');
                @endphp


                @if($role === 'admin')
                    <h1 class="font-bold text-lg tracking-wide">
                        Perhutani
                    </h1>
                @elseif($role === 'asesi')
                    <h1 class="font-bold text-lg tracking-wide">
                        Perhutani
                    </h1>
                @elseif($role === 'asesor')
                    <h1 class="font-bold text-lg tracking-wide">
                        Perhutani
                    </h1>
                @else
                    <h1 class="font-bold text-lg tracking-wide">
                        Perhutani <span class="text-gray-300">System</span>
                    </h1>
                @endif
            </div>
        </div>

        <button id="menu-close" class="md:hidden p-1 hover:bg-white/10 rounded-lg transition">
            <i data-lucide="x" class="w-5 h-5"></i>
        </button>
    </div>

    <!-- Navigation - Grow to fill available space -->
    <nav class="flex-1 space-y-1">
        {{-- ================= ADMIN SIDEBAR ================= --}}
        @if($role === 'admin' && $aksesSebagai !== 'asesi')
            <!-- MENU UTAMA -->
            <div class="mb-4">
                <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3">Menu Utama</p>
                <div class="space-y-1">
                    @php
                        $menus = [
                            ["Beranda", "/dashboard-admin", "home", "bg-gradient-to-br from-blue-500 to-blue-600"],
                            ["Edit Info LSP", "/info-lsp", "pen-tool", "bg-gradient-to-br from-purple-500 to-purple-600"],
                            ["Jadwal Pendaftaran", "/jadwal-pendaftaran", "calendar", "bg-gradient-to-br from-green-500 to-green-600"],
                        ];
                    @endphp

                    @foreach ($menus as $menu)
                        <a href="{{ $menu[1] }}"
                            class="group flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200
                                                                                                                   hover:bg-white/10 hover:translate-x-1 hover:shadow-lg
                                                                                                                   {{ request()->is(ltrim($menu[1], '/') . '*') ? 'bg-white/15 border-l-4 border-blue-400 shadow-lg' : '' }}">
                            <div
                                class="w-8 h-8 rounded-lg {{ $menu[3] }} flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i data-lucide="{{ $menu[2] }}" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">{{ $menu[0] }}</span>
                            @if(request()->is(ltrim($menu[1], '/') . '*'))
                                <div class="ml-auto w-2 h-2 rounded-full bg-blue-400 animate-pulse"></div>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- ASESI -->
            <div class="mb-4">
                <p
                    class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3 flex items-center justify-between">
                    <span>Manajemen Asesi</span>
                </p>
                <div class="space-y-1">
                    @php
                        $asesiMenus = [
                            ["Verifikasi Pendaftaran", "/asesi/verifikasi-pendaftaran", "check-circle", "orange"],
                            ["Asesi Verifikasi", "/asesi/asesi-verifikasi", "id-card", "blue"],
                            ["Daftar Asesi (Proses)", "/asesi/asesi-proses", "list", "yellow"],
                            ["Daftar Asesi (Selesai)", "/asesi/asesi-selesai", "archive", "green"],
                            ["Asesi Ditolak", "/asesi/asesi-ditolak", "ban", "red"],
                        ];
                     @endphp

                    @foreach ($asesiMenus as $menu)
                        <a href="{{ $menu[1] }}"
                            class="group flex items-center justify-between px-3 py-2.5 rounded-xl transition-all duration-200
                                                                                   hover:bg-white/10 hover:translate-x-1
                                                                                    {{ request()->is(ltrim($menu[1], '/') . '*') ? 'bg-white/15 border-l-4 border-blue-400' : '' }}">
                            <div class="flex items-center gap-3">
                                <div class="relative">
                                    <i data-lucide="{{ $menu[2] }}" class="w-5 h-5 text-{{ $menu[3] }}-400"></i>
                                </div>
                                <span class="font-medium">{{ $menu[0] }}</span>
                            </div>
                            {{-- Hapus bagian span count --}}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- DATA ASESMEN -->
            <div class="mb-4">
                <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3">Data Asesmen</p>
                <div class="space-y-1">
                    @php
                        $asesmenMenus = [
                            ["Presensi", "/asesmen/presensi", "fingerprint", "bg-gradient-to-br from-cyan-500 to-cyan-600"],
                            ["Daftar TUK", "/asesmen/daftar-tuk", "building", "bg-gradient-to-br from-indigo-500 to-indigo-600"],
                            ["Agenda Asesmen", "/asesmen/agenda", "calendar-range", "bg-gradient-to-br from-pink-500 to-pink-600"],
                            ["Laporan Asesmen", "/asesmen/laporan", "file-text", "bg-gradient-to-br from-orange-500 to-orange-600"],
                        ];
                    @endphp

                    @foreach ($asesmenMenus as $menu)
                        <a href="{{ $menu[1] }}"
                            class="group flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200
                                                                                                                   hover:bg-white/10 hover:translate-x-1
                                                                                                                   {{ request()->is(ltrim($menu[1], '/') . '*') ? 'bg-white/15 border-l-4 border-blue-400' : '' }}">
                            <div class="w-8 h-8 rounded-lg {{ $menu[3] }} flex items-center justify-center">
                                <i data-lucide="{{ $menu[2] }}" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">{{ $menu[0] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- MENU LAIN -->
            <div class="mb-4">
                <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3">Menu Lain</p>

                <!-- Daftar Personel LSP -->
                <a href="/personel-lsp"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200
                                                                           hover:bg-white/10 hover:translate-x-1
                                                                           {{ request()->is('personel-lsp*') ? 'bg-white/15 border-l-4 border-blue-400' : '' }}">
                    <div
                        class="w-8 h-8 rounded-lg bg-gradient-to-br from-teal-500 to-teal-600 flex items-center justify-center">
                        <i data-lucide="user-check" class="w-4 h-4 text-white"></i>
                    </div>
                    <span class="font-medium">Daftar Personel LSP</span>
                </a>

                <!-- DROPDOWN USER -->
                @php
                    $isUserActive = request()->is('user/*') || request()->is('profil-saya*');
                @endphp

                <div x-data="{ openUser: {{ $isUserActive ? 'true' : 'false' }} }" class="mt-2">
                    <button @click="openUser = !openUser" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl hover:bg-white/10 transition-all duration-200
                                                                            {{ $isUserActive ? 'bg-white/15' : '' }}">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-gray-600 to-gray-700 flex items-center justify-center">
                                <i data-lucide="users" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Daftar User</span>
                        </div>
                        <i data-lucide="chevron-down" :class="openUser ? 'rotate-180' : ''"
                            class="w-4 h-4 transition-transform duration-300"></i>
                    </button>

                    <div x-show="openUser" x-transition class="mt-2 ml-11 space-y-1">
                        @php
                            $userMenus = [
                                ["Daftar Admin", "/user/admin", "shield"],
                                ["Daftar Asesor", "/user/asesor", "user-check"],
                                ["Daftar Direktur & Pleno", "/user/pleno", "users"],
                                ["Daftar User Lainnya", "/user/lainnya", "user-plus"],
                                ["Profil Saya", "/profil-saya", "user"],
                            ];
                        @endphp

                        @foreach ($userMenus as $menu)
                            <a href="{{ $menu[1] }}"
                                class="group flex items-center gap-2 px-3 py-2 rounded-lg transition-all duration-200
                                                                                                                       hover:bg-white/5 hover:translate-x-1
                                                                                                                       {{ request()->is(ltrim($menu[1], '/') . '*') ? 'text-blue-300' : '' }}">
                                <i data-lucide="{{ $menu[2] }}" class="w-3.5 h-3.5"></i>
                                <span class="text-sm">{{ $menu[0] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- DROPDOWN LAINNYA -->
                @php
                    $isOtherActive = request()->is('lainnya/*');
                @endphp

                <div x-data="{ openOther: {{ $isOtherActive ? 'true' : 'false' }} }" class="mt-2">
                    <button @click="openOther = !openOther" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl hover:bg-white/10 transition-all duration-200
                                                                            {{ $isOtherActive ? 'bg-white/15' : '' }}">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-violet-500 to-violet-600 flex items-center justify-center">
                                <i data-lucide="folder" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Lainnya</span>
                        </div>
                        <i data-lucide="chevron-down" :class="openOther ? 'rotate-180' : ''"
                            class="w-4 h-4 transition-transform duration-300"></i>
                    </button>

                    <div x-show="openOther" x-transition class="mt-2 ml-11 space-y-1">
                        @php
                            $otherMenus = [
                                ["Banding", "/lainnya/banding", "alert-circle"],
                                ["Perjanjian Pemegang Sertifikat", "/lainnya/perjanjian", "file-signature"],
                                ["Surveillen", "/lainnya/surveillen", "eye"],
                                ["Daftar Skema", "/lainnya/daftar-skema", "list-ordered"],
                                ["Lihat Log", "/lainnya/lihat-log", "history"],
                            ];
                        @endphp

                        @foreach ($otherMenus as $menu)
                            <a href="{{ $menu[1] }}"
                                class="group flex items-center gap-2 px-3 py-2 rounded-lg transition-all duration-200
                                                                                                                       hover:bg-white/5 hover:translate-x-1
                                                                                                                       {{ request()->is(ltrim($menu[1], '/') . '*') ? 'text-blue-300' : '' }}">
                                <i data-lucide="{{ $menu[2] }}" class="w-3.5 h-3.5"></i>
                                <span class="text-sm">{{ $menu[0] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- DROPDOWN BANTUAN -->
                @php
                    $isHelpActive = request()->is('buku-panduan*') || request()->is('hubungi-cs*');
                @endphp

                <div x-data="{ openHelp: {{ $isHelpActive ? 'true' : 'false' }} }" class="mt-2">
                    <button @click="openHelp = !openHelp" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl hover:bg-white/10 transition-all duration-200
                                                                            {{ $isHelpActive ? 'bg-white/15' : '' }}">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center">
                                <i data-lucide="help-circle" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Bantuan</span>
                        </div>
                        <i data-lucide="chevron-down" :class="openHelp ? 'rotate-180' : ''"
                            class="w-4 h-4 transition-transform duration-300"></i>
                    </button>

                    <div x-show="openHelp" x-transition class="mt-2 ml-11 space-y-1">
                        <a href="/buku-panduan"
                            class="group flex items-center gap-2 px-3 py-2 rounded-lg transition-all duration-200
                                                                           hover:bg-white/5 hover:translate-x-1
                                                                           {{ request()->is('buku-panduan*') ? 'text-blue-300' : '' }}">
                            <i data-lucide="book-open" class="w-3.5 h-3.5"></i>
                            <span class="text-sm">Buku Panduan</span>
                        </a>
                        <a href="/hubungi-cs"
                            class="group flex items-center gap-2 px-3 py-2 rounded-lg transition-all duration-200
                                                                           hover:bg-white/5 hover:translate-x-1
                                                                           {{ request()->is('hubungi-cs*') ? 'text-blue-300' : '' }}">
                            <i data-lucide="headphones" class="w-3.5 h-3.5"></i>
                            <span class="text-sm">Hubungi CS</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- ================= ADMIN AKSES ASESI ================= --}}
        @elseif($role === 'admin' && $aksesSebagai === 'asesi')

            {{-- INFO MODE --}}
            <div class="mb-4 p-3 bg-yellow-500/10 border border-yellow-500/30 rounded-xl">
                <p class="text-[11px] uppercase text-yellow-300 font-semibold">
                    Mode Admin
                </p>
                <p class="text-sm text-white">
                    Mengakses Asesi:
                </p>
                <p class="font-semibold text-yellow-200 truncate">
                    {{ \App\Models\User::find($aksesAsesiId)->name ?? '-' }}
                </p>
            </div>

            {{-- MENU UTAMA --}}
            <div class="mb-4 space-y-1">
                <a href="{{ route('adminasesi.dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all
                                  hover:bg-white/10 hover:translate-x-1
                                  {{ request()->routeIs('adminasesi.dashboard') ? 'bg-purple-500/20 border-l-4 border-purple-400 shadow-lg' : '' }}">
                    <div
                        class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                        <i data-lucide="home" class="w-4 h-4 text-white"></i>
                    </div>
                    <span class="font-medium">Beranda</span>
                    @if(request()->routeIs('adminasesi.dashboard'))
                        <div class="ml-auto w-2 h-2 rounded-full bg-purple-400 animate-pulse"></div>
                    @endif
                </a>

                <a href="{{ route('admin.keluar.akses') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all
              hover:bg-white/10 hover:translate-x-1">
                    <div
                        class="w-8 h-8 rounded-lg bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center">
                        <i data-lucide="arrow-left" class="w-4 h-4 text-white"></i>
                    </div>
                    <span class="font-medium">Kembali</span>
                </a>


                {{-- MENU ASESI --}}
                <div class="mb-4">
                    <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3">
                        Menu Asesi
                    </p>

                    <div class="space-y-1">
                        <a href="#" target="_blank" rel="noopener noreferrer"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all
                                      hover:bg-white/10 hover:translate-x-1
                                      {{ request()->url() == '#' ? 'bg-purple-500/20 border-l-4 border-purple-400' : '' }}">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                                <i data-lucide="message-circle" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Chat WhatsApp</span>
                            @if(request()->url() == '#')
                                <div class="ml-auto w-2 h-2 rounded-full bg-purple-400 animate-pulse"></div>
                            @endif
                        </a>

                        <a href="{{ route('pages.adminasesi.edit_skema') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all
                                      hover:bg-white/10 hover:translate-x-1
                                      {{ request()->routeIs('pages.adminasesi.edit_skema') ? 'bg-purple-500/20 border-l-4 border-purple-400' : '' }}">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center">
                                <i data-lucide="edit" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Edit Skema</span>
                            @if(request()->routeIs('pages.adminasesi.edit_skema'))
                                <div class="ml-auto w-2 h-2 rounded-full bg-purple-400 animate-pulse"></div>
                            @endif
                        </a>

                        <a href="{{ route('pages.adminasesi.metode_pembayaran') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all
                                      hover:bg-white/10 hover:translate-x-1
                                      {{ request()->routeIs('pages.adminasesi.metode_pembayaran') ? 'bg-purple-500/20 border-l-4 border-purple-400' : '' }}">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                                <i data-lucide="credit-card" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Metode Pembayaran</span>
                            @if(request()->routeIs('pages.adminasesi.metode_pembayaran'))
                                <div class="ml-auto w-2 h-2 rounded-full bg-purple-400 animate-pulse"></div>
                            @endif
                        </a>

                        <a href="{{ route('pages.adminasesi.apl01') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all
                                      hover:bg-white/10 hover:translate-x-1
                                      {{ request()->routeIs('pages.adminasesi.apl01') ? 'bg-purple-500/20 border-l-4 border-purple-400' : '' }}">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-cyan-500 to-cyan-600 flex items-center justify-center">
                                <i data-lucide="file-text" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Pra Asesmen (APL-01)</span>
                            @if(request()->routeIs('pages.adminasesi.apl01'))
                                <div class="ml-auto w-2 h-2 rounded-full bg-purple-400 animate-pulse"></div>
                            @endif
                        </a>

                        <a href="{{ route('pages.adminasesi.apl02') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all
                                      hover:bg-white/10 hover:translate-x-1
                                      {{ request()->routeIs('pages.adminasesi.apl02') ? 'bg-purple-500/20 border-l-4 border-purple-400' : '' }}">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-sky-500 to-sky-600 flex items-center justify-center">
                                <i data-lucide="clipboard-check" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Pra Asesmen (APL-02)</span>
                            @if(request()->routeIs('pages.adminasesi.apl02'))
                                <div class="ml-auto w-2 h-2 rounded-full bg-purple-400 animate-pulse"></div>
                            @endif
                        </a>

                        <a href="{{ route('pages.adminasesi.pilih_asetuk') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all
                                      hover:bg-white/10 hover:translate-x-1
                                      {{ request()->routeIs('pages.adminasesi.pilih_asetuk') ? 'bg-purple-500/20 border-l-4 border-purple-400' : '' }}">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center">
                                <i data-lucide="users" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Pilih Asesor & TUK</span>
                            @if(request()->routeIs('pages.adminasesi.pilih_asetuk'))
                                <div class="ml-auto w-2 h-2 rounded-full bg-purple-400 animate-pulse"></div>
                            @endif
                        </a>

                        <a href="{{ route('pages.adminasesi.idcard') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all
                                      hover:bg-white/10 hover:translate-x-1
                                      {{ request()->routeIs('pages.adminasesi.idcard') ? 'bg-purple-500/20 border-l-4 border-purple-400' : '' }}">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center">
                                <i data-lucide="printer" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Cetak Kartu Identitas</span>
                            @if(request()->routeIs('pages.adminasesi.idcard'))
                                <div class="ml-auto w-2 h-2 rounded-full bg-purple-400 animate-pulse"></div>
                            @endif
                        </a>
                    </div>
                </div>

                {{-- KEMBALI KE ADMIN --}}
                {{-- <div class="mt-auto">
                    <a href="{{ route('admin.keluar.akses') }}" class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl
                                  bg-red-500/20 hover:bg-red-500/30 transition-all">
                        <i data-lucide="log-out"></i>
                        <span class="font-semibold text-sm">Keluar Mode Asesi</span>
                    </a>
                </div> --}}

                {{-- ================= ASESI SIDEBAR ================= --}}
        @elseif($role === 'asesi')
                <!-- Welcome Section -->
                <div
                    class="mb-6 p-3 bg-gradient-to-r from-green-500/10 to-emerald-500/10 rounded-xl border border-green-500/20">
                    <p class="text-xs text-white/60 mb-1">Selamat datang,</p>
                    <p class="font-semibold text-green-300">{{ Auth::user()->name ?? 'Asesi' }}</p>
                </div>

                <!-- Main Menu -->
                <div class="mb-4">
                    <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3">Menu Utama</p>
                    <div class="space-y-1">
                        @php
                            $menus = [
                                ["Beranda", "/dashboard-asesi", "home", "bg-gradient-to-br from-blue-500 to-blue-600"],
                                ["ID Card", "/id-card", "id-card", "bg-gradient-to-br from-purple-500 to-purple-600"],
                                ["Kelola Akun", "/kelola-akun", "user-check", "bg-gradient-to-br from-teal-500 to-teal-600"],
                                ["Presensi", "/presensi", "fingerprint", "bg-gradient-to-br from-cyan-500 to-cyan-600"],
                            ];
                        @endphp

                        @foreach ($menus as $menu)
                            <a href="{{ $menu[1] }}"
                                class="group flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200
                                                                                                                   hover:bg-white/10 hover:translate-x-1
                                                                                                                   {{ request()->is(ltrim($menu[1], '/') . '*') ? 'bg-white/15 border-l-4 border-green-400' : '' }}">
                                <div class="w-8 h-8 rounded-lg {{ $menu[3] }} flex items-center justify-center">
                                    <i data-lucide="{{ $menu[2] }}" class="w-4 h-4 text-white"></i>
                                </div>
                                <span class="font-medium">{{ $menu[0] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- PRA ASESMEN -->
                <div class="mb-4">
                    <div class="flex items-center justify-between px-3 mb-3">
                        <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold">Pra Asesmen</p>
                    </div>

                    @php
                        $isPraAsesmenActive = request()->is('pra-asesmen/*') || request()->is('pra-asesmen');
                    @endphp

                    <div x-data="{ open: {{ $isPraAsesmenActive ? 'true' : 'false' }} }">
                        <button @click="open = !open"
                            class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl hover:bg-white/10 transition-all duration-200
                                                                            {{ $isPraAsesmenActive ? 'bg-white/15' : '' }}">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-lg bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center">
                                    <i data-lucide="file-text" class="w-4 h-4 text-white"></i>
                                </div>
                                <span class="font-medium">Form APL-01</span>
                            </div>
                            <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''"
                                class="w-4 h-4 transition-transform duration-300"></i>
                        </button>

                        <div x-show="open" x-transition class="mt-2 ml-11 space-y-1">
                            @php
                                $praAsesmenMenus = [
                                    ["Data Asesi", "/pra-asesmen/data-asesi", "user"],
                                    ["Data Sertifikasi", "/pra-asesmen/data-sertifikasi", "award"],
                                    ["Bukti Kelengkapan", "/pra-asesmen/bukti-kelengkapan", "folder-check"],
                                    ["Status & Tanda Tangan", "/pra-asesmen/tanda-tangan", "pen-tool"],
                                ];
                            @endphp

                            @foreach ($praAsesmenMenus as $menu)
                                <a href="{{ $menu[1] }}"
                                    class="group flex items-center justify-between px-3 py-2 rounded-lg transition-all duration-200
                                                                                                                       hover:bg-white/5 hover:translate-x-1
                                                                                                                       {{ request()->is(ltrim($menu[1], '/') . '*') ? 'text-green-300' : '' }}">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="{{ $menu[2] }}" class="w-3.5 h-3.5"></i>
                                        <span class="text-sm">{{ $menu[0] }}</span>
                                    </div>
                                    @if(!empty($menu[3]))
                                        <i data-lucide="{{ $menu[3] }}"
                                            class="w-3.5 h-3.5 text-{{ $menu[3] == 'check-circle' ? 'green' : ($menu[3] == 'alert-circle' ? 'yellow' : 'red') }}-400"></i>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- BANTUAN -->
                <div class="mb-4">
                    <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3">Bantuan & Support
                    </p>

                    @php
                        $isBantuanActive = request()->is('asesi/bantuan/*');
                    @endphp

                    <div x-data="{ open: {{ $isBantuanActive ? 'true' : 'false' }} }">
                        <button @click="open = !open" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl hover:bg-white/10 transition-all duration-200
                                                                            {{ $isBantuanActive ? 'bg-white/15' : '' }}">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-lg bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center">
                                    <i data-lucide="help-circle" class="w-4 h-4 text-white"></i>
                                </div>
                                <span class="font-medium">Bantuan</span>
                            </div>
                            <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''"
                                class="w-4 h-4 transition-transform duration-300"></i>
                        </button>

                        <div x-show="open" x-transition class="mt-2 ml-11 space-y-1">
                            @php
                                $bantuanMenus = [
                                    ["Website LSP", "/asesi/bantuan/website-lsp", "globe"],
                                    ["Buku Panduan", "/asesi/bantuan/buku-panduan", "book-open"],
                                    ["Hubungi Admin", "/asesi/bantuan/hubungi-admin", "message-circle"],
                                ];
                            @endphp

                            @foreach ($bantuanMenus as $menu)
                                <a href="{{ $menu[1] }}"
                                    class="group flex items-center gap-2 px-3 py-2 rounded-lg transition-all duration-200
                                                                                                                       hover:bg-white/5 hover:translate-x-1
                                                                                                                       {{ request()->is(ltrim($menu[1], '/') . '*') ? 'text-green-300' : '' }}">
                                    <i data-lucide="{{ $menu[2] }}" class="w-3.5 h-3.5"></i>
                                    <span class="text-sm">{{ $menu[0] }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ================= ASESOR SIDEBAR ================= --}}
            @elseif($role === 'asesor')
                <!-- Welcome & Stats -->
                <div
                    class="mb-6 p-3 bg-gradient-to-r from-yellow-500/10 to-amber-500/10 rounded-xl border border-yellow-500/20">
                    <p class="text-xs text-white/60 mb-1">Halo, Asesor</p>
                    <p class="font-semibold text-yellow-300">{{ Auth::user()->name ?? 'Asesor' }}</p>
                </div>

                <!-- DASHBOARD -->
                <div class="mb-4">
                    <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3">
                        Menu Utama
                    </p>

                    <div class="space-y-1">
                        <a href="{{ route('asesor.dashboard') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200
                                                            hover:bg-white/10 hover:translate-x-1
                                                            {{ request()->routeIs('asesor.dashboard') ? 'bg-white/15 border-l-4 border-yellow-400' : '' }}">

                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center">
                                <i data-lucide="home" class="w-4 h-4 text-white"></i>
                            </div>

                            <span class="font-medium">Dashboard</span>
                        </a>
                    </div>
                </div>

                <!-- PROFIL -->
                <div class="mb-4">
                    <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3">Profil</p>
                    <div class="space-y-1">
                        <a href="{{ route('profil') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200
                                                                           hover:bg-white/10 hover:translate-x-1
                                                                           {{ request()->routeIs('profil') ? 'bg-white/15 border-l-4 border-yellow-400' : '' }}">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                <i data-lucide="user" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Profil</span>
                        </a>

                        <a href="{{ route('ubah-password') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200
                                                                           hover:bg-white/10 hover:translate-x-1
                                                                           {{ request()->routeIs('ubah-password') ? 'bg-white/15 border-l-4 border-yellow-400' : '' }}">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                                <i data-lucide="key" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-medium">Ubah Kata Sandi</span>
                        </a>
                    </div>
                </div>

                <!-- ASESI -->
                <div class="mb-4">
                    <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3">Manajemen Asesi
                    </p>
                    <div class="space-y-1">
                        @php
                            $asesorAsesiMenus = [
                                ["Daftar Asesi (Proses)", route('asesi-proses'), "users", "yellow", "5"],
                                ["Daftar Asesi (K)", route('asesik'), "user-check", "green", "12"],
                                ["Daftar Asesi (BK)", route('asesibk'), "user-x", "red", "2"],
                            ];
                        @endphp

                        @foreach ($asesorAsesiMenus as $menu)
                            <a href="{{ $menu[1] }}"
                                class="flex items-center justify-between px-3 py-2.5 rounded-xl transition-all duration-200
                                                                                                                   hover:bg-white/10 hover:translate-x-1
                                                                                                                   {{ request()->is(ltrim(str_replace(url('/'), '', $menu[1]), '/') . '*') ? 'bg-white/15 border-l-4 border-yellow-400' : '' }}">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-gradient-to-br from-{{ $menu[3] }}-500 to-{{ $menu[3] }}-600 flex items-center justify-center">
                                        <i data-lucide="{{ $menu[2] }}" class="w-4 h-4 text-white"></i>
                                    </div>
                                    <span class="font-medium">{{ $menu[0] }}</span>
                                </div>
                                @if($menu[4] > 0)
                                    <span
                                        class="px-2 py-0.5 text-xs bg-{{ $menu[3] }}-500/20 text-{{ $menu[3] }}-300 rounded-full">{{ $menu[4] }}</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- ASESMEN -->
                <div class="mb-4">
                    <p class="text-[11px] uppercase tracking-wider text-white/40 font-semibold px-3 mb-3">Aktivitas Asesmen
                    </p>
                    <div class="space-y-1">
                        @php
                            $asesmenMenus = [
                                ["Presensi", route('presensiase'), "fingerprint", "bg-gradient-to-br from-cyan-500 to-cyan-600"],
                                ["MUK", route('muk'), "file-check", "bg-gradient-to-br from-purple-500 to-purple-600"],
                                ["Bank Materi Uji", route('bank-materi'), "database", "bg-gradient-to-br from-indigo-500 to-indigo-600"],
                                ["Laporan Kegiatan", route('lapkeg'), "file-text", "bg-gradient-to-br from-orange-500 to-orange-600"],
                                ["Pemegang Sertifikat", route('pemegang-sertif'), "award", "bg-gradient-to-br from-emerald-500 to-emerald-600"],
                            ];
                        @endphp

                        @foreach ($asesmenMenus as $menu)
                            <a href="{{ $menu[1] }}"
                                class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200
                                                                                                                   hover:bg-white/10 hover:translate-x-1
                                                                                                                   {{ request()->is(ltrim(str_replace(url('/'), '', $menu[1]), '/') . '*') ? 'bg-white/15 border-l-4 border-yellow-400' : '' }}">
                                <div class="w-8 h-8 rounded-lg {{ $menu[3] }} flex items-center justify-center">
                                    <i data-lucide="{{ $menu[2] }}" class="w-4 h-4 text-white"></i>
                                </div>
                                <span class="font-medium">{{ $menu[0] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- BANTUAN -->
                <div class="mb-4">
                    @php
                        $isBantuanActive = request()->is('asesor/bantuan/*');
                    @endphp

                    <div x-data="{ open: {{ $isBantuanActive ? 'true' : 'false' }} }">
                        <button @click="open = !open" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl hover:bg-white/10 transition-all duration-200
                                                                            {{ $isBantuanActive ? 'bg-white/15' : '' }}">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-lg bg-gradient-to-br from-pink-500 to-pink-600 flex items-center justify-center">
                                    <i data-lucide="help-circle" class="w-4 h-4 text-white"></i>
                                </div>
                                <span class="font-medium">Bantuan</span>
                            </div>
                            <i data-lucide="chevron-down" :class="open ? 'rotate-180' : ''"
                                class="w-4 h-4 transition-transform duration-300"></i>
                        </button>

                        <div x-show="open" x-transition class="mt-2 ml-11 space-y-1">
                            <a href="/asesor/bantuan/buku-panduan"
                                class="group flex items-center gap-2 px-3 py-2 rounded-lg transition-all duration-200
                                                                           hover:bg-white/5 hover:translate-x-1
                                                                           {{ request()->is('asesor/bantuan/buku-panduan*') ? 'text-yellow-300' : '' }}">
                                <i data-lucide="book-open" class="w-3.5 h-3.5"></i>
                                <span class="text-sm">Buku Panduan</span>
                            </a>
                            <a href="/asesor/bantuan/hubungi-cs"
                                class="group flex items-center gap-2 px-3 py-2 rounded-lg transition-all duration-200
                                                                           hover:bg-white/5 hover:translate-x-1
                                                                           {{ request()->is('asesor/bantuan/hubungi-cs*') ? 'text-yellow-300' : '' }}">
                                <i data-lucide="headphones" class="w-3.5 h-3.5"></i>
                                <span class="text-sm">Hubungi CS</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
    </nav>

    <!-- Bottom User Profile & Logout -->
    <div class="border-t border-white/10 bg-gradient-to-t from-black/20 to-transparent pt-4">
        <div class="flex items-center gap-3 mb-4">
            <div class="relative">
                <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=0D1B5C&color=fff' }}"
                    class="w-10 h-10 rounded-full border-2 border-white/20 object-cover">
                <div class="absolute bottom-0 right-0 w-3 h-3
                    @if($role === 'admin') bg-blue-400
                    @elseif($role === 'asesi') bg-green-400
                    @elseif($role === 'asesor') bg-yellow-400
                    @else bg-gray-400 @endif
                    rounded-full border-2 border-[#0D1B5C]"></div>
            </div>
            <div class="flex-1 min-w-0">
                <p class="font-semibold truncate text-sm">{{ Auth::user()->name }}</p>
                <p class="text-xs text-white/60 truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl
                       @if($role === 'admin') bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700
                       @elseif($role === 'asesi') bg-gradient-to-r from-red-500/80 to-red-600/80 hover:from-red-600/80 hover:to-red-700/80
                       @elseif($role === 'asesor') bg-gradient-to-r from-red-500/90 to-red-600/90 hover:from-red-600/90 hover:to-red-700/90
                       @endif
                       transition-all shadow-lg hover:shadow-red-500/25">
                <i data-lucide="log-out" class="w-4 h-4"></i>
                <span class="font-semibold text-sm">Keluar</span>
            </button>
        </form>
    </div>
</aside>

<!-- JavaScript for sidebar interactions -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        const menuClose = document.getElementById('menu-close');

        if (menuClose) {
            menuClose.addEventListener('click', function () {
                sidebar.classList.add('-translate-x-full');
            });
        }

        // Toggle sidebar when menu button is clicked (add this to your main layout)
        const menuOpen = document.getElementById('menu-open');
        if (menuOpen) {
            menuOpen.addEventListener('click', function () {
                sidebar.classList.toggle('-translate-x-full');
            });
        }
    });
</script>
