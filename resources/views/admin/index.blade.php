@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin dashboard.</p>
    <a href="{{ route('admin.positions.index') }}" class="btn btn-primary">Manage Positions</a>
    <a href="{{ route('admin.candidates.index') }}" class="btn btn-primary">Manage Candidates</a>
</div>
@endsection
