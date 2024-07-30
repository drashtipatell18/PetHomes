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
                    <h3 class="text-center title-2">{{ isset($wishlists) ? 'Edit Wish List' : 'Add Wish List' }}</h3>
                </div>
                <hr>
                <form action="{{ isset($wishlists) ? '/wishlist/update/' . $wishlists->id : '/wishlist/store' }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="user_id" class="control-label mb-1">User Name*</label>
                        <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">Select Order</option>
                            @foreach ($users as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($wishlists) && $wishlists->user_id == $id ? 'selected' : '' }}>{{ $name }}
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
                        <label for="pet_id" class="control-label mb-1">Pet Name*</label>
                        <select name="pet_id" id="pet_id" class="form-control @error('pet_id') is-invalid @enderror">
                            <option value="">Select Product</option>
                            @foreach ($pets as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($wishlists) && $wishlists->pet_id == $id ? 'selected' : '' }}>{{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('pet_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                     
                    <div class="item form-group">
                        <button type="submit" class="btn btn-lg btn-block" style="background-color: #976239; color:aliceblue">
                            @if (isset($wishlists))
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

