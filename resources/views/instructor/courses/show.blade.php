<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $course->title }}
            </h2>

            <span class="text-xs text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                Course Overview
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-5xl mx-auto px-4 space-y-6">

            {{-- COURSE INFO CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 px-6 py-5">
                    <h3 class="text-white font-semibold text-lg">
                        Course Details
                    </h3>
                    <p class="text-indigo-100 text-sm">
                        Overview of this course
                    </p>
                </div>

                <div class="p-6">

                    <p class="text-gray-600 leading-relaxed">
                        {{ $course->description ?? 'No description provided.' }}
                    </p>

                    <div class="mt-5">
                        @php
                            $statusColor = $course->status === 'published'
                                ? 'bg-green-100 text-green-700'
                                : 'bg-yellow-100 text-yellow-700';
                        @endphp

                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $statusColor }}">
                            {{ ucfirst($course->status) }}
                        </span>
                    </div>

                </div>
            </div>

            {{-- ENROLMENTS CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="px-6 py-4 bg-gray-50 border-b flex justify-between items-center">

                    <h3 class="font-semibold text-gray-700">
                        Enrolled Students
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
                                    Enrolled
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse($course->enrolments as $enrolment)

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">
                                            {{ $enrolment->student->name }}
                                        </div>

                                        <div class="text-xs text-gray-500">
                                            {{ $enrolment->student->email }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-sm">
                                        <span class="inline-flex px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700">
                                            {{ ucfirst($enrolment->status) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $enrolment->enrolled_at?->format('d M Y') ?? '—' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                        No students enrolled yet
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