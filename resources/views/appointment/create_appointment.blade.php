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
                    <h3 class="text-center title-2">{{ isset($appointments) ? 'Edit Appointment' : 'Add Appointment' }}</h3>
                </div>
                <hr>
                <form action="{{ isset($appointments) ? '/appointment/update/' . $appointments->id : '/appointment/store' }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="user_id" class="control-label mb-1">User Name*</label>
                        <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">Select User</option>
                            @foreach ($users as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($appointments) && $appointments->user_id == $id ? 'selected' : '' }}>
                                    {{ $name }}
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
                                    {{ isset($appointments) && $appointments->category_id == $id ? 'selected' : '' }}>
                                    {{ $name }}
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
                        <select name="pet_id" id="pet_id" class="form-control @error('pet_id') is-invalid @enderror">
                            <option value="">Select Pet</option>
                            @foreach ($categories as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($appointments) && $appointments->pet_id == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('pet_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="breed" class="control-label mb-1">Service Name</label>
                        <select name="service_id" id="service_id" class="form-control @error('service_id') is-invalid @enderror">
                            <option value="">Select Service</option>
                            @foreach ($services as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($appointments) && $appointments->service_id == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date" class="control-label mb-1">date</label>
                        <input id="date" name="date" type="date" value="{{ old('date', $appointments->date ?? '') }}"
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
                            <option value="scheduled" {{ old('status', $appointments->status ?? '') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            <option value="completed" {{ old('status', $appointments->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status', $appointments->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="item form-group">
                        <button type="submit" class="btn btn-lg btn-info btn-block">
                            @if (isset($appointments))
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
@endpush
