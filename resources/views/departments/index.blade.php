@extends('layouts.app')
@section('title', 'All Departments')

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

@section('content')

    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-7">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Departments') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ route('departments.create') }}" class="btn btn-primary mb-2">
                    <i class="bi bi-plus-square"></i>{{ __(' Create New Department') }}
                </a>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-header"><i class="bi bi-border-all fs-6"></i>{{ __(' All Departments') }}</div>

                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center text-nowrap">{{ __('Cost Center') }}</th>
                                        <th scope="col" class="text-nowrap">{{ __('ชื่อหน่วยงาน') }}</th>
                                        <th scope="col" class="text-nowrap">{{ __('ชื่อฝ่าย') }}</th>
                                        <th scope="col" class="text-center">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($departments) > 0)
                                        @foreach ($departments as $key => $department)
                                            <tr>
                                                <td class="text-center">{{ $department->cost_center }}</td>
                                                <td>{{ $department->dep_name }}</td>
                                                <td>{{ isset($department->division['div_name']) ? $department->division['div_name'] : "" }}</td>
                                                <td class="text-center text-nowrap">
                                                    <a href="{{ route('departments.edit', $department->dep_id) }}"
                                                        class="btn btn-warning btn-sm">{{ __('Edit') }}</a>
                                                    <form action="{{ route('departments.destroy', $department->dep_id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this department?')">
                                                        {{ __('Delete') }}
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
    </div>
@endsection

@section('footer')

    @include('footer')

@endsection
