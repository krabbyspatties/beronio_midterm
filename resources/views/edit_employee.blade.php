<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Edit employee')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Edit Employee</h3>
                <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="last_name" class="block text-gray-700">Last name</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="first_name" class="block text-gray-700">First name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="middle_name" class="block text-gray-700">Middle name</label>
                        <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name', $employee->middle_name) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="text" id="email" name="email" value="{{ old('email', $employee->email) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="job_title" class="block text-gray-700">Job Title</label>
                        <input type="text" id="job_title" name="job_title" value="{{ old('job_title', $employee->job_title) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Employee
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>