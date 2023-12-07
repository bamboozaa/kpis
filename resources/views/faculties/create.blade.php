@extends('layouts.app')
@section('title', 'Create New Faculty')

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
                        <li class="breadcrumb-item"><a href="{{ url('faculties') }}">Faculties</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Faculty</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ url('faculties') }}" class="btn btn-primary mb-2"><i class="bi bi-back"></i> Back</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-white">
                    <div class="card-header">{{ __('Create Faculty') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('faculties.store') }}">
                            @csrf

                            <div class="mb-3 row">
                                <label for="fac_name" class="col-sm-2 col-form-label">{{ __('ชื่อแผนก :') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fac_name" name="fac_name">
                                </div>
                            </div>

                            <div class="mb-3 row ">
                                <label for="departments" class="col-sm-2 col-form-label">{{ __('รายชื่อหน่วยงาน :') }}</label>
                                <div class="col-auto">
                                    {!! Form::select('dep_id', $departments, null, [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!}
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">บันทึก</button>
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
