@extends('layouts.app')
@section('title', 'Edit Goal')

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
            <div class="col-md-7">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Goal') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ URL::previous() }}" class="btn btn-primary mb-2"><i class="bi bi-back"></i><span class="ms-2">{{ __('Back') }}</span></a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-white">
                    <div class="card-body">
                        <form method="POST" action="{{ route('goals.update', $goal->goa_id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-3">
                                <label for="goal" class="col-sm-3 col-form-label text-nowrap">{{ __('บันทึกหน้าที่หลัก / กิจกรรมหลัก :') }}</label>
                                <div class="col-sm-9">
                                    <textarea rows="4" cols="50" name="goal" class="form-control">{{ old('name', $goal->goal) }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-success"><i class="bi bi-arrow-up-circle fs-sm"></i><span class="ms-2">{{ __('Update') }}</span></button>
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
