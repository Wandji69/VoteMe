@extends('layouts.app')

@section('content')
    <div class="container mx-auto bg-gray text-white h-50">
        <h1 class="text-center text-2xl font-bold mb-4">Create Position</h1>

        <form action="{{ route('admin.positions.store') }}" method="POST" class="w-full max-w-md mx-auto">
            @csrf
            <div class="form-group mb-4">
                <label for="name" class="block text-white font-bold mb-2">Name</label>
                <input type="text"
                    class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-700 bg-gray-700 text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    id="name" name="name" required>
            </div>
            <div class="flex justify-center mb-4 mt-4 p-50"> <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
