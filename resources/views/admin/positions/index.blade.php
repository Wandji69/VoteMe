@extends('layouts.app')

@section('content')
    <div class="container dark:text-gray-100 text-white mx-auto">
        <h1 class="text-center text-3xl font-bold mb-4">Positions</h1>
        <a href="{{ route('admin.positions.create') }}" class="btn btn-primary mb-6 ml-3 px-5 text-left">Add New Position</a>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="table w-full min-w-full leading-normal text-white">
                <thead>
                    <tr>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-700 bg-gray-700 text-sm">
                                {{ $position->name }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-700 bg-gray-700 text-sm">
                                <a href="{{ route('admin.positions.edit', $position->id) }}"
                                    class="inline-block px-2 py-1 text-xs font-bold leading-tight uppercase rounded-lg text-gray-100 bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-0 focus:ring-offset-2 focus:ring-yellow-800">Edit</a>
                                <form action="{{ route('admin.positions.destroy', $position->id) }}" method="POST"
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
