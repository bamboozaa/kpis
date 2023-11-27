@extends('layouts.app')

@section('importcss')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

@section('importjs')
    @parent
    <script type="module">
        @if(session('success'))
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
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Departments</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">{{ __('All Departments') }}</div>

                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center text-nowrap">No.</th>
                                        <th scope="col" class="text-nowrap">Department Name</th>
                                        <th scope="col" class="text-nowrap">Cost Center</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr>
                                            <td class="text-center">{{ $department->dep_id }}</td>
                                            <td>{{ $department->dep_name }}</td>
                                            <td>{{ $department->cost_center }}</td>
                                            <td class="text-center text-nowrap">
                                                <a href="{{ route('departments.edit', $department->dep_id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('departments.destroy', $department->dep_id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
