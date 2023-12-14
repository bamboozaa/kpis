@extends('layouts.app')
@section('title', 'Create New Division')

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
                        <li class="breadcrumb-item"><a href="{{ url('divisions') }}">Divisions</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Division</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ url('divisions') }}" class="btn btn-primary mb-2"><i class="bi bi-back"></i> Back</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Division') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('divisions.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Cost Center:</label>
                                <input type="text" name="cost_center" id="cost_center" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="name">ชื่อฝ่าย :</label>
                                <input type="text" name="div_name" id="div_name" class="form-control" required />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i>{{ __(' บันทึก') }}</button>
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
