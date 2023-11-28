@extends('layouts.app')

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
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('users') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">{{ __('User Profile') }}</div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="fullname" class="form-label">ชื่อ สกุล :</label>
                            <input type="text" class="form-control" id="fullname" value="{{ $user->fullname }}"
                                readonly>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="email" class="form-label">Email address :</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                        </div> --}}

                        <div class="mb-3">
                            <label for="position" class="form-label">ตำแหน่งงานปัจจุบัน :</label>
                            <input type="text" class="form-control" id="position" value="{{ $user->position }}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label for="department" class="form-label">หน่วยงาน :</label>
                            <input type="text" class="form-control" id="department"
                                value="{{ $user->department }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="unit" class="form-label">แผนก :</label>
                            <input type="text" class="form-control" id="unit"
                                value="{{ isset($user->unit_name['unit_name']) ? $user->unit_name['unit_name'] : "" }}" readonly>
                        </div>

                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>

                        {{-- <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
