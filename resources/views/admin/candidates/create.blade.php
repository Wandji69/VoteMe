@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <div class="container mx-auto p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Create Candidate</h1>
            <form action="{{ route('admin.candidates.store') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                    <input type="text"
                        class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        id="name" name="name" required>
                </div>
                <div class="form-group mb-4">
                    <label for="position_id"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Position</label>
                    <select
                        class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        id="position_id" name="position_id" required>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="btn btn-primary w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">Create</button>
            </form>
        </div>
    </div>
@endsection
