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
                    <h3 class="text-center title-2">{{ isset($pets) ? 'Edit Pet' : 'Add Pet' }}</h3>
                </div>
                <hr>
                <form action="{{ isset($pets) ? '/admin/pet/update/' . $pets->id : '/pet/store' }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="user_id" class="control-label mb-1">User Name*</label>
                        <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">Select User</option>
                            @foreach ($users as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($pets) && $pets->user_id == $id ? 'selected' : '' }}>{{ $name }}
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
                        <label for="category_id" class="control-label mb-1">Category Name</label>
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach ($categories as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($pets) && $pets->category_id == $id ? 'selected' : '' }}>{{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">Pet Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $pets->name ?? '') }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="breed" class="control-label mb-1">Breed</label>
                        <input id="breed" name="breed" type="text" value="{{ old('breed', $pets->breed ?? '') }}"
                            class="form-control @error('breed') is-invalid @enderror">
                        @error('breed')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="age" class="control-label mb-1">Age</label>
                        <input id="age" name="age" type="number" value="{{ old('age', $pets->age ?? '') }}"
                            class="form-control @error('age') is-invalid @enderror">
                        @error('age')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="health_info" class="control-label mb-1">Health Info</label>
                        <textarea id="health_info" name="health_info" class="form-control @error('health_info') is-invalid @enderror">{{ old('health_info', $pets->health_info ?? '') }}</textarea>
                        @error('health_info')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="place" class="control-label mb-1">Place</label>
                        <input id="place" name="place" type="text" value="{{ old('place', $pets->place ?? '') }}"
                            class="form-control @error('place') is-invalid @enderror">
                        @error('place')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        @if (isset($pets) && $pets->image)
                            <label for="image" id="imageLabel" class="control-label mb-1 oldimage">Old Image</label>
                            <img id="oldImage" src="{{ asset('images/' . $pets->image) }}" alt="Uploaded Document"
                                width="100">
                            <input type="hidden" class="form-control" name="oldimage" value="{{ $pets->image }}">
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
                            @if (isset($pets))
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
