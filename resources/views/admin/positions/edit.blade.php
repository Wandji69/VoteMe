@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Position</h1>
    <form action="{{ route('admin.positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $position->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
