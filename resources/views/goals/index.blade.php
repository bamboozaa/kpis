@extends('layouts.app')
@section('title', 'เป้าหมาย')

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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('เป้าหมาย') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ route('goals.create') }}" class="btn btn-primary mb-2">
                    <i class="fs-sm bi bi-plus-square"></i><span class="ms-2">{{ __('สร้างเป้าหมายใหม่') }}</span></a>
            </div>
        </div>

        <div class="row justify-content-center my-4">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered" style="--bs-table-bg: #fff !important">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center text-nowrap">{{ __('No.') }}</th>
                                    <th scope="col" class="text-nowrap">{{ __('เป้าหมาย') }}</th>
                                    <th scope="col" class="text-center">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($goals) > 0)
                                    @foreach ($goals as $key => $goal)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $goal->goal }}</td>
                                            <td class="text-center text-nowrap">
                                                <a href="{{ route('goals.show', $goal->goa_id) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-exclamation-circle fs-sm"></i>
                                                    <span class="ms-1">{{ __('info') }}</span>
                                                </a>
                                                <a href="{{ route('goals.edit', $goal->goa_id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square fs-sm"></i>
                                                    <span class="ms-1">{{ __('Edit') }}</span>
                                                </a>
                                                <form action="{{ route('goals.destroy', $goal->goa_id) }}" method="POST"
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
