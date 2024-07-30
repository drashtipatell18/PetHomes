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
                    <h3 class="text-center title-2">{{ isset($chats) ? 'Edit Chat' : 'Add Chat' }}</h3>
                </div>
                <hr>
                <form action="{{ isset($chats) ? '/chat/update/' . $chats->id : '/chat/store' }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="sender_id" class="control-label mb-1">Sender Name*</label>
                        <select name="sender_id" id="sender_id" class="form-control @error('sender_id') is-invalid @enderror">
                            <option value="">Select Sender</option>
                            @foreach ($users as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($chats) && $chats->sender_id == $id ? 'selected' : '' }}>{{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sender_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="receiver_id" class="control-label mb-1">Receiver Name*</label>
                        <select name="receiver_id" id="receiver_id" class="form-control @error('receiver_id') is-invalid @enderror">
                            <option value="">Select Receiver</option>
                            @foreach ($users as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($chats) && $chats->receiver_id == $id ? 'selected' : '' }}>{{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('receiver_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="chat" class="control-label mb-1">Chat</label>
                        <textarea id="chat" name="chat" class="form-control @error('chat') is-invalid @enderror">{{ old('chat', $chats->chat ?? '') }}</textarea>
                        @error('chat')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="control-label mb-1">Attchment</label>
                        <input type="file" id="profilepicInput" class="form-control" name="attchment">
                    </div>
                    <div class="item form-group">
                        <button type="submit" class="btn btn-lg btn-block" style="background-color: #976239; color:aliceblue">
                            @if (isset($chats))
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

