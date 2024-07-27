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
        <div class="card-header py-3">Order Item List</div>
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
                    <a href="{{ route('orderitem.create') }}" class="btn btn-info btn-sm mt-1">
                        <i class="bi bi-plus-lg"></i> Add OrderItem
                    </a>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-sm table-specing">
                    <thead>
                        <tr class="tablehead">
                            <th class="text-center">No</th>
                            <th class="text-center">Order Name</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Quantity </th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderitems as $index => $orderitem)
                        <tr class="">
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $orderitem->order->id }}</td>
                            <td class="text-center">{{ $orderitem->product->name }}</td>
                            <td class="text-center">{{ $orderitem->quantity }}</td>
                            <td class="text-center">{{ $orderitem->price }}</td>
                            <td class="text-center">
                                <a href="{{ route('edit.orderitem', $orderitem->id) }}"
                                    class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                <a href="{{ route('destroy.orderitem', $orderitem->id) }}"
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
