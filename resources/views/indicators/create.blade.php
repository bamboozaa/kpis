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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('บันทึกตัวชี้วัด KPI') }}</li>
                </ol>
            </nav>
        </div>

        <div class="row justify-content-center">
            <div class="card bg-white">
                <div class="card-body">
                    <form method="POST" action="{{ route('indicators.store') }}">
                        @csrf
                        {!! Form::hidden('user_id', Auth::user()->id) !!}
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

                        <div class="mb-3 row ">
                            <label for="goals" class="col-sm-2 col-form-label text-end text-nowrap">{{ __('เป้าหมาย :') }}</label>
                            <div class="col-sm-auto">
                                {!! Form::select('goa_id', $goals, null, [
                                    'class' => 'form-select',
                                    'placeholder' => 'Please Select ...',
                                ]) !!}
                            </div>
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

        <div class="row justify-content-center my-4">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-app-indicator fs-4" style="color: red"></i>
                    <span class="ms-2">{{ __('ตัวชี้วัด KPI') }}</span>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center text-nowrap">{{ __('No.') }}</th>
                                    <th scope="col" class="text-nowrap">{{ __('เป้าหมาย') }}</th>
                                    <th scope="col" class="text-nowrap">{{ __('ตัวชี้วัด') }}</th>
                                    <th scope="col" class="text-nowrap">{{ __('น้ำหนัก') }}</th>
                                    <th scope="col" class="text-center">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($indicators) > 0)
                                    @foreach ($indicators as $key => $indicator)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $indicator->goal['goal'] }}</td>
                                            <td>{{ $indicator->indicator }}</td>
                                            <td>{{ $indicator->weight . "%" }}</td>
                                            <td class="text-center text-nowrap">
                                                <a href="{{ route('goals.edit', $indicator->ind_id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square fs-sm"></i>
                                                    <span class="ms-1">{{ __('Edit') }}</span>
                                                </a>
                                                <form action="{{ route('goals.destroy', $indicator->ind_id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this department?')">
                                                        <i class="bi bi-trash fs-sm"></i>
                                                        <span class="ms-1">{{ __('Delete') }}</span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">{{ __('ไม่พบข้อมูลที่ท่านต้องการค้นหาในขณะนี้') }}</td>
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
