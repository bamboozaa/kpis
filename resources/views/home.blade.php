@extends('layouts.app')

@section('content')

    @php

    function getDepartment($department) {
        $dep_full_name = trim($department);
        $left_pos = strripos($dep_full_name, "(") + 1;
        $dep_full_name = substr($dep_full_name, $left_pos, strlen($dep_full_name));
        $dep_full_name = substr($dep_full_name, 0, strlen($dep_full_name) - 1);
        $dep_full_name = trim($dep_full_name);
        return $dep_full_name;
    }

    function getOwnerUnitName($id) {
        $owner_name = App\Models\Unit::findOrFail($id);
        return $owner_name;
    }
    @endphp

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

                        <div class="row">
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered">
                                    <tr>
                                        <th scope="col" class="text-center text-nowrap"
                                            style="background-color: #f3f3f3">ชื่อ - สกุล :</th>
                                        <td>{{ Auth::user()->fullname }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="text-center text-nowrap"
                                            style="background-color: #f3f3f3">ตำแหน่งงานปัจจุบัน :</th>
                                        <td>{{ Auth::user()->position }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="text-center text-nowrap"
                                            style="background-color: #f3f3f3">หน่วยงาน :</th>
                                        <td>{{ getDepartment(Auth::user()->department) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="text-center text-nowrap"
                                            style="background-color: #f3f3f3">ชื่อผู้บังคับบัญชาโดยตรง :</th>
                                        <td>{{ getOwnerUnitName(Auth::user()->unit_id)->user_name['fullname'] }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
