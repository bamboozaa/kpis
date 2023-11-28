@extends('layouts.app')
@section('title', 'Edit User')

@section('importcss')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

@section('content')

    @php

        function getDepartment($department)
        {
            $dep_full_name = trim($department);
            $left_pos = strripos($dep_full_name, '(') + 1;
            $dep_full_name = substr($dep_full_name, $left_pos, strlen($dep_full_name));
            $dep_full_name = substr($dep_full_name, 0, strlen($dep_full_name) - 1);
            $dep_full_name = trim($dep_full_name);
            return $dep_full_name;
        }

        function getOwnerUnitName($id)
        {
            $owner_name = App\Models\Unit::findOrFail($id);
            return $owner_name;
        }
    @endphp

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('users') }}">Users</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('users.show', Auth::user()->id) }}">Profile</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Edit User Profile</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">{{ __('Edit User Profile') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="fullname" class="form-label">ชื่อ สกุล :</label>
                                <input type="text" class="form-control" id="fullname" name="fullname"
                                    value="{{ $user->fullname }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">ตำแหน่งงานปัจจุบัน :</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="{{ $user->position }}">
                            </div>

                            <div class="mb-3">
                                <label for="department" class="form-label">หน่วยงาน :</label>
                                <input type="text" class="form-control" id="department" name="department"
                                    value="{{ getDepartment($user->department) }}" disabled>
                            </div>

                            <div class="row my-3">
                                <label for="units" class="col-form-label">แผนก :</label>
                                <div class="col-auto">
                                    {!! Form::select('unit_id', $units, old('name', $user->unit_id), [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!}
                                </div>
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

@section('footer')

    @include('footer')

@endsection
