<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OpenGov - Pelaporan dan Edukasi Layanan Publik</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-600">
    <nav class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">
        <div class="mx-auto flex min-h-[4.5rem] max-w-6xl flex-col justify-center gap-3 px-4 py-3 sm:px-6 md:flex-row md:items-center md:justify-between md:py-0 lg:px-8">
            <div class="flex flex-wrap items-center gap-3 md:gap-6">
                <span class="text-lg font-bold tracking-tight text-slate-950">OpenGov</span>
                <div class="hidden items-center gap-4 md:flex">
                    <a href="{{ route('education') }}" class="text-sm font-medium text-slate-600 hover:text-slate-950">Edukasi</a>
                    <a href="{{ route('service-guide') }}" class="text-sm font-medium text-slate-600 hover:text-slate-950">Panduan Layanan</a>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-slate-600 hover:text-slate-950">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-slate-600 hover:text-slate-950">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-slate-950">Login</a>
                    <a href="{{ route('register') }}" class="rounded-xl bg-slate-950 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="py-16 lg:py-20">
        <div class="mx-auto grid max-w-6xl gap-8 px-4 sm:px-6 lg:grid-cols-[1.15fr_0.85fr] lg:px-8 lg:items-center">
            <div>
                <span class="inline-flex rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-slate-700">Layanan publik yang ringkas</span>
                <h1 class="mt-5 max-w-3xl text-4xl font-extrabold leading-tight tracking-tight text-slate-950 lg:text-5xl">
                    Satu tempat untuk melapor, belajar, dan memahami alur layanan publik.
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600">
                    OpenGov dirancang agar warga bisa bergerak cepat: kirim laporan, cek panduan, dan pahami tindak lanjut tanpa tampilan yang padat.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center rounded-xl bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                            Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center rounded-xl bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                            Daftar Sekarang
                        </a>
                    @endauth
                    <a href="{{ route('service-guide') }}" class="inline-flex items-center rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                        Lihat Panduan
                    </a>
                </div>
            </div>

            <div class="rounded-[1.75rem] border border-slate-200 bg-white p-8 shadow-sm">
                <div class="grid gap-5">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">Yang bisa dilakukan</p>
                        <p class="mt-3 text-2xl font-semibold leading-tight text-slate-950">Alur yang lebih singkat, isi yang lebih fokus.</p>
                    </div>
                    <div class="space-y-4">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold text-slate-900">Laporan publik</p>
                            <p class="mt-1 text-sm leading-6 text-slate-600">Kirim aduan dengan judul, kategori, lokasi, dan bukti pendukung.</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold text-slate-900">Panduan layanan</p>
                            <p class="mt-1 text-sm leading-6 text-slate-600">Pahami alur umum dan kanal yang tepat sebelum mengurus kebutuhan warga.</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold text-slate-900">Edukasi warga</p>
                            <p class="mt-1 text-sm leading-6 text-slate-600">Pelajari hak warga dan cara menyampaikan aduan secara efektif.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 lg:py-10">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 md:grid-cols-3">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-900">Lebih sederhana</p>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Tampilan difokuskan ke tugas utama agar warga tidak bingung saat menggunakan layanan.</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-900">Lebih jelas</p>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Status, kategori, dan tindakan utama dibuat lebih mudah ditemukan dalam sekali lihat.</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-semibold text-slate-900">Lebih terarah</p>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Akses ke laporan, edukasi, dan panduan layanan tetap tersedia tanpa elemen visual yang berlebihan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">
                <div>
                    <span class="inline-flex rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-slate-700">Akses cepat</span>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950">Pilih jalur yang paling sesuai dengan kebutuhan warga.</h2>
                    <p class="mt-4 text-base leading-8 text-slate-600">Jika ingin memahami hak dan etika menyampaikan aduan, buka pusat edukasi. Jika ingin mengurus kebutuhan layanan, mulai dari panduan layanan.</p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{ route('education') }}" class="inline-flex items-center rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white">Jelajahi Edukasi</a>
                        <a href="{{ route('service-guide') }}" class="inline-flex items-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700">Lihat Panduan Layanan</a>
                    </div>
                </div>
                <div class="grid gap-4">
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm font-semibold text-slate-900">Untuk warga</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Lebih siap mengurus layanan, lebih mudah menyusun laporan, dan lebih tahu ke mana harus mulai.</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm font-semibold text-slate-900">Untuk pengelola layanan</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Masukan yang datang jadi lebih jelas sehingga tindak lanjut dan komunikasi bisa lebih teratur.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 pb-16">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 md:grid-cols-3">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 text-center shadow-sm">
                    <div class="text-3xl font-bold text-slate-950">500+</div>
                    <div class="mt-1 text-sm text-slate-500">Laporan diterima</div>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-white p-6 text-center shadow-sm">
                    <div class="text-3xl font-bold text-slate-950">85%</div>
                    <div class="mt-1 text-sm text-slate-500">Terselesaikan</div>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-white p-6 text-center shadow-sm">
                    <div class="text-3xl font-bold text-slate-950">50+</div>
                    <div class="mt-1 text-sm text-slate-500">Kabupaten/Kota</div>
                </div>
            </div>
        </div>
    </section>

    <footer class="border-t border-slate-200 bg-white py-8">
        <div class="mx-auto max-w-6xl px-4 text-center text-sm text-slate-500 sm:px-6 lg:px-8">
            <p>&copy; 2026 OpenGov. Builded by Equabi.</p>
        </div>
    </footer>
</body>
</html>
