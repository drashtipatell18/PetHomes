@extends('layouts.main')

@section('content')
    <style>
        .table-specing {
            margin-top: 27px;
        }

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
            <hr>
            <div class="header-container d-flex justify-content-between align-items-center">
                <div class="card-header py-3" style="color: #976239; font-size: 25px;">
                    Order List
                </div>
                <a href="{{ route('order.create') }}" class="btn btn-sm mt-1 button">
                    <i class="bi bi-plus-lg mr-5" style="margin-right: 5px"></i> Add Order
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
                <div class="table-responsive mt-3">
                    <table class="table table-sm table-specing" id="myTable">
                        <thead>
                            <tr class="tablehead">
                                <th class="text-center">No</th>
                                <th class="text-center">UserName</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr class="">
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $order->user->name }}</td>
                                    <td class="text-center">{{ $order->date }}</td>
                                    <td class="text-center">{{ $order->status }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('edit.order', $order->id) }}" class="button btn-sm"><i
                                                class="bi bi-pencil-square"></i></a>

                                        <a href="{{ route('destroy.order', $order->id) }}"
                                            class="button btn-sm" onclick="return confirm('Are you sure you want to delete this ?');"><i
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
