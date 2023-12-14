@extends('layouts.app')
@section('title', 'Edit Department')

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
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('departments') }}">Departments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Department</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ url('departments') }}" class="btn btn-primary mb-2"><i class="bi bi-back"></i> Back</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-white">
                    <div class="card-header">{{ __('Edit Department') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('departments.update', $department->dep_id) }}">
                            @csrf
                            @method('PATCH')
                            {{-- <div class="row mb-3">
                                <label for="dep_id" class="col-sm-3 col-form-label">{{ __('Department ID :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="dep_id" class="form-control"
                                    value="{{ old('name', $department->dep_id) }}">
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="dep_name" class="col-sm-3 col-form-label">{{ __('Department Name :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="dep_name" class="form-control" value="{{ old('name', $department->dep_name) }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cost_center" class="col-sm-3 col-form-label">{{ __('Cost Center :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="cost_center" class="form-control" value="{{ old('name', $department->cost_center) }}" />
                                </div>
                            </div>

                            <div class="mb-3 row ">
                                <label for="division" class="col-sm-3 col-form-label">{{ __('รายชื่อฝ่าย :') }}</label>
                                <div class="col-auto">
                                    {!! Form::select('div_id', $divisions, is_null(old('name', $department->div_id)) ? NULL : old('name', $department->div_id), [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-center">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-success"><i class="bi bi-arrow-up-circle fs-sm"></i>{{ __(' Update Department') }}</button>
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
