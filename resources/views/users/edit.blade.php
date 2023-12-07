@extends('layouts.app')
@section('title', 'Edit User')

@section('importcss')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

@section('content')

    @include('inc.function')

    <div class="container">
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

                            <div class="row mb-3">
                                <label for="fullname" class="col-sm-3 col-form-label">{{ __('ชื่อ สกุล :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fullname" value="{{ $user->fullname }}"
                                        disabled />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="position"
                                    class="col-sm-3 col-form-label">{{ __('ตำแหน่งงานปัจจุบัน :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="position"
                                        value="{{ $user->position }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="department" class="col-sm-3 col-form-label">{{ __('หน่วยงาน :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="department"
                                        value="{{ getDepartment($user->department) }}" disabled />
                                </div>
                            </div>

                            <div class="row my-3">
                                <label for="units" class="col-sm-3 col-form-label">{{ __('แผนก :') }}</label>
                                <div class="col-auto">
                                    {!! Form::select('unit_id', $units, old('name', $user->unit_id), [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!}
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
