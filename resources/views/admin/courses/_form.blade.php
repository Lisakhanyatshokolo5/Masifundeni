{{-- resources/views/admin/courses/_form.blade.php --}}

<div class="space-y-5">

    {{-- Instructor --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Instructor
        </label>

        <select name="instructor_id"
            class="w-full rounded-xl border-gray-200 bg-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">

            @foreach($instructors as $instructor)
                <option value="{{ $instructor->id }}"
                    {{ old('instructor_id', $course->instructor_id ?? '') == $instructor->id ? 'selected' : '' }}>
                    {{ $instructor->name }}
                </option>
            @endforeach
        </select>

        @error('instructor_id')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    {{-- Title --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Course Title
        </label>

        <input type="text"
            name="title"
            value="{{ old('title', $course->title ?? '') }}"
            placeholder="e.g. Introduction to Programming"
            class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">

        @error('title')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    {{-- Description --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Description
        </label>

        <textarea name="description"
            rows="4"
            placeholder="Write a short course description..."
            class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-100 transition p-2">{{ old('description', $course->description ?? '') }}</textarea>
    </div>

    {{-- Status --}}
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