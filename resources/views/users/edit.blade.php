@extends('layouts.app')
@section('title', 'Edit User')

@section('importcss')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

@section('sidemenu')
    @include('layouts.sidemenu')
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('users') }}">{{ __('Users') }}</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('users.show', Auth::user()->id) }}">Profile</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit User Profile') }}</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">{{ __('Edit User Profile') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            {!! Form::hidden('user_id', old('name', $user->id)) !!}

                            <div class="row mb-3">
                                <label for="fullname" class="col-sm-3 col-form-label">{{ __('ชื่อ สกุล :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fullname" value="{{ old('name', $user->fullname) }}"
                                        disabled />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="position"
                                    class="col-sm-3 col-form-label">{{ __('ตำแหน่งงานปัจจุบัน :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="position"
                                        value="{{ old('name', $user->position) }}">
                                </div>
                            </div>

                            @php
                                $department = trim(old('name', $user->department));
                                $left_pos = strripos($department, '(') + 1;
                                $department = substr($department, $left_pos, strlen($department));
                                $department = substr($department, 0, strlen($department) - 1);
                                $department = trim($department);
                                $dep_id = App\Models\Department::where('dep_name', $department)->get();
                                // $faculty = App\Models\Faculty::where('dep_id', '=', $departments[0]['dep_id'])->get();
                                $dep_id = $dep_id[0]['dep_id'];
                            @endphp

                            <div class="row mb-3">
                                <label for="department" class="col-sm-3 col-form-label">{{ __('หน่วยงาน :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="department" value="{{ $department }}" disabled />
                                    {!! Form::hidden('dep_id', old('name', $dep_id)) !!}
                                </div>
                            </div>
                            <div class="row my-3">
                                <label for="faculties" class="col-sm-3 col-form-label">{{ __('แผนก :') }}</label>
                                <div class="col-auto">
                                    {!! Form::select('fac_id', $faculties, isset($user->user_faculty->user_id) ? $user->user_faculty->faculty->fac_id : NULL, [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!}
                                    {{-- {!! Form::select('fac_id', $faculties, isset($faculty[0]['fac_id']) ? $faculty[0]['fac_id'] : NULL, [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!} --}}
                                </div>
                            </div>

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
