{{-- Instructor Course Form --}}

<div class="space-y-6">

    {{-- TITLE --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Course Title
        </label>

        <input type="text"
               name="title"
               value="{{ old('title', $course->title ?? '') }}"
               placeholder="e.g. Web Development Basics"
               class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">

        @error('title')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    {{-- DESCRIPTION --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Description
        </label>

        <textarea name="description"
                  rows="4"
                  placeholder="Write a short description for your course..."
                  class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">{{ old('description', $course->description ?? '') }}</textarea>
    </div>

    {{-- STATUS --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Status
        </label>

        <select name="status"
                class="w-full rounded-xl border-gray-200 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">

            @foreach(['draft', 'published', 'archived'] as $option)
                <option value="{{ $option }}"
                    {{ old('status', $course->status ?? 'draft') === $option ? 'selected' : '' }}>
                    {{ ucfirst($option) }}
                </option>
            @endforeach

        </select>
    </div>

</div>