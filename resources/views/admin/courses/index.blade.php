{{-- resources/views/admin/courses/index.blade.php --}}
<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                Courses
            </h2>

            <a href="{{ route('admin.courses.create') }}"
               class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-xl shadow-sm transition">
                New Course
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto px-4">

            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))
                <div class="mb-5 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            {{-- TABLE CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                {{-- HEADER --}}
                <div class="px-6 py-4 bg-gray-50 border-b flex justify-between items-center">
                    <h3 class="font-semibold text-gray-700">
                        All Courses
                    </h3>

                    <span class="text-xs text-gray-500">
                        Total: {{ $courses->total() }}
                    </span>
                </div>

                {{-- TABLE --}}
                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-100">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Title
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Instructor
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Status
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Students
                                </th>

                                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse($courses as $course)
                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $course->title }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $course->instructor->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <x-badge :status="$course->status"/>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <span class="bg-indigo-50 text-indigo-600 px-2 py-1 rounded-full text-xs">
                                            {{ $course->enrolments->count() }} students
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-right space-x-3">

                                        <a href="{{ route('admin.courses.show', $course) }}"
                                           class="text-sm text-indigo-600 hover:text-indigo-800 transition">
                                            View
                                        </a>

                                        <a href="{{ route('admin.courses.edit', $course) }}"
                                           class="text-sm text-yellow-600 hover:text-yellow-700 transition">
                                            Edit
                                        </a>

                                        <form method="POST"
                                              action="{{ route('admin.courses.destroy', $course) }}"
                                              class="inline"
                                              onsubmit="return confirm('Delete this course?')">

                                            @csrf
                                            @method('DELETE')

                                            <button class="text-sm text-red-600 hover:text-red-700 transition">
                                                Delete
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                        No courses found. Create your first course!
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>

                </div>

            </div>

            {{-- PAGINATION --}}
            <div class="mt-6">
                {{ $courses->links() }}
            </div>

        </div>
    </div>

</x-app-layout>