<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold">Students</h2>
            <a href="{{ route('admin.students.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">
                Add student
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto px-4">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Joined</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($students as $student)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $student->name }}</div>
                            <div class="text-sm text-gray-500">{{ $student->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $student->studentProfile?->student_number ?? '—' }}
                        </td>
                        <td class="px-6 py-4">
                            @php $status = $student->studentProfile?->status ?? 'active' @endphp
                            <span class="px-2 py-1 text-xs rounded-full
                                {{ $status === 'active'     ? 'bg-green-100 text-green-800' : '' }}
                                {{ $status === 'suspended'  ? 'bg-red-100 text-red-800'    : '' }}
                                {{ $status === 'graduated'  ? 'bg-blue-100 text-blue-800'  : '' }}">
                                {{ ucfirst($status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $student->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.students.show', $student) }}"
                               class="text-sm text-indigo-600 hover:underline">View</a>
                            <a href="{{ route('admin.students.edit', $student) }}"
                               class="text-sm text-yellow-600 hover:underline">Edit</a>
                            <form method="POST"
                                  action="{{ route('admin.students.destroy', $student) }}"
                                  class="inline"
                                  onsubmit="return confirm('Delete this student?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</x-app-layout>