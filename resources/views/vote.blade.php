@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Vote for Candidates</h1>

        @foreach ($positions as $position)
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">{{ $position->name }}</h2>
                <form action="{{ route('vote.store') }}" method="POST" class="space-y-2">
                    @csrf
                    @foreach ($position->candidates as $candidate)
                        <div class="form-check flex items-center space-x-2">
                            <input
                                class="form-check-input text-blue-600 dark:text-blue-400 focus:ring-blue-500 dark:focus:ring-blue-400"
                                type="radio" name="candidate_id" id="candidate{{ $candidate->id }}"
                                value="{{ $candidate->id }}" required>
                            <label class="form-check-label" for="candidate{{ $candidate->id }}">
                                {{ $candidate->name }}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit"
                        class="btn btn-primary mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">Vote</button>
                </form>
            </div>
        @endforeach

        @if (session('success'))
            <div class="alert alert-success mt-3 bg-green-500 text-white p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
