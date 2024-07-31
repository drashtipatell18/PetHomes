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
                    <h3 class="text-center title-2">{{ isset($chatusers) ? 'Edit Chat User' : 'Add Chat User' }}</h3>
                </div>
                <hr>
                <form action="{{ isset($chatusers) ? '/admin/chatuser/update/' . $chatusers->id : '/chatuser/store' }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="user_id" class="control-label mb-1">User Name*</label>
                        <select name="user_id1" id="user_id1" class="form-control @error('user_id1') is-invalid @enderror">
                            <option value="">Select Order</option>
                            @foreach ($users as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($chatusers) && $chatusers->user_id1 == $id ? 'selected' : '' }}>{{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id1')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="user_id" class="control-label mb-1">User Name*</label>
                        <select name="user_id2" id="user_id2" class="form-control @error('user_id2') is-invalid @enderror">
                            <option value="">Select Order</option>
                            @foreach ($users as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($chatusers) && $chatusers->user_id2 == $id ? 'selected' : '' }}>{{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id2')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <button type="submit" class="btn btn-lg btn-block" style="background-color: #976239; color:aliceblue">
                            @if (isset($chatusers))
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

