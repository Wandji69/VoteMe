@extends('layouts.app')

@section('content')
    <div class="container mx-auto dark:text-gray-100">
        <h1 class="text-center text-3xl font-bold mb-4">Candidates</h1>
        <a href="{{ route('admin.candidates.create') }}" class="btn btn-primary mb-3">Add New Candidate</a>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="table w-full min-w-full leading-normal">
                <thead>
                    <tr>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                            Position
                        </th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidates as $candidate)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $candidate->name }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $candidate->position->name }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('admin.candidates.edit', $candidate->id) }}"
                                    class="inline-block px-2 py-1 text-xs font-bold leading-tight uppercase rounded-lg text-black bg-yellow-100 hover:bg-yellow-200 focus:outline-none focus:ring-0 focus:ring-offset-2 focus:ring-yellow-500">Edit</a>
                                <form action="{{ route('admin.candidates.destroy', $candidate->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block px-2 py-1 text-xs font-bold leading-tight uppercase rounded-lg text-red-500 hover:bg-red-600 focus:outline-none focus:ring-0 focus:ring-offset-2 focus:ring-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
