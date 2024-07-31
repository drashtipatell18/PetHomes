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
                    <h3 class="text-center title-2">{{ isset($products) ? 'Edit Product' : 'Add Product' }}</h3>
                </div>
                <hr>
                <form action="{{ isset($products) ? '/admin/product/update/' . $products->id : '/product/store' }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">Name*</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $products->name ?? '') }}"
                        class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label mb-1">Description</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $products->description ?? '') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label mb-1">Price</label>
                        <input id="price" name="price" type="number" value="{{ old('price', $products->price ?? '') }}"
                            class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="stock" class="control-label mb-1">Stock</label>
                        <input id="stock" name="stock" type="text" value="{{ old('stock', $products->stock ?? '') }}"
                            class="form-control @error('stock') is-invalid @enderror">
                        @error('stock')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        @if (isset($products) && $products->image)
                            <label for="image" id="imageLabel" class="control-label mb-1 oldimage">Old Image</label>
                            <img id="oldImage" src="{{ asset('images/' . $products->image) }}" alt="Uploaded Document"
                                width="100">
                            <input type="hidden" class="form-control" name="oldimage" value="{{ $products->image }}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label mb-1">Image</label>
                        <input type="file" id="profilepicInput" class="form-control" name="image">
                        @error('image')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <button type="submit" class="btn btn-lg btn-block" style="background-color: #976239; color:aliceblue">
                            @if (isset($products))
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
