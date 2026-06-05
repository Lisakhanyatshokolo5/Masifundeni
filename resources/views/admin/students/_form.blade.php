{{-- Student Form (Create/Edit) --}}

<div class="space-y-6">

    {{-- NAME --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Name
        </label>

        <input type="text"
               name="name"
               value="{{ old('name', $student->name ?? '') }}"
               placeholder="Enter full name"
               class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">

        @error('name')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    {{-- EMAIL --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Email
        </label>

        <input type="email"
               name="email"
               value="{{ old('email', $student->email ?? '') }}"
               placeholder="student@email.com"
               class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">

        @error('email')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    {{-- PASSWORD --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Password
            <span class="text-xs text-gray-400 font-normal">
                {{ isset($student) ? '(leave blank to keep current)' : '' }}
            </span>
        </label>

        <input type="password"
               name="password"
               placeholder="Enter password"
               class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">

        @error('password')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    {{-- CONFIRM PASSWORD --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Confirm Password
        </label>

        <input type="password"
               name="password_confirmation"
               placeholder="Confirm password"
               class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">
    </div>

    @php
        $profile = $student->studentProfile ?? null;
    @endphp

    {{-- PHONE --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Phone
        </label>

        <input type="text"
               name="phone"
               value="{{ old('phone', $profile->phone ?? '') }}"
               placeholder="e.g. 071 234 5678"
               class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">
    </div>

    {{-- DATE OF BIRTH --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Date of Birth
        </label>

        <input type="date"
               name="date_of_birth"
               value="{{ old('date_of_birth', optional($profile->date_of_birth ?? null)?->format('Y-m-d')) }}"
               class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">

        @error('date_of_birth')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    {{-- ADDRESS --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Address
        </label>

        <textarea name="address"
                  rows="2"
                  placeholder="Enter student address"
                  class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">{{ old('address', $profile->address ?? '') }}</textarea>
    </div>

    {{-- STATUS --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Status
        </label>

        <select name="status"
                class="w-full rounded-xl border-gray-200 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">

            @foreach(['active', 'suspended', 'graduated'] as $option)
                <option value="{{ $option }}"
                    {{ old('status', $profile->status ?? 'active') === $option ? 'selected' : '' }}>
                    {{ ucfirst($option) }}
                </option>
            @endforeach

        </select>
    </div>

</div>