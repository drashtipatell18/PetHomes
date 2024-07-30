@extends('layouts.main')
@section('content')
    <style>
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
        }

        .button:hover {
            background-color: #976239;
            color: #fff;
        }

        .modal {
            /* display: block !important; */
            opacity: 1 !important;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999 !important;
            margin-top: 50px;
        }

        .modal-dialog {
            z-index: 10000 !important;
        }

        .top-comtantet {
            margin-top: 185px;
        }

        .modal-header .btn-close {
            position: absolute;
            right: 1rem;
            top: 1rem;
            z-index: 1;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="header-container d-flex justify-content-between align-items-center">
                        <div class="card-header py-3" style="color: #976239; font-size: 25px;">
                            My Profile
                        </div>
                        <button type="button" class="btn btn-sm mt-1 button" data-bs-toggle="modal"
                            data-bs-target="#editProfileModal">
                            <i class="bi bi-plus-lg mr-5" style="margin-right: 5px"></i> Edit Profile
                        </button>
                    </div>

                    <hr class="hr">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row mb-4">
                            <div class="col-md-4 text-center">
                                @if (Auth::user()->image)
                                    <img src="/images/{{ Auth::user()->image }}" alt="Profile Photo"
                                        class="img-fluid rounded-circle" style="max-width: 200px;">
                                @else
                                    <img src="/images/default-avatar.png" alt="Default Avatar"
                                        class="img-fluid rounded-circle" style="max-width: 200px;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-right">User ID</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{ $users->id }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{ $users->name }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-right">Email Address</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{ $users->email }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-right">Phone</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{ $users->phone ?? 'Not provided' }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{ $users->address ?? 'Not provided' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Profile Modal -->
                <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content top-comtantet">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Add your edit profile form here -->
                                <form id="editProfileForm" method="POST" action="{{ route('update.profile', Auth::id()) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Add form fields for editing profile -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $users->name }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $users->email }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $users->phone }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3">{{ $users->address }}</textarea>
                                    </div>
                                    <div>
                                      &nbsp;  
                                    </div>
                                    <div class="mb-3">
                                        @if (isset($users) && $users->image)
                                            <label for="image" id="imageLabel" class="control-label mb-1 oldimage">Old Image</label>
                                            <img id="oldImage" src="{{ asset('images/' . $users->image) }}" alt="Uploaded Document"
                                                width="100">
                                            <input type="hidden" class="form-control" name="oldimage" value="{{ $users->image }}">
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="control-label mb-1">Image</label>
                                        <input type="file" id="profilepicInput" class="form-control" name="image">
                                        @error('image')
                                            <span class="invalid-feedback" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div>
                                        &nbsp;  
                                      </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-sm" style="background-color: #976239; color:aliceblue">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show modal based on session errors or other conditions
            @if ($errors->any())
                var myModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
                myModal.show();
            @endif
        });
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
