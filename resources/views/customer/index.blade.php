<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GoTravel - Transportasi & Pengiriman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
    html, body {
      height: 100%;
    }
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-50 flex flex-col">

    <!-- Header -->
    <div class="relative bg-gradient-to-br from-indigo-400 to-purple-500 text-white p-4 pt-4 pb-12 rounded-b-3xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold">Halo, Budi!</h1>
                <p class="text-blue-100 text-sm">Mau kemana hari ini?</p>
            </div>
            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                <span class="text-lg">👤</span>
            </div>
        </div>

        <!-- Floating Search Bar -->
        <div class="absolute left-0 right-0 px-4 -bottom-6 z-10">
            <div class="bg-white rounded-xl p-3 shadow-md backdrop-blur-sm flex items-center space-x-3">
                <span class="text-lg text-gray-500">🔍</span>
                <input type="text" placeholder="Cari nomor tiket atau nomor resi..." class="bg-transparent text-gray-800 placeholder-gray-400 flex-1 outline-none" />
            </div>
        </div>
    </div>

    <!-- Main Content (scrollable) -->
    <main class="flex-1 overflow-y-auto">
        <div class="mt-10 px-4 pb-[120px]">

            <!-- Layanan Utama -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Layanan Utama</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white rounded-xl p-4 shadow hover:shadow-lg transition cursor-pointer" onclick="selectService('travel')">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-3">
                            <span class="text-2xl">🚗</span>
                        </div>
                        <h3 class="font-semibold text-gray-800">Travel Antar Kota</h3>
                        <p class="text-sm text-gray-600 mt-1">Perjalanan nyaman ke berbagai kota</p>
                    </div>

                    <div class="bg-white rounded-xl p-4 shadow hover:shadow-lg transition cursor-pointer" onclick="selectService('cargo')">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-3">
                            <span class="text-2xl">📦</span>
                        </div>
                        <h3 class="font-semibold text-gray-800">Kirim Barang</h3>
                        <p class="text-sm text-gray-600 mt-1">Pengiriman cepat dan aman</p>
                    </div>
                </div>
            </div>

            <!-- Perjalanan Terakhir -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-lg font-semibold text-gray-800">Perjalanan Terakhir</h2>
                    <button class="text-blue-600 text-sm font-medium">Lihat Semua</button>
                </div>
                <div class="bg-white rounded-xl p-4 shadow">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-lg">🚗</span>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">Jakarta → Bandung</p>
                            <p class="text-sm text-gray-600">15 Desember 2024</p>
                        </div>
                        <button class="text-blue-600 text-sm font-medium">Pesan Lagi</button>
                    </div>
                </div>
            </div>

            <!-- Promo -->
            <div class="mb-6">
                <div class="bg-gradient-to-r from-orange-400 to-pink-500 rounded-xl p-4 text-white">
                    <h3 class="font-bold text-lg mb-1">Diskon 25%</h3>
                    <p class="text-sm opacity-90 mb-3">Untuk perjalanan pertama Anda!</p>
                    <button class="bg-white text-orange-500 px-4 py-2 rounded-lg text-sm font-medium">Gunakan Sekarang</button>
                </div>
            </div>

            <!-- Tujuan Populer -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Tujuan Populer</h2>
                <div class="flex space-x-3 overflow-x-auto pb-2">
                    <div class="flex-shrink-0 bg-white rounded-xl p-3 shadow text-center min-w-[120px] cursor-pointer">
                        <div class="text-2xl mb-2">🏙️</div>
                        <p class="text-sm font-medium text-gray-800">Jakarta</p>
                        <p class="text-xs text-gray-600">Mulai 150k</p>
                    </div>
                    <div class="flex-shrink-0 bg-white rounded-xl p-3 shadow text-center min-w-[120px] cursor-pointer">
                        <div class="text-2xl mb-2">🏔️</div>
                        <p class="text-sm font-medium text-gray-800">Bandung</p>
                        <p class="text-xs text-gray-600">Mulai 100k</p>
                    </div>
                    <div class="flex-shrink-0 bg-white rounded-xl p-3 shadow text-center min-w-[120px] cursor-pointer">
                        <div class="text-2xl mb-2">🏖️</div>
                        <p class="text-sm font-medium text-gray-800">Yogyakarta</p>
                        <p class="text-xs text-gray-600">Mulai 200k</p>
                    </div>
                    <div class="flex-shrink-0 bg-white rounded-xl p-3 shadow text-center min-w-[120px] cursor-pointer">
                        <div class="text-2xl mb-2">🌆</div>
                        <p class="text-sm font-medium text-gray-800">Surabaya</p>
                        <p class="text-xs text-gray-600">Mulai 250k</p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Bottom Navigation -->
    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-50">
        <div class="flex items-center justify-around py-2">
            <button class="flex flex-col items-center text-indigo-500" onclick="switchTab('home')">
                <span class="text-xl mb-1">🏠</span>
                <span class="text-xs font-medium">Beranda</span>
            </button>
            <button class="flex flex-col items-center text-gray-500" onclick="switchTab('booking')">
                <span class="text-xl mb-1">📅</span>
                <span class="text-xs font-medium">Pesanan</span>
            </button>
            <button class="flex flex-col items-center text-gray-500" onclick="switchTab('history')">
                <span class="text-xl mb-1">📋</span>
                <span class="text-xs font-medium">Riwayat</span>
            </button>
            <button class="flex flex-col items-center text-gray-500" onclick="switchTab('profile')">
                <span class="text-xl mb-1">👤</span>
                <span class="text-xs font-medium">Profil</span>
            </button>
        </div>
    </div>

    <!-- Modal Pilih Layanan -->
    <div id="serviceModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="absolute bottom-0 left-0 right-0 bg-white rounded-t-3xl p-6">
            <div class="w-12 h-1 bg-gray-300 rounded-full mx-auto mb-6"></div>
            <h3 class="text-xl font-bold text-gray-800 mb-4" id="modalTitle">Pilih Layanan</h3>

            <div id="travelOptions" class="space-y-3 hidden">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl cursor-pointer hover:bg-gray-100">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">🚗</span>
                        <div>
                            <p class="font-medium">Travel Reguler</p>
                            <p class="text-sm text-gray-600">Ekonomis dan nyaman</p>
                        </div>
                    </div>
                    <span class="text-blue-600 font-medium">Mulai 100k</span>
                </div>
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl cursor-pointer hover:bg-gray-100">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">🚐</span>
                        <div>
                            <p class="font-medium">Travel Premium</p>
                            <p class="text-sm text-gray-600">Lebih luas dan mewah</p>
                        </div>
                    </div>
                    <span class="text-blue-600 font-medium">Mulai 150k</span>
                </div>
            </div>

            <div id="cargoOptions" class="space-y-3 hidden">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl cursor-pointer hover:bg-gray-100">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">📦</span>
                        <div>
                            <p class="font-medium">Paket Reguler</p>
                            <p class="text-sm text-gray-600">1-3 hari sampai</p>
                        </div>
                    </div>
                    <span class="text-green-600 font-medium">Mulai 15k</span>
                </div>
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl cursor-pointer hover:bg-gray-100">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">⚡</span>
                        <div>
                            <p class="font-medium">Paket Express</p>
                            <p class="text-sm text-gray-600">Same day delivery</p>
                        </div>
                    </div>
                    <span class="text-green-600 font-medium">Mulai 25k</span>
                </div>
            </div>

            <button onclick="closeModal()" class="w-full mt-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-medium">Tutup</button>
        </div>
    </div>

    <!-- Script -->
    <script>
        function switchTab(tab) {
            document.querySelectorAll('.flex-col.items-center').forEach(btn => {
                btn.classList.replace('text-indigo-500', 'text-gray-500');
            });
            event.currentTarget.classList.replace('text-gray-500', 'text-indigo-500');
        }

        function selectService(service) {
            document.getElementById('modalTitle').textContent = service === 'travel' ? 'Pilih Jenis Travel' : 'Pilih Jenis Pengiriman';
            document.getElementById('travelOptions').classList.toggle('hidden', service !== 'travel');
            document.getElementById('cargoOptions').classList.toggle('hidden', service !== 'cargo');
            document.getElementById('serviceModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('serviceModal').classList.add('hidden');
        }

        document.getElementById('serviceModal').addEventListener('click', function (e) {
            if (e.target === this) closeModal();
        });
    </script>
</body>

</html>