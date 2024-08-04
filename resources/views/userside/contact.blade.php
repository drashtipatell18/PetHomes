@extends('layouts.user_layout')
@section('content')
<section class="j_contact_us m_hedPad">
    <div class="j_US">
        <h2>Contact Us</h2>
        <div class="j_part ">
            <div class="j_con_img">
                <img src="/user-side/img/Maskgroup.svg" alt="mask">
            </div>
            <div class="j_contact_frm">
                <h2>Get In Touch</h2>
                <form method="POST" action="{{route('user.contactsave')}}">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Your Name*</label>
                        <input value="{{old('name')}}" type="text" name="name" class="form-control" id="name">
                        @error('name')
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Your Email*</label>
                        <input value="{{old('email')}}" type="email" name="email" class="form-control" id="email">
                        @error('email')
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="phone" class="form-label">Your Phone*</label>
                        <input value="{{old('phone')}}" type="number" name="phone" class="form-control" id="phone">
                        @error('phone')
                            <span class="text-danger">{{$errors->first('phone')}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="subject" class="form-label">Subject*</label>
                        <input value="{{old('subject')}}" type="text" name="subject" class="form-control" id="subject">
                        @error('subject')
                            <span class="text-danger">{{$errors->first('subject')}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="messsage" class="form-label">Message*</label>
                        <textarea value="{{old('message')}}" class="form-control" name="message" id="messsage" rows="3"></textarea>
                        @error('message')
                            <span class="text-danger">{{$errors->first('message')}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="j_contact">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="/user-side/js/contact.js"></script>
@endpush
