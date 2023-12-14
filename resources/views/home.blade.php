@extends('layouts.app')
@section('title', 'Home')

@section('importcss')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

@section('sidemenu')
    @include('layouts.sidemenu')
@endsection

@section('content')

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><span class="ms-1">{{ __('Dashboard') }}</span></li>
        </ol>
    </nav>

    <!-- Card -->
    <div class="row px-3">
        <div class="card">
            {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

            <div class="card-body">

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
                    <p>{{ __('ประจำปีการศึกษา') . $current_year2 + 543 }}</p>
                </div>

                <div class="row">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <tr>
                                <th scope="col" class="text-end text-nowrap"
                                    style="background-color: #f3f3f3">{{ __('ชื่อ - สกุล :') }}</th>
                                <td>{{ Auth::user()->fullname }}</td>
                            </tr>
                            <tr>
                                <th scope="col" class="text-end text-nowrap"
                                    style="background-color: #f3f3f3">{{ __('ตำแหน่งงานปัจจุบัน :') }}</th>
                                <td>{{ Auth::user()->position }}</td>
                            </tr>
                            <tr>
                                <th scope="col" class="text-end text-nowrap"
                                    style="background-color: #f3f3f3">{{ __('หน่วยงาน :') }}</th>
                                <td>
                                    @php
                                        $department = trim(Auth::user()->department);
                                        $left_pos = strripos($department, '(') + 1;
                                        $department = substr($department, $left_pos, strlen($department));
                                        $department = substr($department, 0, strlen($department) - 1);
                                        $department = trim($department);
                                        // $user = App\Models\User::Where('id', Auth::user()->id)->get();
                                        $user_faculty = App\Models\User_Faculty::Where('user_id', Auth::user()->id)->get();
                                        // echo $user_faculty[0]['fac_id'];
                                        // $faculty = App\Models\Faculty::Where('fac_id', $user_faculty[0]['fac_id'])->get();
                                    @endphp
                                    {{-- {{ dd($user) }} --}}
                                    {{-- {{ $department . (is_null(Auth::user()->unit_id) ? "" : " / " . App\Models\Unit::findOrFail(Auth::user()->unit_id)->unit_name) }} --}}
                                    {{-- {{ $department . (is_null($faculty[0]['fac_name']) ? "" : " - " . $faculty[0]['fac_name']) }} --}}
                                    {{ $department }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="text-end text-nowrap"
                                    style="background-color: #f3f3f3">{{ __('ชื่อผู้บังคับบัญชาโดยตรง :') }}</th>
                                <td>
                                    {{-- {{ is_null(Auth::user()->unit_id) ? "" : App\Models\Unit::findOrFail(Auth::user()->unit_id)->user_name['fullname'] }} --}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

    @include('footer')

@endsection
