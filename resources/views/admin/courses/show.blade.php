{{-- resources/views/admin/courses/show.blade.php --}}
<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $course->title }}
            </h2>

            <a href="{{ route('admin.courses.edit', $course) }}"
               class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded-xl shadow-sm transition">
                Edit Course
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-5xl mx-auto px-4 space-y-6">

            {{-- COURSE INFO CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 px-6 py-5">
                    <h3 class="text-white font-semibold text-lg">
                        Course Overview
                    </h3>
                    <p class="text-indigo-100 text-sm">
                        Detailed information about this course
                    </p>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="col-span-2">
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Course Title</p>
                        <p class="text-lg font-semibold text-gray-800 mt-1">
                            {{ $course->title }}
                        </p>
                    </div>

                    <div class="col-span-2">
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Description</p>
                        <p class="text-gray-600 mt-1 leading-relaxed">
                            {{ $course->description ?? 'No description provided.' }}
                        </p>
                    </div>

                    <div class="space-y-1">
                        <p class="text-xs text-gray-500 uppercase">Status</p>
                        <x-badge :status="$course->status ?? 'draft'"/>
                    </div>

                    <div class="space-y-1">
                        <p class="text-xs text-gray-500 uppercase">Created</p>
                        <p class="font-medium text-gray-700">
                            {{ $course->created_at?->format('d M Y') }}
                        </p>
                    </div>

                </div>
            </div>

            {{-- ENROLMENTS CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="px-6 py-4 bg-gray-50 border-b flex items-center justify-between">
                    <h3 class="font-semibold text-gray-700">
                        🎓 Enrolled Students
                    </h3>

                    <span class="text-xs text-gray-500">
                        {{ $course->enrolments->count() }} students
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Student
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Enrolled At
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse($course->enrolments as $enrolment)
                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                        {{ $enrolment->student->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="inline-flex">
                                            <x-badge :status="$enrolment->status"/>
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $enrolment->enrolled_at?->format('d M Y') ?? '—' }}
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-6 text-center text-sm text-gray-500">
                                        No students enrolled yet.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>