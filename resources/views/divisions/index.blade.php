@extends('layouts.app')
@section('title', 'All Divisions')

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
        <div class="row justify-content-end">
            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Divisions</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ route('divisions.create') }}" class="btn btn-primary mb-2">
                    <i class="bi bi-plus-square fs-sm"></i>
                    <span class="ms-2">{{ __('Create New Division') }}</span>
                </a>
            </div>
        </div>
        <div class="row justify-content-end">


            <div class="card">
                <div class="card-header">{{ __('All Divisions') }}</div>

                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center text-nowrap">Cost Center</th>
                                    <th scope="col" class="text-nowrap">ชื่อฝ่าย</th>
                                    {{-- <th scope="col" class="text-center">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($divisions) > 0)
                                    @foreach ($divisions as $division)
                                        <tr>
                                            <td class="text-center">{{ $division->cost_center }}</td>
                                            <td>{{ $division->div_name }}</td>
                                            {{-- <td class="text-center text-nowrap">
                                                    <a href="{{ route('divisions.edit', $division->div_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                </td> --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">ไม่พบข้อมูลที่ท่านต้องการค้นหา</td>
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
