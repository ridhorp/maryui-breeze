@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($user) ? 'Edit User' : 'Add New User' }}</h1>

    <form action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" method="POST">
        @csrf
        @if(isset($user))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name"
                value="{{ isset($user) ? $user->name : old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="{{ isset($user) ? $user->email : old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" {{ isset($user) ? '' : 'required'
                }}>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" {{
                isset($user) ? '' : 'required' }}>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update User' : 'Add User' }}</button>
    </form>
</div>
@endsection