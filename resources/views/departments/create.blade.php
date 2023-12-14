@extends('layouts.app')
@section('title', 'Create New Department')

@section('importcss')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

@section('sidemenu')
    @include('layouts.sidemenu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('departments') }}">{{ __('Departments') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Create Department') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ url('departments') }}" class="btn btn-primary mb-2">
                    <i class="bi bi-back"></i><span class="ms-2">{{ __('Back') }}</span>
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-white">
                    <div class="card-header">{{ __('Create Department') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('departments.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="cost_center" class="col-sm-3 col-form-label">{{ __('Cost Center :') }}</label>
                                <div class="col-sm-auto">
                                    <input type="text" name="cost_center" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="dep_name" class="col-sm-3 col-form-label">{{ __('Department Name :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="dep_name" class="form-control" required />
                                    {{-- @error('dep_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="mb-3 row ">
                                <label for="division" class="col-sm-3 col-form-label">{{ __('รายชื่อฝ่าย :') }}</label>
                                <div class="col-sm-auto">
                                    {!! Form::select('div_id', $divisions, null, [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="bi bi-floppy2-fill fs-sm"></i><span class="ms-2">{{ __(' Create Department') }}</span></button>
                                </div>
                            </div>
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
