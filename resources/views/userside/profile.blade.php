@extends('layouts.user_layout')
@section('content')
<div class="pro_main m_hedPad">
    <div class="j_profile">
        <div class="j_wel">
            <div class="j_wel_pro">
                <div class="j_wel_img">
                    <img src="/user-side/img/Ellipse 10.svg" alt="welcom_profile">
                </div>
                <div class="j_wel_text">
                    <h4>Welcome Back</h4>
                    <h2>{{Auth::user()->name}}</h2>
                </div>
            </div>
            <hr>
            <div class="Wel_Link">
                <p class="link-item selected" data-target="account"  >My Account</p>
                <p class="link-item" data-target="adverts">My Adverts</p>
                <p class="link-item" data-target="alerts">Saved Search Alerts</p>
                <p data-bs-toggle="modal" data-bs-target="#staticBackdropLogOut">Log out</p>
            </div>
        </div>
        <!-- my account tab -->
        <div id="content-account" class="j_my content-section">
            <h2 class="fw-bolder">My Account</h2>
            <hr>
            <div class="j_pro_img">
                <img src="/images/{{Auth::user()->image}}" alt="" class="profileimg">
                <img src="/user-side/img/ri-gallery-line.svg" alt="" class="select_img">
            </div>
            <form method="POST" action="{{route('user.profile.update')}}">
                @csrf
                {{-- <div class="mb-3 mt-5">
                    <label for="First" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="First" placeholder="Parry">
                </div> --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Shah" value="{{Auth::user()->name}}">
                    @error('name')
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Contact Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}" placeholder="+44 253523652">
                    @error('phone')
                    <span class="text-danger">{{$errors->first('phone')}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}" placeholder="Email">
                    @error('address')
                    <span class="text-danger">{{$errors->first('address')}}</span>
                    @enderror
                </div>
                <button type="submit" class="j_acc_btn">Save Change</button>
            </form>
            <hr>
            <div class="j_veri" style="flex-direction: column;">
                <h3>Verification status</h3>
                <form class="form-floating j_verification">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                            value="name@example.com">
                        <label for="floatingInput"><i class="fa-regular fa-circle-check"></i>Email Address
                            verified</label>
                        <span id="basic-addon1">Change</span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="floatingInput" placeholder="+91 1234567890"
                            value="-">
                        <label for="floatingInput"><i class="fa-regular fa-circle-xmark"></i>Phone number
                            verified</label>
                        <span id="basic-addon1">Change</span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="~" value="-">
                        <label for="floatingInput"><i class="fa-regular fa-circle-xmark"></i>Facebook not
                            verified</label>
                        <span id="basic-addon1">Change</span>
                    </div>
                </form>
                <hr>
            </div>
            <div class="j_veri" style="flex-direction: column;">
                <h3>Password</h3>
                <form action="">
                    <div class="input-group flex-nowrap mb-3">
                        <input type="password" class="form-control" placeholder="Your current password">
                        <span class="input-group-text"><i class="far fa-eye-slash"></i></span>
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <input type="password" class="form-control" placeholder="New password">
                        <span class="input-group-text"><i class="far fa-eye-slash"></i></span>
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <input type="password" class="form-control" placeholder="Confirm new password">
                        <span class="input-group-text"><i class="far fa-eye-slash"></i></span>
                    </div>
                    <button type="submit" class="j_acc_btn">Change password</button>
                </form>
            </div>
        </div>
        <!-- my adverts tab -->
        <div id="content-adverts" class="j_my content-section" style="display: none;">
            <div class="my_adverts">
                <h2>My Adverts</h2>
                <div class="advert_tab">
                    <a href="#">Active(0)</a>
                    <a href="#">Inactive(0)</a>
                </div>
                <div class="j_myadverts">
                    <img src="/user-side/img/myadverts.svg" alt="">
                    <p>It seems like we couldn’t find what you are looking for.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
