@extends('layouts.app')
@section('title', 'Edit Faculty')

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
                        <li class="breadcrumb-item"><a href="{{ url('faculties') }}">{{ __('Faculties') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Faculty') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ url('faculties') }}" class="btn btn-primary mb-2"><i class="bi bi-back"></i>{{ __(' Back') }}</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Faculty') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('faculties.update', $faculty->fac_id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="row mt-3">
                                <label for="fac_name" class="col-sm-2 col-form-label">{{ __('ชื่อแผนก :') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fac_name" class="form-control"
                                    value="{{ old('name', $faculty->fac_name) }}" />
                                </div>
                            </div>

                            <div class="row my-3">
                                <label for="departments" class="col-sm-2 col-form-label">{{ __('หน่วยงาน :') }}</label>
                                <div class="col-auto">
                                    {!! Form::select('dep_id', $departments, old('name', $faculty->dep_id), [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!}
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">{{ __(' Update') }}</button>
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
