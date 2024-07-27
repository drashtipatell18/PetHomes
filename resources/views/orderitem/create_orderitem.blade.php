@extends('layouts.main')
<style>
    .button-container {
        display: flex;
        justify-content: flex-end;
    }

    .card-header {
        display: none;
    }

    .formdata {
        margin-left: 23% !important;
        margin-top: 20px !important;
    }

    .oldimage {
        display: none;
    }
</style>
@section('content')
    <div class="col-md-5 col-sm-5 formdata mt-5">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">{{ isset($orderitems) ? 'Edit Order Items' : 'Add Order Items' }}</h3>
                </div>
                <hr>
                <form action="{{ isset($orderitems) ? '/orderitem/update/' . $orderitems->id : '/orderitem/store' }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="order_id" class="control-label mb-1">Order Name*</label>
                        <select name="order_id" id="order_id" class="form-control @error('order_id') is-invalid @enderror">
                            <option value="">Select Order</option>
                            @foreach ($orders as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($orderitems) && $orderitems->order_id == $id ? 'selected' : '' }}>{{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('order_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_id" class="control-label mb-1">Product Name*</label>
                        <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                            <option value="">Select Product</option>
                            @foreach ($products as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($orderitems) && $orderitems->product_id == $id ? 'selected' : '' }}>{{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('order_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="control-label mb-1">Quantity</label>
                        <input id="quantity" name="quantity" type="number" value="{{ old('quantity', $orderitems->quantity ?? '') }}"
                            class="form-control @error('quantity') is-invalid @enderror">
                        @error('quantity')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label mb-1">Price</label>
                        <input id="price" name="price" type="number" value="{{ old('price', $orderitems->price ?? '') }}"
                            class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                    <div class="item form-group">
                        <button type="submit" class="btn btn-lg btn-info btn-block">
                            @if (isset($orderitems))
                                Update
                            @else
                                Save
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

