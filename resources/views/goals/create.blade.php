@extends('layouts.app')
@section('title', 'บันทึกหน้าที่หลักในการทำงาน')

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
                        {{-- <li class="breadcrumb-item"><a href="{{ url('departments') }}">{{ __('Departments') }}</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">{{ __('บันทึกหน้าที่หลัก') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ url('goals') }}" class="btn btn-primary mb-2">
                    <i class="bi bi-back"></i><span class="ms-2">{{ __('Back') }}</span>
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            {{-- <div class="col-md-10"> --}}
                <div class="card bg-white">
                    {{-- <div class="card-header">{{ __('Create Department') }}</div> --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('goals.store') }}">
                            @csrf


                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                            {{-- <div class="row mb-3">
                                <label for="cost_center" class="col-sm-3 col-form-label">{{ __('Cost Center :') }}</label>
                                <div class="col-sm-auto">
                                    <input type="text" name="cost_center" class="form-control" />
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="goal"
                                    class="col-sm-3 col-form-label text-end">{{ __('บันทึกหน้าที่หลัก / กิจกรรมหลัก :') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="goal" class="form-control" required />
                                    {{-- @error('dep_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                            {{-- <div class="mb-3 row ">
                                <label for="division" class="col-sm-3 col-form-label">{{ __('รายชื่อฝ่าย :') }}</label>
                                <div class="col-sm-auto">
                                    {!! Form::select('div_id', $divisions, null, [
                                        'class' => 'form-select',
                                        'placeholder' => 'Please Select ...',
                                    ]) !!}
                                </div>
                            </div> --}}
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
            {{-- </div> --}}
        </div>

        {{-- @php
            $goals = App\Models\Goal::whereIn('user_id', Auth::user()->id)->get();
            // $goals = $goals[0];
            // count($goals);
        @endphp --}}

        {{-- {{ dd($goals) }} --}}
        {{-- {{ count($goals) }} --}}

        @php
            // print_r($_GET)
            // foreach ($_GET as $key => $value) {
            //     {$key} => {$value};
            // }
        @endphp
        <div class="row justify-content-center my-4">
            <div class="card">
                <div class="card-header"><i class="bi bi-bullseye fs-4"></i><span class="ms-2">{{ __('หน้าที่รับผิดชอบหลัก (Key Responsibilities)') }}</span></div>

                <div class="card-body bg-white">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center text-nowrap">{{ __('No.') }}</th>
                                    <th scope="col" class="text-nowrap">{{ __('หน้าที่หลัก / กิจกรรมหลัก') }}</th>
                                    <th scope="col" class="text-center">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($goals) > 0)
                                    @foreach ($goals as $key => $goal)
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td>{{ $goal->goal }}</td>
                                            <td class="text-center text-nowrap">
                                                <a href="{{ route('goals.edit', $goal->goa_id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square fs-sm"></i>
                                                    <span class="ms-1">{{ __('Edit') }}</span>
                                                </a>
                                                <form action="{{ route('goals.destroy', $goal->goa_id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this department?')">
                                                    <i class="bi bi-trash fs-sm"></i>
                                                    <span class="ms-1">{{ __('Delete') }}</span>
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">{{ __('ไม่พบข้อมูลที่ท่านต้องการค้นหาในขณะนี้') }}</td>
                                    </tr>
                                @endif

                            </tbody>
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
