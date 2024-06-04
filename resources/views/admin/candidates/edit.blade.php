@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Candidate</h1>
    <form action="{{ route('admin.candidates.update', $candidate->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $candidate->name }}" required>
        </div>
        <div class="form-group">
            <label for="position_id">Position</label>
            <select class="form-control" id="position_id" name="position_id" required>
                @foreach($positions as $position)
                    <option value="{{ $position->id }}" {{ $candidate->position_id == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
