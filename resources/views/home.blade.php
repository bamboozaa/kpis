@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row text-center">
                            <h1>{{ __('PERFORMANCE REVIEW FORM') }}</h1>
                            <p>{{ __('(แบบประเมินผลการปฏิบัติงาน)') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
