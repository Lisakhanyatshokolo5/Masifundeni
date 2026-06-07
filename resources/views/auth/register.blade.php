<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="h-full"
    x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="document.documentElement.classList.toggle('dark', darkMode)"
    :class="{ 'dark': darkMode }"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create account — {{ config('app.name', 'Masifundeni') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-slate-50 dark:bg-slate-900 font-sans antialiased">

<div class="min-h-screen flex">

    {{-- ── Left branding panel ──────────────────────────────────────── --}}
    <div class="hidden lg:flex lg:w-5/12 xl:w-2/5
                bg-slate-900 dark:bg-slate-950
                flex-col justify-between p-10 relative overflow-hidden"
         aria-hidden="true">

        <div class="absolute inset-0 opacity-[0.04]">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="48" height="48" patternUnits="userSpaceOnUse">
                        <path d="M 48 0 L 0 0 0 48" fill="none" stroke="white" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)"/>
            </svg>
        </div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-indigo-600/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

        <div class="relative z-10">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-blue-600 shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/>
                    </svg>
                </div>
                <span class="text-lg font-semibold text-white">{{ config('app.name', 'Masifundeni') }}</span>
            </div>
        </div>

        <div class="relative z-10 space-y-6">
            <div>
                <h1 class="text-3xl font-bold text-white leading-snug">
                    Join Masifundeni<br>today.
                </h1>
                <p class="mt-3 text-sm text-slate-400 leading-relaxed">
                    Create your account and get access to courses, grades, and academic progress tracking.
                </p>
            </div>

            <div class="space-y-3">
                @foreach([
                    'Enrol in published courses instantly',
                    'Track grades and performance in real time',
                    'Communicate with your instructors',
                ] as $benefit)
                    <div class="flex items-center gap-3">
                        <span class="flex items-center justify-center w-5 h-5 rounded-full bg-blue-600/30 shrink-0">
                            <svg class="w-3 h-3 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                            </svg>
                        </span>
                        <span class="text-sm text-slate-400">{{ $benefit }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="relative z-10">
            <p class="text-xs text-slate-600">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>

    {{-- ── Right: register form ──────────────────────────────────────── --}}
    <div class="flex flex-1 flex-col items-center justify-center px-4 sm:px-8 lg:px-12 py-12">

        {{-- Mobile brand --}}
        <div class="lg:hidden mb-8 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-blue-600 mb-3">
                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/>
                </svg>
            </div>
            <p class="text-base font-semibold text-slate-900 dark:text-slate-100">{{ config('app.name', 'Masifundeni') }}</p>
        </div>

        <div class="w-full max-w-md">

            <div class="flex justify-end mb-6">
                <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                        class="text-xs text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 transition-colors"
                        aria-label="Toggle dark mode">
                    <span x-text="darkMode ? '☀ Light' : '🌙 Dark'"></span>
                </button>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Create your account</h2>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Fill in your details to get started</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5" novalidate>
                @csrf

                {{-- Name --}}
                <div>
                    <label for="name" class="form-label">Full name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-input @error('name') border-red-400 @enderror"
                        placeholder="Jane Smith"
                        required
                        autofocus
                        autocomplete="name"
                    >
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="form-label">Email address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-input @error('email') border-red-400 @enderror"
                        placeholder="you@example.com"
                        required
                        autocomplete="username"
                    >
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input @error('password') border-red-400 @enderror"
                        placeholder="At least 8 characters"
                        required
                        autocomplete="new-password"
                    >
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm password --}}
                <div>
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-input"
                        placeholder="••••••••"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <button type="submit" class="btn-primary w-full text-base">
                    Create account
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
                Already have an account?
                <a href="{{ route('login') }}"
                   class="font-medium text-blue-600 dark:text-blue-400 hover:underline">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</div>

</body>
</html>