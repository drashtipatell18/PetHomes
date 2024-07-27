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
        <div class="card-header py-3">ChatUser List</div>
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
                    <a href="{{ route('chatuser.create') }}" class="btn btn-info btn-sm mt-1">
                        <i class="bi bi-plus-lg"></i> Add ChatUser
                    </a>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-sm table-specing" id="myTable">
                    <thead>
                        <tr class="tablehead">
                            <th class="text-center">No</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chatusers as $index => $chatuser)
                        <tr class="">
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $chatuser->user1->name }}</td>
                            <td class="text-center">{{ $chatuser->user2->name }}</td>
                            <td class="text-center">{{ $chatuser->status }}</td>
                            <td class="text-center">
                                <a href="{{ route('edit.chatuser', $chatuser->id) }}"
                                    class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                <a href="{{ route('destroy.chatuser', $chatuser->id) }}"
                                    class="btn btn-danger btn-sm"onclick="return confirm('Are you sure you want to delete this ?');"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable');
            // Set timeout for success alert
            setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 1000); // 5000 milliseconds = 5 seconds

            // Set timeout for danger alert
            setTimeout(function() {
                $('#danger-alert').fadeOut('slow');
            }, 1000); // 5000 milliseconds = 5 seconds
        });
    </script>
@endpush