@extends('layouts.main')

@section('content')

<style>
    .table-specing{
        margin-top: 27px;
    }
    .tablehead{
        background-color: bisque;
    }
</style>
<div class="col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header py-3">Users List</div>
        <hr>
        <div class="card-body py-3">
            <div class="card-title">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif
                
                <div class="button-container text-right mb-2">
                    <a href="{{ route('create.user') }}" class="btn btn-info btn-sm mt-1">
                        <i class="bi bi-plus-lg"></i> Add User
                    </a>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-sm table-specing" id="myTable">
                    <thead>
                        <tr class="tablehead">
                            <th class="text-center">No</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr class="">
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center"><img src="{{ asset('images/' .$user->image)}}" class="img-fixed-height" width="100px" height="100px"></td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->phone }}</td>
                            <td class="text-center">{{ $user->address }}</td>
                            <td class="text-center">
                                <a href="{{ route('edit.user', $user->id) }}"
                                    class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

        .tablehead {
            background-color: #fff7ef;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header {
            color: #976239;
            font-size: 25px;
        }

        .btn-primary {
            margin-left: auto;
        }

        .button {
            background-color: transparent;
            border: 2px solid #976239;
            color: #976239;
            font-weight: bold;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: all .3s ease-out;
            /* text-transform: uppercase; */
        }
        .button:hover {
            background-color: #976239;
            color: #fff;
        }
    </style>
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="header-container d-flex justify-content-between align-items-center">
                <div class="card-header py-3" style="color: #976239; font-size: 25px;">
                    Users List
                </div>
                <a href="{{ route('create.user') }}" class="btn btn-sm mt-1 button">
                    <i class="bi bi-plus-lg mr-5" style="margin-right: 5px"></i> Add User
                </a>
            </div>
            <hr>
            <div class="card-body py-3">
                <div class="card-title">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif
                </div>
                <div class="table-responsive mt-3 datatable">
                    <table class="table table-sm table-specing">
                        <thead>
                            <tr class="tablehead">
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr class="">
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    {{-- <td><img src="{{ asset('images/' .$user->image)}}" class="img-fixed-height" width="100px"></td> --}}
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->phone }}</td>
                                    <td class="text-center">{{ $user->address }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('edit.user', $user->id) }}" class="button btn-sm"><i
                                                class="bi bi-pencil-square"></i></a>

                                        <a href="{{ route('destroy.user', $user->id) }}"
                                            class="button btn-sm ml-5"onclick="return confirm('Are you sure you want to delete this ?');"><i
                                                class="bi bi-trash3-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
             @section('script')
    <script>
        $(document).ready(function() {
            console.console.log();
            $('.datatable').DataTable();
        });
    </script>
@endsection
@endsection
@push('scripts')
    <script>
        $(document).ready(function(e){
            let table = new DataTable('#myTable');
        }); 
    </script>
@endpush
