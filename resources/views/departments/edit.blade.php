@extends('layouts.app')
@section('title', 'Edit Department')

@section('importcss')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

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
                <div class="card">
                    <div class="card-header">{{ __('Edit Department') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('departments.update', $department->dep_id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="dep_id">Department ID:</label>
                                <input type="text" name="dep_id" id="dep_id" class="form-control my-3"
                                    value="{{ old('name', $department->dep_id) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Department Name:</label>
                                <input type="text" name="dep_name" id="dep_name" class="form-control my-3"
                                    value="{{ old('name', $department->dep_name) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Cost Center:</label>
                                <input type="text" name="cost_center" id="cost_center" class="form-control my-3"
                                    value="{{ old('name', $department->cost_center) }}" />
                            </div>
                            <button type="submit" class="btn btn-success">Update Department</button>
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
