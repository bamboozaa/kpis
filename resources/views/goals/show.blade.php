@extends('layouts.app')
@section('title', 'Show Goal')

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
                        <li class="breadcrumb-item"><a href="{{ url('goals') }}">{{ __('Goals') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Show Goal') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ url('goals') }}" class="btn btn-primary mb-2"><i class="bi bi-back"></i><span
                        class="ms-2">{{ __('Back') }}</span></a>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="card bg-white">
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="goal"
                            class="col-sm-3 col-form-label text-nowrap">{{ __('บันทึกหน้าที่หลัก / กิจกรรมหลัก :') }}</label>
                        <div class="col-sm-9">
                            <textarea rows="2" cols="40" name="goal" class="form-control" readonly>{{ old('name', $goal->goal) }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center my-4">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-app-indicator fs-4" style="color: red"></i>
                    <span class="ms-2">{{ __('ตัวชี้วัด KPI') }}</span>

                    <a href="{{ route('indicators.create', ['id' => old('name', $goal->goa_id)]) }}" class="btn btn-primary mb-2 float-end">
                        <i class="fs-sm bi bi-plus-square"></i>
                        <span class="ms-2">{{ __('สร้างตัวชี้วัดใหม่') }}</span>
                    </a>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center text-nowrap">{{ __('No.') }}</th>
                                    {{-- <th scope="col" class="text-nowrap">{{ __('เป้าหมาย') }}</th> --}}
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
                                            {{-- <td>{{ $indicator->goal['goal'] }}</td> --}}
                                            <td>{{ $indicator->indicator }}</td>
                                            <td>{{ $indicator->weight . '%' }}</td>
                                            <td class="text-center text-nowrap">
                                                <a href="{{ route('indicators.edit', $indicator->ind_id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square fs-sm"></i>
                                                    <span class="ms-1">{{ __('Edit') }}</span>
                                                </a>
                                                <form action="{{ route('indicators.destroy', $indicator->ind_id) }}"
                                                    method="POST" style="display: inline;">
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
                                        <td colspan="4">{{ __('ไม่พบข้อมูลที่ท่านต้องการค้นหาในขณะนี้') }}</td>
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
