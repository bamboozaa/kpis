@extends('layouts.app')

@section('content')
    @include('inc.function')
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

                            <div class="mb-3">
                                <label for="fullname" class="form-label">ชื่อ สกุล :</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $user->fullname }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">ตำแหน่งงานปัจจุบัน :</label>
                                <input type="text" class="form-control" id="position" name="position" value="{{ $user->position }}">
                            </div>

                            <div class="mb-3">
                                <label for="department" class="form-label">หน่วยงาน :</label>
                                <input type="text" class="form-control" id="department" name="department" value="{{ getDepartment($user->department) }}" disabled>
                            </div>

                            {{-- <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" required> --}}

                            <!-- Add other form fields as needed -->

                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
