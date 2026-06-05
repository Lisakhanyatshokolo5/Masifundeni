{{-- resources/views/admin/students/show.blade.php --}}
<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $student->name }}
            </h2>

            <a href="{{ route('admin.students.edit', $student) }}"
               class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded-xl shadow-sm transition">
                Edit Student
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-5xl mx-auto px-4 space-y-6">

            {{-- PROFILE CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 px-6 py-5">
                    <h3 class="text-white font-semibold text-lg">
                        Student Profile
                    </h3>
                    <p class="text-indigo-100 text-sm">
                        Personal and academic information
                    </p>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Student Number</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $student->studentProfile?->student_number ?? '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Email</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $student->email }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Phone</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $student->studentProfile?->phone ?? '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Date of Birth</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $student->studentProfile?->date_of_birth?->format('d M Y') ?? '—' }}
                        </p>
                    </div>

                    <div class="col-span-2">
                        <p class="text-xs text-gray-500 uppercase">Address</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $student->studentProfile?->address ?? '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Status</p>
                        <div class="mt-1">
                            <x-badge :status="$student->studentProfile?->status ?? 'active'"/>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Joined</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $student->created_at->format('d M Y') }}
                        </p>
                    </div>

                </div>
            </div>

            {{-- ENROLMENTS CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="px-6 py-4 bg-gray-50 border-b flex justify-between items-center">
                    <h3 class="font-semibold text-gray-700">
                        Enrolled Courses
                    </h3>

                    <span class="text-xs text-gray-500">
                        {{ $student->enrolments->count() }} total
                    </span>
                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-100">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Course
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

                            @forelse($student->enrolments as $enrolment)
                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $enrolment->course->title }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <x-badge :status="$enrolment->status"/>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $enrolment->enrolled_at?->format('d M Y') ?? '—' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                        Not enrolled in any courses yet.
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