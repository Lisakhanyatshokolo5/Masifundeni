{{-- Name --}}
<div>
    <label class="block text-sm font-medium text-gray-700">Name</label>
    <input type="text" name="name"
           value="{{ old('name', $student->name ?? '') }}"
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
</div>

{{-- Email --}}
<div>
    <label class="block text-sm font-medium text-gray-700">Email</label>
    <input type="email" name="email"
           value="{{ old('email', $student->email ?? '') }}"
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
</div>

{{-- Password --}}
<div>
    <label class="block text-sm font-medium text-gray-700">
        Password {{ isset($student) ? '(leave blank to keep current)' : '' }}
    </label>
    <input type="password" name="password"
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
</div>
<div>
    <label class="block text-sm font-medium text-gray-700">Confirm password</label>
    <input type="password" name="password_confirmation"
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

{{-- Phone --}}
<div>
    <label class="block text-sm font-medium text-gray-700">Phone</label>
    <input type="text" name="phone"
           value="{{ old('phone', $student->studentProfile->phone ?? '') }}"
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

{{-- Date of birth --}}
<div>
    <label class="block text-sm font-medium text-gray-700">Date of birth</label>
    <input type="date" name="date_of_birth"
           value="{{ old('date_of_birth', $student->studentProfile->date_of_birth?->format('Y-m-d') ?? '') }}"
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('date_of_birth') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
</div>

{{-- Address --}}
<div>
    <label class="block text-sm font-medium text-gray-700">Address</label>
    <textarea name="address" rows="2"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('address', $student->studentProfile->address ?? '') }}</textarea>
</div>

{{-- Status --}}
<div>
    <label class="block text-sm font-medium text-gray-700">Status</label>
    <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @foreach(['active', 'suspended', 'graduated'] as $option)
            <option value="{{ $option }}"
                {{ old('status', $student->studentProfile->status ?? 'active') === $option ? 'selected' : '' }}>
                {{ ucfirst($option) }}
            </option>
        @endforeach
    </select>
</div>