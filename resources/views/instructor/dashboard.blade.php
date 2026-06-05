{{-- resources/views/instructor/dashboard.blade.php --}}
<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                Instructor Dashboard
            </h2>

            <span class="text-xs text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                Overview
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto px-4">

            {{-- STATS --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                    <p class="text-sm text-gray-500">My Courses</p>
                    <h3 class="text-2xl font-bold text-indigo-600 mt-1">
                        {{ $stats['total_courses'] }}
                    </h3>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                    <p class="text-sm text-gray-500">Published</p>
                    <h3 class="text-2xl font-bold text-green-600 mt-1">
                        {{ $stats['published'] }}
                    </h3>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                    <p class="text-sm text-gray-500">Total Students</p>
                    <h3 class="text-2xl font-bold text-yellow-500 mt-1">
                        {{ $stats['total_students'] }}
                    </h3>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                    <p class="text-sm text-gray-500">Pending Approvals</p>
                    <h3 class="text-2xl font-bold text-red-500 mt-1">
                        {{ $stats['pending_approvals'] }}
                    </h3>
                </div>

            </div>

            {{-- MAIN GRID --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- MY COURSES --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                    <div class="px-6 py-4 bg-gray-50 border-b flex justify-between items-center">
                        <h3 class="font-semibold text-gray-700">
                            My Courses
                        </h3>

                        <a href="{{ route('instructor.courses.create') }}"
                           class="text-sm text-indigo-600 hover:text-indigo-800 transition">
                            + New Course
                        </a>
                    </div>

                    <ul class="divide-y divide-gray-100">

                        @forelse($courses as $course)
                            <li class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition">

                                <div>
                                    <a href="{{ route('instructor.courses.show', $course) }}"
                                       class="text-sm font-semibold text-gray-900 hover:text-indigo-600 transition">
                                        {{ $course->title }}
                                    </a>

                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $course->enrolments_count }} students
                                    </p>
                                </div>

                                <x-badge :status="$course->status"/>

                            </li>
                        @empty

                            <li class="px-6 py-6 text-center text-gray-500 text-sm">
                                No courses yet. Create your first course!
                            </li>

                        @endforelse

                    </ul>

                </div>

                {{-- PENDING ENROLMENTS --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                    <div class="px-6 py-4 bg-gray-50 border-b">
                        <h3 class="font-semibold text-gray-700">
                            Pending Approvals
                        </h3>
                    </div>

                    <ul class="divide-y divide-gray-100">

                        @forelse($pendingEnrolments as $enrolment)
                            <li class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition">

                                <div>
                                    <p class="text-sm font-semibold text-gray-900">
                                        {{ $enrolment->student->name }}
                                    </p>

                                    <p class="text-xs text-gray-500">
                                        {{ $enrolment->course->title }}
                                    </p>
                                </div>

                                <form method="POST"
                                      action="{{ route('instructor.enrolments.update', $enrolment) }}">

                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="status" value="active">

                                    <button class="px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-xs rounded-full transition">
                                        Approve
                                    </button>

                                </form>

                            </li>

                        @empty

                            <li class="px-6 py-6 text-center text-gray-500 text-sm">
                                No pending approvals
                            </li>

                        @endforelse

                    </ul>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>