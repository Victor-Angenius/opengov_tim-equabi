<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Opengov') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --accent: #0f172a;
            --accent-soft: #1e293b;
            --surface: #ffffff;
            --surface-muted: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --line: #e2e8f0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f5f7fb;
            color: var(--text-muted);
        }

        .btn-primary {
            background-color: var(--accent);
            color: #ffffff;
            border-radius: 0.9rem;
            transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: var(--accent-soft);
        }

        .card {
            background-color: var(--surface);
            border: 1px solid var(--line);
            border-radius: 1.25rem;
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.04);
        }

        .btn-outline {
            border: 1px solid var(--line);
            background-color: var(--surface);
            color: var(--text-main);
            border-radius: 0.9rem;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }

        .btn-outline:hover,
        .btn-outline:focus {
            background-color: var(--surface-muted);
            border-color: #cbd5e1;
        }

        .app-shell {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 1.25rem;
        }

        .section-header {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            padding: 0.35rem 0.75rem;
            border-radius: 9999px;
            border: 1px solid var(--line);
            background-color: rgba(255, 255, 255, 0.72);
            color: var(--text-main);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .high-contrast {
            background-color: #0b1120;
            color: #f8fafc;
        }

        .high-contrast nav {
            background-color: #0f172a;
        }

        .high-contrast main,
        .high-contrast section,
        .high-contrast article,
        .high-contrast aside,
        .high-contrast header,
        .high-contrast footer,
        .high-contrast table,
        .high-contrast thead,
        .high-contrast tbody,
        .high-contrast tr,
        .high-contrast th,
        .high-contrast td,
        .high-contrast dl,
        .high-contrast dt,
        .high-contrast dd,
        .high-contrast li,
        .high-contrast span,
        .high-contrast strong,
        .high-contrast small,
        .high-contrast div {
            color: #f8fafc;
        }

        .high-contrast .card {
            background-color: #14213d;
            border-color: #334155;
        }

        .high-contrast a,
        .high-contrast p,
        .high-contrast label,
        .high-contrast input,
        .high-contrast select,
        .high-contrast textarea {
            color: #e2e8f0;
        }

        /* Links should be more visible with underline */
        .high-contrast a {
            color: #60a5fa !important;
            text-decoration: underline !important;
        }

        .high-contrast a:hover {
            color: #93c5fd !important;
        }

        .high-contrast h1,
        .high-contrast h2,
        .high-contrast h3,
        .high-contrast h4,
        .high-contrast h5,
        .high-contrast h6,
        .high-contrast th,
        .high-contrast dt,
        .high-contrast strong {
            color: #ffffff;
        }

        .high-contrast [class*="text-slate-"],
        .high-contrast [class*="text-gray-"],
        .high-contrast [class*="text-zinc-"],
        .high-contrast [class*="text-neutral-"],
        .high-contrast [class*="text-stone-"] {
            color: #f8fafc !important;
        }

        .high-contrast [class*="text-blue-"],
        .high-contrast [class*="text-green-"],
        .high-contrast [class*="text-orange-"],
        .high-contrast [class*="text-red-"],
        .high-contrast [class*="text-cyan-"],
        .high-contrast [class*="text-amber-"] {
            color: #ffffff !important;
        }

        .high-contrast [class*="bg-white"],
        .high-contrast [class*="bg-slate-50"],
        .high-contrast [class*="bg-slate-100"],
        .high-contrast [class*="bg-green-50"],
        .high-contrast [class*="bg-blue-50"],
        .high-contrast [class*="bg-cyan-50"],
        .high-contrast [class*="bg-amber-50"],
        .high-contrast [class*="bg-orange-50"],
        .high-contrast [class*="bg-red-50"] {
            background-color: #14213d !important;
        }

        .high-contrast [class*="border-slate-"],
        .high-contrast [class*="border-gray-"],
        .high-contrast [class*="border-zinc-"],
        .high-contrast [class*="border-neutral-"],
        .high-contrast [class*="border-stone-"],
        .high-contrast [class*="border-blue-"],
        .high-contrast [class*="border-green-"],
        .high-contrast [class*="border-cyan-"],
        .high-contrast [class*="border-amber-"],
        .high-contrast [class*="border-orange-"],
        .high-contrast [class*="border-red-"] {
            border-color: #475569 !important;
        }

        .high-contrast input,
        .high-contrast select,
        .high-contrast textarea,
        .high-contrast button:not(.btn-primary) {
            background-color: #0f172a;
            border-color: #64748b;
        }

        .high-contrast input::placeholder,
        .high-contrast textarea::placeholder {
            color: #cbd5e1;
        }

        .high-contrast .card,
        .high-contrast table,
        .high-contrast thead,
        .high-contrast tbody {
            background-color: #14213d;
        }

        .high-contrast .btn-primary {
            background-color: #0d4d8b;
            color: #ffffff;
            border: 2px solid #ffffff;
        }

        .high-contrast .btn-primary:hover,
        .high-contrast .btn-primary:focus {
            background-color: #1d4ed8;
        }

        .high-contrast .btn-outline {
            background-color: #0f172a;
            border: 2px solid #f8fafc;
            color: #f8fafc;
        }

        .high-contrast .btn-outline:hover,
        .high-contrast .btn-outline:focus {
            background-color: #1e293b;
            border-color: #ffffff;
        }

        /* Ensure all button text is visible in high contrast */
        .high-contrast button,
        .high-contrast .btn-primary,
        .high-contrast .btn-outline,
        .high-contrast input[type="submit"],
        .high-contrast input[type="button"],
        .high-contrast input[type="reset"] {
            color: #ffffff !important;
            text-shadow: 0 0 2px rgba(0,0,0,0.8);
        }

        /* Ensure speak button text is visible */
        .high-contrast #speakButton,
        .high-contrast #contrastToggle {
            color: #ffffff !important;
        }

        .high-contrast .status-tag.pending {
            background-color: #f97316;
            color: #ffffff;
        }

        .high-contrast .status-tag.in_progress {
            background-color: #2563eb;
            color: #ffffff;
        }

        .high-contrast .status-tag.resolved {
            background-color: #16a34a;
            color: #ffffff;
        }

        .high-contrast .role-badge.admin,
        .high-contrast .role-badge.user {
            background-color: #1e293b;
            color: #ffffff;
            border: 1px solid #64748b;
        }

        .status-tag {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 0.75rem;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 9999px;
        }

        .status-tag.pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-tag.in_progress {
            background-color: #dbeafe;
            color: #1d4ed8;
        }

        .status-tag.resolved {
            background-color: #dcfce7;
            color: #166534;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border-radius: 9999px;
            padding: 0.45rem 0.9rem;
            font-size: 0.8rem;
            font-weight: 700;
            border: 1px solid var(--line);
        }

        .role-badge.admin {
            background-color: #f8fafc;
            color: #0f172a;
        }

        .role-badge.user {
            background-color: #f8fafc;
            color: #0f172a;
        }

        @media (min-width: 768px) {
            .section-header {
                align-items: flex-end;
                flex-direction: row;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        <nav class="sticky top-0 z-40 border-b border-slate-200 bg-white/90 backdrop-blur">
            <div class="app-shell">
                <div class="flex min-h-[4.5rem] flex-col justify-center gap-3 py-3 md:flex-row md:items-center md:justify-between md:py-0">
                    <div class="flex flex-wrap items-center gap-2 md:gap-5">
                        <a href="/" class="text-lg font-bold tracking-tight text-slate-950">Opengov</a>
                        <a href="{{ route('education') }}" class="px-3 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-950">Edukasi</a>
                        <a href="{{ route('service-guide') }}" class="px-3 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-950">Panduan Layanan</a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="px-3 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-950">Dashboard</a>
                            <a href="{{ route('reports.index') }}" class="px-3 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-950">Laporan</a>
                        @endauth
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        @guest
                            <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-950">Login</a>
                            <a href="{{ route('register') }}" class="btn-primary px-4 py-2 text-sm font-semibold">Register</a>
                        @else
                            <span class="role-badge {{ auth()->user()->isAdmin() ? 'admin' : 'user' }}">
                                {{ auth()->user()->isAdmin() ? 'Admin' : 'User' }}
                            </span>
                            @can('manage-admins')
                                <a href="{{ route('admin.users.index') }}" class="px-3 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-950">Kelola Admin</a>
                            @endcan
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="px-3 py-2 text-sm font-medium text-slate-600 transition hover:text-slate-950">Logout</button>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-8 md:py-10">
            <div class="app-shell">
                <div class="mb-6 rounded-[1.5rem] border border-slate-200 bg-white px-6 py-6 shadow-sm md:px-8">
                    <div class="section-header">
                        <div>
                            <span class="eyebrow">Platform Layanan Publik</span>
                            <h1 class="mt-4 text-2xl font-semibold tracking-tight text-slate-950 md:text-3xl">Pelaporan publik yang lebih sederhana dan mudah dipantau</h1>
                            <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-600 md:text-base">OpenGov membantu warga melapor, memahami layanan, dan mengikuti proses tindak lanjut tanpa tampilan yang berlebihan.</p>
                        </div>
                        @auth
                            <p class="max-w-sm text-sm leading-6 text-slate-600 md:text-right">
                                Masuk sebagai <strong class="text-slate-900">{{ auth()->user()->isAdmin() ? 'Admin' : 'User' }}</strong>.
                                {{ auth()->user()->isAdmin()
                                    ? ' Anda dapat melihat semua laporan dan memperbarui statusnya.'
                                    : ' Anda dapat membuat laporan baru dan memantau laporan milik sendiri.' }}
                            </p>
                        @endauth
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <button id="contrastToggle" class="btn-primary px-4 py-2 text-sm font-semibold">High contrast</button>
                        <button id="speakButton" class="btn-outline px-4 py-2 text-sm font-semibold">Baca halaman</button>
                        <button id="resetButton" class="btn-outline px-3 py-2 text-sm font-semibold" title="Reset bacaan" style="display: none;">↺</button>
                    </div>
                </div>

                @if (session('success'))
                    <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const body = document.body;
            const contrastToggle = document.getElementById('contrastToggle');
            const speakButton = document.getElementById('speakButton');

            const savedContrast = localStorage.getItem('opengovHighContrast');
            if (savedContrast === 'true') {
                body.classList.add('high-contrast');
            }

            contrastToggle.addEventListener('click', function () {
                body.classList.toggle('high-contrast');
                localStorage.setItem('opengovHighContrast', body.classList.contains('high-contrast'));
            });

            let originalText = 'Baca halaman';
            let isPaused = false;
            let currentUtterance = null;
            const resetButton = document.getElementById('resetButton');
            
            speakButton.addEventListener('click', function () {
                // If currently speaking, pause it
                if (window.speechSynthesis.speaking && !isPaused) {
                    window.speechSynthesis.pause();
                    isPaused = true;
                    speakButton.textContent = 'Lanjut';
                    return;
                }
                
                // If paused, resume
                if (isPaused) {
                    window.speechSynthesis.resume();
                    isPaused = false;
                    speakButton.textContent = 'Berhenti';
                    return;
                }
                
                const mainText = document.querySelector('main').innerText.trim();
                if (!('speechSynthesis' in window)) {
                    alert('Text-to-speech tidak didukung di browser ini.');
                    return;
                }
                
                if (!mainText) {
                    alert('Tidak ada teks untuk dibaca.');
                    return;
                }
                
                // Update button text to show it's playing
                speakButton.textContent = 'Berhenti';
                resetButton.style.display = 'inline-block';
                
                currentUtterance = new SpeechSynthesisUtterance(mainText);
                currentUtterance.lang = 'id-ID';
                
                currentUtterance.onend = function() {
                    speakButton.textContent = originalText;
                    resetButton.style.display = 'none';
                    isPaused = false;
                    currentUtterance = null;
                };
                
                currentUtterance.onerror = function(event) {
                    if (event.error !== 'interrupted') {
                        speakButton.textContent = originalText;
                        resetButton.style.display = 'none';
                        isPaused = false;
                        currentUtterance = null;
                    }
                };
                
                speechSynthesis.speak(currentUtterance);
            });
            
            // Reset button - stop and restart from beginning
            resetButton.addEventListener('click', function () {
                if (window.speechSynthesis.speaking || window.speechSynthesis.paused) {
                    window.speechSynthesis.cancel();
                }
                
                const mainText = document.querySelector('main').innerText.trim();
                if (!mainText) {
                    alert('Tidak ada teks untuk dibaca.');
                    return;
                }
                
                speakButton.textContent = 'Berhenti';
                resetButton.style.display = 'inline-block';
                isPaused = false;
                
                currentUtterance = new SpeechSynthesisUtterance(mainText);
                currentUtterance.lang = 'id-ID';
                
                currentUtterance.onend = function() {
                    speakButton.textContent = originalText;
                    resetButton.style.display = 'none';
                    currentUtterance = null;
                };
                
                currentUtterance.onerror = function(event) {
                    if (event.error !== 'interrupted') {
                        speakButton.textContent = originalText;
                        resetButton.style.display = 'none';
                        currentUtterance = null;
                    }
                };
                
                speechSynthesis.speak(currentUtterance);
            });
        });
    </script>
</body>
</html>
