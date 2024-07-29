@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0">My Profile</h5>
                        <a href="" class="btn btn-primary btn-sm">Edit Profile</a>
                    </div>
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
                            @if(Auth::user()->image)
                                <img src="/images/{{Auth::user()->image}}" alt="Profile Photo" class="img-fluid rounded-circle" style="max-width: 200px;">
                            @else
                                <img src="/images/default-avatar.png" alt="Default Avatar" class="img-fluid rounded-circle" style="max-width: 200px;">
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
        </div>
    </div>
</div>
@endsection