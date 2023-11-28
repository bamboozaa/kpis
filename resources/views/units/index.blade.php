@extends('layouts.app')
@section('title', 'All Units')

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
        <div class="row justify-content-center">
            <div class="col-md-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Units</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3" style="text-align: right!important;">
                <a href="{{ route('units.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Create
                    New Unit</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ __('All Units') }}</div>

                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center text-nowrap">No.</th>
                                        <th scope="col" class="text-nowrap">Unit Name</th>
                                        <th scope="col" class="text-nowrap">Owner</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($units) > 0)
                                        @foreach ($units as $unit)
                                            <tr>
                                                <td class="text-center">{{ $unit->unit_id }}</td>
                                                <td>{{ $unit->unit_name }}</td>
                                                <td>{{ $unit->owner }}</td>
                                                <td class="text-center text-nowrap">
                                                    <a href="{{ route('units.edit', $unit->unit_id) }}" class="btn btn-warning btn-sm">Edit</a>
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
    </div>
@endsection

@section('footer')

    @include('footer')

@endsection
