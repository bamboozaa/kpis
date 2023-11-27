@extends('layouts.app')
@section('title', 'All Users')

@section('importcss')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

@section('content')
    @include('inc.function')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">{{ __('All Users') }}</div>

                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center text-nowrap">No.</th>
                                        <th scope="col" class="text-nowrap">ชื่อ - สกุล</th>
                                        <th scope="col" class="text-nowrap">หน่วยงาน</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center">{{ $user->id }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>{{ getDepartment($user->department) }}</td>
                                            <td class="text-center text-nowrap">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                {{-- <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                                </form> --}}
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

@section('footer')

    @include('footer')

@endsection
