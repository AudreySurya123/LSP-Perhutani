<header class="bg-linear-to-r from-white to-gray-50 shadow-lg px-6 py-4 flex justify-between items-center border-b border-gray-100">
    <!-- Left Section: Toggle & Breadcrumb -->
    <div class="flex items-center gap-4">
        <!-- Hamburger Mobile -->
        <button id="menu-toggle" class="md:hidden p-2.5 rounded-xl bg-linear-to-br from-blue-50 to-blue-100
                hover:from-blue-100 hover:to-blue-200 transition-all duration-300 shadow-sm hover:shadow-md">
            <i data-lucide="menu" class="w-5 h-5 text-blue-600"></i>
        </button>

        <!-- Breadcrumb or Title -->
        <div class="hidden md:block">
            <div class="flex items-center gap-2">
                @php
                    $user = Auth::user();
                    $role = $user->role ?? 'guest';

                    // Define all color mappings
                    $roleConfig = [
                        'admin' => [
                            'text' => 'blue',
                            'status' => 'green',
                            'icon' => 'shield',
                            'label' => 'Administrator',
                            'panel' => 'Admin Panel'
                        ],
                        'asesi' => [
                            'text' => 'green',
                            'status' => 'blue',
                            'icon' => 'user',
                            'label' => 'Asesi',
                            'panel' => 'Asesi Panel'
                        ],
                        'asesor' => [
                            'text' => 'yellow',
                            'status' => 'yellow',
                            'icon' => 'award',
                            'label' => 'Assessor',
                            'panel' => 'Assessor Panel'
                        ],
                        'guest' => [
                            'text' => 'gray',
                            'status' => 'gray',
                            'icon' => 'user',
                            'label' => 'Guest',
                            'panel' => 'Guest Panel'
                        ]
                    ];

                    $config = $roleConfig[$role] ?? $roleConfig['guest'];
                    $textColor = $config['text'];
                    $statusColor = $config['status'];
                    $icon = $config['icon'];
                    $label = $config['label'];
                    $panel = $config['panel'];
                @endphp
                <span class="text-sm font-medium text-{{ $textColor }}-600">
                    {{ $panel }}
                </span>
            </div>
            <h1 class="text-xl font-bold text-gray-800 mt-1">
                Selamat Datang,
                <span class="text-{{ $textColor }}-600">
                    {{ $user->name ?? 'User' }}
                </span>
            </h1>
        </div>
    </div>

    <!-- Right Section: User Info & Actions -->
    <div class="flex items-center gap-5">
        <!-- Quick Stats Badge -->
        @if($role === 'admin')
            <div class="hidden md:flex items-center gap-3">
            </div>
        @endif

        <!-- Notifications -->
        <div class="relative">
            <button class="p-2 rounded-xl bg-linear-to-br from-gray-50 to-gray-100
                    hover:from-gray-100 hover:to-gray-200 transition-all duration-300 shadow-sm hover:shadow-md group">
                <i data-lucide="bell" class="w-5 h-5 text-gray-600 group-hover:text-blue-600"></i>
                <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center animate-pulse">5</span>
            </button>
        </div>

        <!-- Messages -->
        <div class="relative hidden md:block">
            <button class="p-2 rounded-xl bg-linear-to-br from-gray-50 to-gray-100
                    hover:from-gray-100 hover:to-gray-200 transition-all duration-300 shadow-sm hover:shadow-md group">
                <i data-lucide="message-square" class="w-5 h-5 text-gray-600 group-hover:text-green-600"></i>
                <span class="absolute -top-1 -right-1 w-5 h-5 bg-green-500 text-white text-xs rounded-full flex items-center justify-center">2</span>
            </button>
        </div>

        <!-- User Profile Section -->
        <div class="flex items-center gap-3 relative" x-data="{ open: false }">
            <!-- User Info -->
            <div class="hidden md:block text-right">
                <p class="text-sm font-semibold text-gray-800">{{ $user->name ?? 'Admin' }}</p>
                <p class="text-xs text-gray-500 flex items-center gap-1">
                    <i data-lucide="{{ $icon }}" class="w-3 h-3 text-{{ $textColor }}-500"></i>
                    <span class="text-{{ $textColor }}-600">{{ $label }}</span>
                    @if($user->admin_level ?? false)
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-600">{{ ucfirst($user->admin_level) }}</span>
                    @endif
                </p>
            </div>

            <!-- Avatar with Dropdown -->
            <div class="relative">
                <button @click="open = !open" class="focus:outline-none">
                    <div class="relative group">
                        <img id="profile-avatar"
                             src="{{ $user->avatar ?? asset('images/default.png') }}"
                             class="w-11 h-11 rounded-full border-2 border-{{ $textColor }}-300 shadow-lg object-cover hover:scale-105 transition-transform duration-300"
                             alt="User Avatar">
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-{{ $statusColor }}-500 rounded-full border-2 border-white"></div>
                    </div>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     @click.away="open = false"
                     class="absolute right-0 mt-2 w-64 bg-white rounded-xl shadow-2xl border border-gray-100 z-50 overflow-hidden">

                    <!-- User Info Card -->
                    <div class="p-4 bg-linear-to-r from-{{ $textColor }}-50 to-{{ $textColor }}-100">
                        <div class="flex items-center gap-3">
                            <img
                                src="{{ $user->avatar ?? asset('images/default.png') }}"
                                class="w-12 h-12 rounded-full border-2 border-white shadow-md object-cover aspect-square"
                                alt="Avatar">

                            <div>
                                {{-- Nama --}}
                                <p class="font-semibold text-gray-800">
                                    {{ $user->name ?? 'User' }}
                                </p>

                                {{-- Email (HANYA ASESI) --}}
                                @if($role === 'asesi')
                                    <p class="text-sm text-gray-600">
                                        {{ $user->email }}
                                    </p>
                                @endif

                                {{-- Role --}}
                                <p class="text-xs mt-1 text-{{ $textColor }}-600">
                                    <i data-lucide="badge-check" class="w-3 h-3 inline mr-1"></i>
                                    {{ $label }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 my-1"></div>

                    <!-- Dropdown Items -->
                    <div class="py-2">
                        <a href="/profile"
                           class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors group">
                            <i data-lucide="user" class="w-4 h-4 text-gray-500 group-hover:text-blue-500"></i>
                            <span>Profil Saya</span>
                        </a>

                        <a href="/settings"
                           class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors group">
                            <i data-lucide="settings" class="w-4 h-4 text-gray-500 group-hover:text-green-500"></i>
                            <span>Pengaturan</span>
                        </a>

                        <a href="/help"
                           class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors group">
                            <i data-lucide="help-circle" class="w-4 h-4 text-gray-500 group-hover:text-purple-500"></i>
                            <span>Bantuan</span>
                        </a>

                        <div class="border-t border-gray-100 my-1"></div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors group">
                                <i data-lucide="log-out" class="w-4 h-4 group-hover:rotate-90 transition-transform"></i>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>

                    <!-- Footer -->
                    <div class="px-4 py-3 bg-gray-50 text-center border-t border-gray-100">
                        <p class="text-xs text-gray-500">
                            <i data-lucide="shield" class="w-3 h-3 inline mr-1"></i>
                            LSP System v1.0
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Toggle mobile sidebar
    document.getElementById('menu-toggle')?.addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        if (sidebar) {
            sidebar.classList.toggle('-translate-x-full');
        }
    });

    // Close sidebar when clicking menu-close
    document.getElementById('menu-close')?.addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        if (sidebar) {
            sidebar.classList.add('-translate-x-full');
        }
    });

    // Optional: Add click outside to close dropdown (already handled by Alpine.js)
    // But keep this for non-Alpine environments
    if (!window.Alpine) {
        document.addEventListener('click', function(e) {
            const avatar = document.querySelector('[x-data] button');
            const dropdown = document.querySelector('[x-show]');

            if (dropdown && !dropdown.contains(e.target) && !avatar.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    }
</script>

<!-- If using Alpine.js, make sure to initialize -->
<script src="//unpkg.com/alpinejs" defer></script>
