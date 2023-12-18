@extends('layouts.app')
@section('title', 'บันทึกตัวชี้วัด KPI')

@section('importcss')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

@section('importjs')
    @parent
    <script type="module">
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success'
            });
        @endif
    </script>
@stop

@section('sidemenu')
    @include('layouts.sidemenu')
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('บันทึกตัวชี้วัด KPI') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ URL::previous() }}" class="btn btn-primary mb-2"><i class="bi bi-back"></i><span class="ms-2">{{ __('Back') }}</span></a>
            </div>
        </div>

        @php
            foreach ($_GET as $key => $val) {
                ${$key} = $val;
            }
        @endphp

        <div class="row justify-content-center">
            <div class="card bg-white">
                <div class="card-body">
                    <form method="POST" action="{{ route('indicators.store') }}">
                        @csrf
                        {!! Form::hidden('user_id', Auth::user()->id) !!}
                        <div class="mb-3 row ">
                            <label for="goals"
                                class="col-sm-2 col-form-label text-end text-nowrap">{{ __('เป้าหมาย :') }}</label>
                            <div class="col-sm-auto">
                                {!! Form::select('goa_id', $goals, $id, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Please Select ...',
                                    'disabled',
                                ]) !!}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="indicator" class="col-sm-2 col-form-label text-end text-nowrap">
                                {{ __('ตัวชี้วัด :') }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="indicator" class="form-control" autofocus required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-sm-2 col-form-label text-end text-nowrap">
                                {{ __('น้ำหนัก :') }}
                            </label>
                            <div class="col-sm-auto">
                                <input type="text" name="weight" class="form-control" autofocus required />
                            </div>
                            <label for="weight" class="col-sm-auto col-form-label text-start">
                                {{ __('%') }}
                            </label>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-floppy2-fill fs-sm"></i>
                                    <span class="ms-2">{{ __('บันทึก') }}</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('footer')

    @include('footer')

@endsection
