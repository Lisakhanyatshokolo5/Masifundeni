<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
             Create Course
            </h2>

            <span class="text-xs text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                Instructor Panel
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-2xl mx-auto px-4">

            {{-- CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                {{-- HEADER --}}
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 px-6 py-5">
                    <h3 class="text-white font-semibold text-lg">
                        New Course
                    </h3>
                    <p class="text-indigo-100 text-sm">
                        Fill in the details to publish a new course
                    </p>
                </div>

                {{-- FORM --}}
                <form method="POST"
                      action="{{ route('instructor.courses.store') }}"
                      class="p-6 space-y-6">

                    @csrf

                    @include('instructor.courses._form')

                    {{-- ACTIONS --}}
                    <div class="flex items-center justify-between pt-4">

                        <a href="{{ route('instructor.courses.index') }}"
                           class="text-sm text-gray-500 hover:text-gray-700 transition">
                            Cancel
                        </a>

                        <button type="submit"
                                class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-xl shadow-sm transition">
                            Create Course
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>