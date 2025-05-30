<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class = "mb-6">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">{{ session('success')}}</strong>
                            <span class="block sm:inline">Employee has been added successfully</span>
                        </div>
                    @elseif(session('success_delete'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">{{ session('success_delete')}}</strong>
                            <span class="block sm:inline">Employee has been deleted successfully</span>
                        </div>
                    @elseif(session('success_edit'))
                    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">{{ session('success_edit')}}</strong>
                            <span class="block sm:inline">Employee data has been updated</span>
                        </div>
                    @endif
                    <h3 class = "text-lg font-medium mb-4">Add New Employee</h3>
                    <form method = "post" action="{{ route('employee.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="last_name" class = "block text-gray-700">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="first_name" class = "block text-gray-700">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>  <div>
                                <label for="middle_name" class = "block text-gray-700">Middle Name</label>
                                <input type="text" id="middle_name" name="middle_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="email" class = "block text-gray-700">Email</label>
                                <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="job_title" class = "block text-gray-700">Job Title</label>
                                <input type="text" id="job_title" name="job_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Employee
                            </button>
                            <a href="{{route('feedback')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Message Admin
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Student List -->
                <div class="mt-8">
                    <h3 class="text-lg font-medium mb-4">Student List</h3>
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="py-2 border-b">#</th>
                                <th class="py-2 border-b">Last Name</th>
                                <th class="py-2 border-b">First Name</th>
                                <th class="py-2 border-b">Middle Name</th>
                                <th class="py-2 border-b">Email</th>
                                <th class="py-2 border-b">Job Title</th>
                                <th class="py-2 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $key => $emp)
                                <tr>
                                    <td class="py-2 border-b px-4">{{ $key + 1 }}</td> 
                                    <td class="py-2 border-b px-4">{{ $emp->last_name }}</td>
                                    <td class="py-2 border-b px-4">{{ $emp->first_name }}</td>
                                    <td class="py-2 border-b px-4">{{ $emp->middle_name }}</td>
                                    <td class="py-2 border-b px-4">{{ $emp->email }}</td>
                                    <td class="py-2 border-b px-4">{{ $emp->job_title }}</td>
                                    <td class="py-2 border-b px-4">
                                        <a href="{{ route('employee.edit', $emp->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        <form method="POST" action="{{ route('employee.destroy', $emp->id) }}" style = "display:inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type= "submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </td>   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>