@extends('layouts.app')
@section('title', 'Create New Unit')

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
                        <li class="breadcrumb-item"><a href="{{ url('units') }}">Units</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Unit</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ url('units') }}" class="btn btn-primary mb-2"><i class="bi bi-back"></i> Back</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Unit') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('units.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">ชื่อแผนก :</label>
                                <input type="text" name="unit_name" id="unit_name" class="form-control my-3" required>
                            </div>

                            <div class="row my-3">
                                <label for="departments" class="col-form-label">หน่วยงาน :</label>
                                <div class="col-auto">
                                    {!! Form::select('dep_id', $departments, null, [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="row my-3">
                                <label for="users" class="col-form-label">ชื่อหัวหน้าแผนก :</label>
                                <div class="col-auto">
                                    {!! Form::select('username', $users, null, [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!}
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Unit</button>
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
