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
                        <h3 class="text-center title-2">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h3>
                    </div>
                    <hr>
                    <form action="{{ isset($category) ? '/category/update/' . $category->id : '/category/store' }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Name*</label>
                            <input id="name" name="name" type="text" value="{{ old('name', $category->name ?? '') }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputImage-edit" class="form-label">Image</label>
                            <div>
                                <img id="current-image" src="{{ isset($category) && $category->image ? asset('images/' . $category->image) : '' }}" alt="Current Image" style="width: 20%; max-height: 200px; object-fit: cover; {{ isset($category) && $category->image ? '' : 'display: none;' }}">
                            </div>
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
                            <button type="submit" class="btn btn-lg btn-info btn-block">
                                @if (isset($category))
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
                $('#profilepicInput').on('change', function(event) {
                    if (event.target.files && event.target.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#current-image').attr('src', e.target.result).show();
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }
                });
            });
        </script>
    @endpush
