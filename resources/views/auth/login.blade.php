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
    <title>Sign in — {{ config('app.name', 'Masifundeni') }}</title>

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

        {{-- Subtle grid pattern --}}
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

        {{-- Blue accent blob --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-indigo-600/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

        {{-- Brand --}}
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

        {{-- Middle content --}}
        <div class="relative z-10 space-y-8">
            <div>
                <h1 class="text-3xl font-bold text-white leading-snug">
                    Your academic<br>journey starts here.
                </h1>
                <p class="mt-3 text-sm text-slate-400 leading-relaxed">
                    Access your courses, track progress, and manage your educational journey — all in one place.
                </p>
            </div>

            <ul class="space-y-4" role="list">
                @foreach([
                    ['icon' => 'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z', 'text' => 'Multi-role access — admin, instructor, student'],
                    ['icon' => 'M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25', 'text' => 'Course enrolment & management'],
                    ['icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z', 'text' => 'Progress reports & grade tracking'],
                ] as $feature)
                    <li class="flex items-center gap-3">
                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-600/20 shrink-0">
                            <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['icon'] }}"/>
                            </svg>
                        </span>
                        <span class="text-sm text-slate-400">{{ $feature['text'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Footer --}}
        <div class="relative z-10">
            <p class="text-xs text-slate-600">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>

    {{-- ── Right: login form ─────────────────────────────────────────── --}}
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

            {{-- Dark mode toggle (top right) --}}
            <div class="flex justify-end mb-6">
                <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                        class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400
                               hover:text-slate-700 dark:hover:text-slate-200 transition-colors"
                        aria-label="Toggle dark mode">
                    <span x-text="darkMode ? '☀ Light' : '🌙 Dark'"></span>
                </button>
            </div>

            {{-- Heading --}}
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Welcome back</h2>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Sign in to your account to continue</p>
            </div>

            {{-- Errors --}}
            @if ($errors->any())
                <div class="alert-error mb-5">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                    </svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-5" novalidate>
                @csrf

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
                        autofocus
                        autocomplete="username"
                    >
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="form-label !mb-0">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-xs font-medium text-blue-600 dark:text-blue-400 hover:underline">
                                Forgot password?
                            </a>
                        @endif
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input @error('password') border-red-400 @enderror"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                    >
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember me --}}
                <div class="flex items-center gap-2.5">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500
                               dark:border-slate-600 dark:bg-slate-800"
                    >
                    <label for="remember" class="text-sm text-slate-600 dark:text-slate-400 select-none">
                        Keep me signed in
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-primary w-full text-base">
                    Sign in
                </button>
            </form>

            {{-- Register link --}}
            @if (Route::has('register'))
                <p class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
                    Don't have an account?
                    <a href="{{ route('register') }}"
                       class="font-medium text-blue-600 dark:text-blue-400 hover:underline">
                        Create one
                    </a>
                </p>
            @endif
        </div>
    </div>
</div>

</body>
</html>