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

    {{-- LEFT PANEL --}}
    <div class="hidden lg:flex lg:w-5/12 xl:w-2/5 bg-slate-900 dark:bg-slate-950 flex-col justify-between p-10 relative overflow-hidden">

        <div class="relative z-10">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-blue-600">
                    <span class="text-white font-bold">M</span>
                </div>
                <span class="text-lg font-semibold text-white">
                    {{ config('app.name', 'Masifundeni') }}
                </span>
            </div>
        </div>

        <div class="relative z-10 space-y-6">
            <h1 class="text-3xl font-bold text-white">
                Join Masifundeni today.
            </h1>

            <p class="text-sm text-slate-400">
                Create your account as a student or instructor.
            </p>
        </div>

        <div class="relative z-10">
            <p class="text-xs text-slate-600">
                © {{ date('Y') }} {{ config('app.name') }}
            </p>
        </div>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="flex flex-1 items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            {{-- DARK MODE TOGGLE --}}
            <div class="flex justify-end mb-6">
                <button
                    @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                    class="text-xs text-slate-500 dark:text-slate-400"
                >
                    <span x-text="darkMode ? '☀ Light' : '🌙 Dark'"></span>
                </button>
            </div>

            <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100">
                Create your account
            </h2>

            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400 mb-6">
                Fill in your details to get started
            </p>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                {{-- NAME --}}
                <div>
                    <label for="name" class="form-label">Full name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-input @error('name') border-red-400 @enderror"
                        required
                    >
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-input @error('email') border-red-400 @enderror"
                        required
                    >
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ROLE --}}
                <div>
                    <label for="role" class="form-label">Account type</label>

                    <select
                        id="role"
                        name="role"
                        class="form-input @error('role') border-red-400 @enderror"
                        required
                    >
                        <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>
                            Student
                        </option>

                        <option value="instructor" {{ old('role') === 'instructor' ? 'selected' : '' }}>
                            Instructor
                        </option>
                    </select>

                    @error('role')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input @error('password') border-red-400 @enderror"
                        required
                    >
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CONFIRM PASSWORD --}}
                <div>
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-input"
                        required
                    >
                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="btn-primary w-full">
                    Create account
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                    Sign in
                </a>
            </p>

        </div>
    </div>
</div>

</body>
</html>