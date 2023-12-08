@extends('layouts.app')
@section('title', 'Show User')

@section('importcss')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

@section('importjs')
    @parent
    <script type="module">
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success'
            });
        @endif
    </script>
@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('users') }}">{{ __('Users') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('User Profile') }}</li>
                    </ol>
                </nav>
                <div class="card bg-white">
                    <div class="card-header">{{ __('User Profile') }}</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="fullname" class="col-sm-3 col-form-label">{{ __('ชื่อ สกุล :') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $user->fullname }}" readonly />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="position" class="col-sm-3 col-form-label">{{ __('ตำแหน่งงานปัจจุบัน :') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $user->position }}" readonly />
                            </div>

                        </div>
                        <div class="row mb-3">
                            @php
                                $department = trim($user->department);
                                $left_pos = strripos($department, '(') + 1;
                                $department = substr($department, $left_pos, strlen($department));
                                $department = substr($department, 0, strlen($department) - 1);
                                $department = trim($department);
                                // $departments = App\Models\Department::where('dep_name', $department)->get();
                                // $faculty = App\Models\Faculty::where('dep_id', '=', $departments[0]['dep_id'])->get();
                            @endphp
                            <label for="department" class="col-sm-3 col-form-label">{{ __('หน่วยงาน :') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $department }}" readonly />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="faculty" class="col-sm-3 col-form-label">{{ __('แผนก :') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ isset($user->user_faculty->user_id) ? $user->user_fac->fac_name : '' }}" readonly />
                            </div>
                        </div>

                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        {{-- <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
