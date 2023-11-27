@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit User Profile') }}</div>

                    <div class="card-body">
                        <h1>Edit User</h1>

                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" required>

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" required>

                            <!-- Add other form fields as needed -->

                            <button type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
