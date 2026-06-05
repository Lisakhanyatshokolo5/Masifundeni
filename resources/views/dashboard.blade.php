<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800">
                Student Management System
            </h2>

            <span class="text-sm text-gray-500">
                Welcome, {{ Auth::user()->name }}
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">Students</h3>
                    <p class="text-4xl font-bold text-blue-600">245</p>
                </div>

                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">Courses</h3>
                    <p class="text-4xl font-bold text-green-600">18</p>
                </div>

                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">Lecturers</h3>
                    <p class="text-4xl font-bold text-purple-600">32</p>
                </div>

                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">Enrollments</h3>
                    <p class="text-4xl font-bold text-red-600">578</p>
                </div>

            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow p-6 mb-8">
                <h3 class="text-lg font-semibold mb-4">
                    Quick Actions
                </h3>

                <div class="flex flex-wrap gap-3">

                    <a href="#"
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Add Student
                    </a>

                    <a href="#"
                       class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        Add Course
                    </a>

                    <a href="#"
                       class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">
                        Add Lecturer
                    </a>

                </div>
            </div>

            <!-- Recent Students -->
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <div class="px-6 py-4 border-b">
                    <h3 class="text-lg font-semibold">
                        Recent Students
                    </h3>
                </div>

                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left p-4">Student No</th>
                            <th class="text-left p-4">Name</th>
                            <th class="text-left p-4">Email</th>
                            <th class="text-left p-4">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="border-t">
                            <td class="p-4">220012345</td>
                            <td class="p-4">John Doe</td>
                            <td class="p-4">john@email.com</td>
                            <td class="p-4">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Active
                                </span>
                            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="p-4">220056789</td>
                            <td class="p-4">Jane Smith</td>
                            <td class="p-4">jane@email.com</td>
                            <td class="p-4">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Active
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</x-app-layout>
