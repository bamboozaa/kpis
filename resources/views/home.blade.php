@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        {{-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif --}}

                        @php
                            $current_year = \Carbon\Carbon::now()->year;
                            $startDate = $current_year . '-08-01';
                            $endDate = $current_year + 1 . '-07-31';
                            $current_date = \Carbon\Carbon::now();

                            if ($current_date >= $startDate && $current_date <= $endDate) {
                                $current_year2 = \Carbon\Carbon::parse($current_date)->format('Y');
                            }
                        @endphp

                        <div class="row text-center">
                            <h1>{{ __('PERFORMANCE REVIEW FORM') }}</h1>
                            <p>{{ __('(แบบประเมินผลการปฏิบัติงาน)') }}</p>
                            <p>{{ __('ประจำปีการศึกษา') . $current_year2 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
