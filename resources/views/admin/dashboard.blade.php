{{-- resources/views/admin/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">
             Admin Dashboard
            </h2>
            <span class="text-xs text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                Overview
            </span>
        </div>
    </x-slot>

    <div class="py-6">

        {{-- STAT CARDS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-5 border border-gray-100">
                <p class="text-sm text-gray-500">Total Students</p>
                <h3 class="text-2xl font-bold text-indigo-600 mt-1">
                    {{ $stats['total_students'] }}
                </h3>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-5 border border-gray-100">
                <p class="text-sm text-gray-500">Total Instructors</p>
                <h3 class="text-2xl font-bold text-green-600 mt-1">
                    {{ $stats['total_instructors'] }}
                </h3>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-5 border border-gray-100">
                <p class="text-sm text-gray-500">Total Courses</p>
                <h3 class="text-2xl font-bold text-yellow-500 mt-1">
                    {{ $stats['total_courses'] }}
                </h3>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-5 border border-gray-100">
                <p class="text-sm text-gray-500">Total Enrolments</p>
                <h3 class="text-2xl font-bold text-red-500 mt-1">
                    {{ $stats['total_enrolments'] }}
                </h3>
            </div>

        </div>

        {{-- MAIN GRID --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- RECENT STUDENTS --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-700">👩‍🎓 Recent Students</h3>

                    <a href="{{ route('admin.students.index') }}"
                       class="text-sm text-indigo-600 hover:text-indigo-800 transition">
                        View all →
                    </a>
                </div>

                <ul class="divide-y divide-gray-100">
                    @foreach($recentStudents as $student)
                        <li class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <div>
                                <p class="text-sm font-semibold text-gray-900">
                                    {{ $student->name }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $student->email }}
                                </p>
                            </div>

                            @if($student->studentProfile)
                                <span class="text-xs px-3 py-1 rounded-full bg-indigo-50 text-indigo-600">
                                    {{ $student->studentProfile->status }}
                                </span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- RECENT COURSES --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-700">📚 Recent Courses</h3>

                    <a href="{{ route('admin.courses.index') }}"
                       class="text-sm text-indigo-600 hover:text-indigo-800 transition">
                        View all →
                    </a>
                </div>

                <ul class="divide-y divide-gray-100">
                    @foreach($recentCourses as $course)
                        <li class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <div>
                                <p class="text-sm font-semibold text-gray-900">
                                    {{ $course->title }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $course->instructor->name }}
                                </p>
                            </div>

                            <span class="text-xs px-3 py-1 rounded-full bg-green-50 text-green-600">
                                {{ $course->status }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>