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
                    <h3 class="text-center title-2">{{ isset($orders) ? 'Edit Order' : 'Add Order' }}</h3>
                </div>
                <hr>
                <form action="{{ isset($orders) ? '/admin/order/update/' . $orders->id : '/order/store' }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="user_id" class="control-label mb-1">User Name*</label>
                        <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">Select User</option>
                            @foreach ($users as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($orders) && $orders->user_id == $id ? 'selected' : '' }}>{{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date" class="control-label mb-1">Date</label>
                        <input id="date" name="date" type="date" value="{{ old('date', $orders->date ?? '') }}"
                            class="form-control @error('date') is-invalid @enderror">
                        @error('date')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status" class="control-label mb-1">Status</label>
                        <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">Select Status</option>
                            <option value="pending" {{ old('status', $orders->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="shipped" {{ old('status', $orders->status ?? '') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ old('status', $orders->status ?? '') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <button type="submit" class="btn btn-lg btn-block" style="background-color: #976239; color:aliceblue">
                            @if (isset($orders))
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#profilepicInput').change(function(e) {
                var fileName = e.target.files[0];
                if (fileName) {
                    $('#imageLabel').text('New Image'); // Change the label text

                    // Display the new image in the img tag
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#oldImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fileName);
                }
            });
        });
    </script>
@endpush
