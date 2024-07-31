<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pet House</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="user-side/img/logobrown.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="user-side/css/bootstrap.min.css">
    <link rel="stylesheet" href="user-side/css/owl.carousel.min.css">
    <link rel="stylesheet" href="user-side/css/magnific-popup.css">
    <link rel="stylesheet" href="user-side/css/font-awesome.min.css">
    <link rel="stylesheet" href="user-side/css/themify-icons.css">
    <link rel="stylesheet" href="user-side/css/nice-select.css">
    <link rel="stylesheet" href="user-side/css/flaticon.css">
    <link rel="stylesheet" href="user-side/css/gijgo.css">
    <link rel="stylesheet" href="user-side/css/animate.css">
    <link rel="stylesheet" href="user-side/css/slicknav.css">
    <link rel="stylesheet" href="user-side/css/style.css">
    <link rel="stylesheet" href="user-side/css/responsive.css">
    <link rel="stylesheet" href="user-side/css/register.css">
    <link rel="stylesheet" href="user-side/css/Login.css">
    <link rel="stylesheet" href="user-side/css/m_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body>

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-10  col-xl-2 col-lg-1 d-flex justify-content-between">
                            <div class="logo-img">
                                <a href="{{route('user.dashboard')}}">
                                    <img class="logo_img" src="user-side/img/logobrown.png" alt="">
                                </a>
                            </div>
                            <div class="book_room justify-content-end d-lg-none">
                                <div class="socail_links">
                                    <ul class="mb-0 p-0">
                                        <!-- === responsive search ===== -->
                                        <li class="m_searchHov">
                                            <a href="#">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                            <div class=" m_search submenu d-flex align-items-center gap-3">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                <input type="text" name="search" id="m_searchIn" placeholder="Search">
                                            </div>
                                        </li>
                                        <!-- === end ===== -->
                                        <li class="m_userHov">
                                            <a href="#">
                                                <i class="fa-regular fa-user"></i>
                                            </a>
                                            <ul class="submenu m_submenu p-0">
                                                <!-- <li><a href="profile.html">My Account</a></li> -->
                                                <li><a href="./profile.html">My Account</a></li>
                                                <li><a href="profile.html">My Adverts</a></li>
                                                <li><a>Saved Search Alerts</a></li>
                                                <li><a data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                                                </li>
                                                <li><a data-bs-toggle="modal" data-bs-target="#loginModal">Log out</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="wishlist.html">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="book_btn d-none d-lg-block">
                                    <a data-bs-toggle="modal" data-bs-target="#addAdvertModal"><span
                                            style="font-size: 20px !important;">+</span> New
                                        Advert</a>
                                </div>
                                <div class="book_btn d-block d-lg-none" style="margin-left: 10px;" title="New Advert">
                                    <a data-bs-toggle="modal" data-bs-target="#addAdvertModal " class="#m_resAdv"
                                        style="padding: 4px 7px !important;"><span
                                            style="font-size: 20px !important;">+</span></a>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-2 col-xl-6 col-lg-6 px-5 m_resBt">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation" class="mb-0">
                                        <li><a class="active m_hActive" href="{{route('user.dashboard')}}">home</a></li>
                                        <li><a href="#">Accessories <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="dog_accessories.html?acc=All">All Accessories</a></li>
                                                <li><a href="dog_accessories.html?acc=Dog">Dogs Accessories</a></li>
                                                <li><a href="dog_accessories.html?acc=Cat">Cats Accessories</a></li>
                                                <li><a href="dog_accessories.html?acc=Rabbit">Rabbit Accessories</a>
                                                </li>
                                                <li><a href="dog_accessories.html?acc=Birds">Birds Accessories</a></li>
                                                <li><a href="dog_accessories.html?acc=Fish">Fish Accessories</a></li>
                                                <li><a href="dog_accessories.html?acc=Horses">Horse Accessories </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Services <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="services.html?serv=All">All Services</a></li>
                                                <li><a href="services.html?serv=jobs">Animal jobs</a></li>
                                                <li><a href="services.html?serv=Holidays">Holidays for pets</a></li>
                                                <li><a href="services.html?serv=Boarding">Boarding</a></li>
                                                <li><a href="services.html?serv=Day">Day Care</a></li>
                                                <li><a href="services.html?serv=Walking">Dog Walking</a></li>
                                                <li><a href="services.html?serv=Grooming">Grooming/Care</a></li>
                                                <li><a href="services.html?serv=Horse">Horse Share</a></li>
                                                <li><a href="services.html?serv=Pasture">Pasture</a></li>
                                                <li><a href="services.html?serv=Riding">Riding Holidays</a></li>
                                                <li><a href="services.html?serv=Training">Training</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact_us.html">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-6 col-sm-4 col-xl-4 col-lg-5 d-none d-lg-block ">
                            <div class="book_room justify-content-end ">
                                <div class="socail_links">
                                    <ul class="mb-0">
                                        <li class="m_searchHov">
                                            <a href="#">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                            <div class=" m_search submenu d-flex align-items-center gap-3">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                <input type="text" name="search" id="m_searchIn" placeholder="Search"
                                                    onkeyup="handlesearchall(event)">
                                                <div id="search-suggestions-container">
                                                    <ul id="search-suggestions"></ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="m_userHov">
                                            <a href="#">
                                                <i class="fa-regular fa-user"></i>
                                            </a>
                                            <ul class="submenu m_submenu p-0">
                                                <!-- <li><a href="profile.html">My Account</a></li> -->
                                                <li><a href="./profile.html">My Account</a></li>
                                                <li><a href="profile.html">My Adverts</a></li>
                                                <li><a>Saved Search Alerts</a></li>
                                                <li><a data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                                                </li>
                                                <li><a data-bs-toggle="modal" data-bs-target="#staticBackdropLogOut">Log
                                                        out</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="wishlist.html">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="book_btn d-none d-lg-block">
                                    <a data-bs-toggle="modal" data-bs-target="#addAdvertModal"><span
                                            style="font-size: 20px !important;">+</span> New
                                        Advert</a>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 m_inHam">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->


    <!-- log out modal start -->
    <div class="modal fade delete_modal" id="staticBackdropLogOut" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 id="staticBackdropLabel">Logout</h1>
                    <p>Are you sure you want to Logout?</p>
                </div>
                <div class="modal-footer" style="justify-content: center; border: none;">
                    <button type="button" class="btn_cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn_sub" data-bs-toggle="modal"
                        data-bs-target="#loginModal">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- log out modal end -->

    <!-- Login Modal Start -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body m_lrModal">
                    <section class="Login_form">
                        <div class="inner-box rounded-3  text-dark m-0">
                            <h2 class="text-center text-light fw-bolder">Login </h2>
                            <p class="text-light text-center">How to i get started lorem ipsum dolor at?</p>
                            <form class="">
                                <div class="mb-3 field">
                                    <div class="input-group mb-3 m_lrGrp">
                                        <div class="input-group-append">
                                            <span class="input-group-text input_custom_eye" id="basic-addon2">
                                                <img src="user-side/img/email.svg" alt="">
                                            </span>
                                        </div>
                                        <input type="email" class="form-control input_custom m_eLo"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" />
                                    </div>
                                </div>
                                <img src="user-side/img/horse5.jpg" alt="" srcset="">
                                <div class="mb-0 field">
                                    <div class="input-group mb-0 m_lrGrp">
                                        <div class="input-group-append">
                                            <span class="input-group-text input_custom_eye" id="basic-addon2">
                                                <img src="user-side/img/password.svg" alt="">
                                            </span>
                                        </div>
                                        <input type="text" class="form-control input_custom m_eLo"
                                            placeholder="Password" aria-label="Recipient's username"
                                            aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="password mt-1 text-end fw-bolder">
                                    <a class="forgot_pass text-light">Forget your password?</a>
                                </div>
                                <div class="mb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn text-white align-items-center m_subBtn">
                                        Login
                                    </button>
                                </div>
                                <div class="line_container">
                                    <div class="separator">
                                        <div class="line"></div>
                                        <h2>Login with others</h2>
                                        <div class="line"></div>
                                    </div>
                                </div>
                                <div class="follow_btn_group">
                                    <div class="follow_btn">
                                        <a>
                                            <img src="user-side/img/google 1.svg" alt="">
                                            Login with google
                                        </a>
                                    </div>
                                    <div class="follow_btn">
                                        <a>
                                            <img src="user-side/img/facebook 1.svg" alt="">
                                            Login with Facebook
                                        </a>
                                    </div>
                                </div>
                                <p class="text-center font_size_10 text-light">Don’t have an account? <span
                                        style="color: black;cursor: pointer; text-decoration: underline;"
                                        data-bs-toggle="modal" data-bs-target="#registerModal"> Register</span></p>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal  End-->

    <!-- Register Modal Start -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body m_lrModal">
                    <section class="Login_form">
                        <div class="inner-box rounded-3  text-dark m-0">
                            <h2 class="text-center text-light fw-bolder">Register </h2>
                            <p class="text-light text-center">How to i get started lorem ipsum dolor at?</p>
                            <form class="">
                                <div class="mb-3 field">
                                    <div class="input-group mb-3 m_lrGrp">
                                        <div class="input-group-append">
                                            <span class="input-group-text input_custom_eye" id="basic-addon2">
                                                <img src="user-side/img/password.svg" alt="">
                                            </span>
                                        </div>
                                        <input type="email" class="form-control input_custom" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="mb-3 field">
                                    <div class="input-group mb-3 m_lrGrp">
                                        <div class="input-group-append">
                                            <span class="input-group-text input_custom_eye" id="basic-addon2">
                                                <img src="user-side/img/call.svg" alt="">
                                            </span>
                                        </div>
                                        <input type="email" class="form-control input_custom " id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Phone" />
                                    </div>
                                </div>
                                <div class="mb-0 field">
                                    <div class="input-group mb-0 m_lrGrp">
                                        <div class="input-group-append">
                                            <span class="input-group-text input_custom_eye" id="basic-addon2">
                                                <img src="user-side/img/password.svg" alt="">
                                            </span>
                                        </div>
                                        <input type="text" class="form-control input_custom" placeholder="Password"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="my-5 d-flex justify-content-center">
                                    <button type="submit" class="btn text-white align-items-center m_subBtn">
                                        Register
                                    </button>
                                </div>
                                <p class="text-center font_size_10 text-light">Already have an account? <span
                                        style="color: black;cursor: pointer; text-decoration: underline;"
                                        data-bs-toggle="modal" data-bs-target="#loginModal"> Login</span></p>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Modal  End-->


    <!-- Add Advert Modal Start -->
    <div class="modal fade" id="addAdvertModal" tabindex="-1" aria-labelledby="addAdvertModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Verify phone Number</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center m_aaModBo">
                    <div class="m_aaimg">
                        <img src="user-side/img/aa_img.png" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at fermentum magna. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at fermentum magna. </p>
                    <div class="input-group gap-3 m_aaCon">
                        <select placeholder="Country">
                            <p>Country</p>
                            <option value="+44">+44</option>
                            <option value="+1">+1</option>
                            <option value="+91">+91</option>
                            <!-- Add more country codes as needed -->
                        </select>
                        <input type="text" placeholder="Phone number">
                    </div>
                    <div><a>
                            <p class="m_codeBtn" data-bs-toggle="modal" data-bs-target="#codeModal">Send me a code</p>
                        </a>
                    </div>
                    <div class="m_aaCan">Cancel</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Advert Modal End -->

    <!-- code Modal Start -->
    <div class="modal fade" id="codeModal" tabindex="-1" aria-labelledby="addAdvertModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Verify phone Number</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center m_aaModBo">
                    <div class="m_aaimg">
                        <img src="user-side/img/aa_img.png" alt="">
                    </div>
                    <p>We are automatically detection a SMA send to your<br>
                        mobile number</p>
                    <div class="otp_box_container d-flex justify-content-center">
                        <input class="otp_input" type="text" maxlength="1" oninput="moveToNext(this, event)"
                            onkeypress="return isNumber(event)">
                        <input class="otp_input" type="text" maxlength="1" oninput="moveToNext(this, event)"
                            onkeypress="return isNumber(event)">
                        <input class="otp_input" type="text" maxlength="1" oninput="moveToNext(this, event)"
                            onkeypress="return isNumber(event)">
                        <input class="otp_input" type="text" maxlength="1" oninput="moveToNext(this, event)"
                            onkeypress="return isNumber(event)">
                        <input class="otp_input" type="text" maxlength="1" oninput="moveToNext(this, event)"
                            onkeypress="return isNumber(event)">
                        <input class="otp_input" type="text" maxlength="1" oninput="moveToNext(this, event)"
                            onkeypress="return isNumber(event)">
                    </div>
                    <div>
                        <a href="">
                            <p class="m_codeBtn">Verify</p>
                        </a>
                    </div>
                    <p class="m_resCod">
                        Don’t receive the code? <a style="color: #976239 !important;">RESEND OTP</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Code Modal End -->

    @yield('content')



    <!-- footer -->
    <footer>
        <div class="container">
            <div class="m_fTop row d-flex justify-content-around">
                <div class="m_ftcon col-md-4 col-sm-6 text-center">
                    <img src="user-side/img/ft1.svg" alt="">
                    <h6 class="mb-0 mt-3">Home of pet Payments</h6>
                    <p> simply dummy text of the printing </p>
                </div>
                <div class="m_ftcon col-md-4 col-sm-6 text-center">
                    <img src="user-side/img/ft2.svg" alt="">
                    <h6 class="mb-0 mt-3">Robust ID verification</h6>
                    <p>  simply dummy text of the printing </p>
                </div>
                <div class="m_ftcon col-md-4 col-sm-6 text-center">
                    <img src="user-side/img/ft3.svg" alt="">
                    <h6 class="mb-0 mt-3">Trust and safety team</h6>
                    <p> simply dummy text of the printing </p>
                </div>
            </div>
        </div>
        <div class="m_fBot">
            <img class="m_fPaw" src="user-side/img/paw-footer.png" alt="">
            <div class="container">
                <div class="row" style=" padding: 70px 0;">
                    <div class="col-lg-4 col-sm-6">
                        <a href="{{route('user.dashboard')}}">
                            <img src="user-side/img/footer_logo.svg" alt="">
                            <h6 class="m_fTtl">Pet Homes</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at fermentum magna. </p>
                        <div class="m_soc d-flex gap-3">
                            <a href="https://www.facebook.com/login/" class="text-decoration-none"><img
                                    src="user-side/img/f_social1.svg" alt=""></a>
                            <a href="https://www.instagram.com/accounts/login/" class="text-decoration-none"><img
                                    src="user-side/img/f_social2.svg" alt=""></a>
                            <a href="https://x.com/twitt_login?lang=en" class="text-decoration-none"><img
                                    src="user-side/img/f_social3.svg" alt=""></a>
                            <a href="https://www.linkedin.com/login" class="text-decoration-none"><img
                                    src="user-side/img/f_social4.svg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 m_fLinks">
                        <h6>Information</h6>
                        <ul>
                            <li><a href="{{route('user.dashboard')}}">Home</a></li>
                            <li><a href="dog_accessories.html">Accessories</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="contact_us.html">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 m_fLinks">
                        <h6>Accessories & Services</h6>
                        <ul>
                            <li><a href="dog_accessories.html?acc=All">Dog & Cat Accessories for sale</a></li>
                            <li><a href="services.html">Dog Daycare Centres</a></li>
                            <li><a href="services.html">Dog Walkers</a></li>
                            <li><a href="dog_accessories.html?acc=All">Dog Groomers</a></li>
                            <li><a href="services.html">Dog Trainers</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 m_fLinks">
                        <h6>Dogs and Cats For Sale</h6>
                        <ul>
                            <li><a href="dog_pet.html?pet=Dog">British White Hair Dog for sale</a></li>
                            <li><a href="dog_pet.html?pet=Dog">Bengal for sale</a></li>
                            <li><a href="dog_pet.html?pet=Dog">French Bulldog for sale</a></li>
                            <li><a href="dog_pet.html?pet=Dog">Ragdoll for sale</a></li>
                            <li><a href="dog_pet.html?pet=Dog">Cockapoo for sale</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-6" style="position: relative;">
                    <img class="m_fDog" src="user-side/img/footer_dog.png" alt="">
                </div>
                <div class="col-lg-8 col-sm-6 m_fcon ">
                    <hr style="color: #9D9D9D;">
                    <div class="container m_cr ">
                        <p class="text-right">copyright 2024 ASK Project</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- link that opens popup -->
    <!-- JS here -->
    <script src="user-side/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="user-side/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="user-side/js/popper.min.js"></script>
    <script src="user-side/js/bootstrap.min.js"></script>
    <script src="user-side/js/owl.carousel.min.js"></script>
    <script src="user-side/js/isotope.pkgd.min.js"></script>
    <script src="user-side/js/ajax-form.js"></script>
    <script src="user-side/js/waypoints.min.js"></script>
    <script src="user-side/js/jquery.counterup.min.js"></script>
    <script src="user-side/js/imagesloaded.pkgd.min.js"></script>
    <script src="user-side/js/scrollIt.js"></script>
    <script src="user-side/js/jquery.scrollUp.min.js"></script>
    <script src="user-side/js/wow.min.js"></script>
    <script src="user-side/js/nice-select.min.js"></script>
    <script src="user-side/js/jquery.slicknav.min.js"></script>
    <script src="user-side/js/jquery.magnific-popup.min.js"></script>
    <script src="user-side/js/plugins.js"></script>
    <script src="user-side/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="user-side/js/contact.js"></script>
    <script src="user-side/js/jquery.ajaxchimp.min.js"></script>
    <script src="user-side/js/jquery.form.js"></script>
    <script src="user-side/js/jquery.validate.min.js"></script>
    <script src="user-side/js/mail-script.js"></script>

    <script src="user-side/js/main.js"></script>
    <script src="user-side/js/index.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    </script>
    <script>
        var search_bar = document.getElementById("m_searchIn");
        var li = document.getElementsByTagName("h1");
        search_bar.onkeyup = function () {
            var search_value = search_bar.value.toLowerCase();
            for (var l = 0; l < li.length; l++) {
                if (li[l].innerHTML.toLocaleLowerCase().search(search_value) == -1) {
                    li[l].style.display = 'none';
                } else {
                    li[l].style.display = 'block';
                }
            }
        }
    </script>

    <!-- otp input field -->
    <script>
        function moveToNext(input, event) {
            if (input.value.length >= input.maxLength) {
                let next = input.nextElementSibling;
                if (next && next.tagName === "INPUT") {
                    next.focus();
                }
            }
        }

        function isNumber(event) {
            var char = String.fromCharCode(event.which);
            if (!(/[0-9]/.test(char))) {
                event.preventDefault();
            }
        }
    </script>


    <!-- Tab -->
    <script>
        function showContent(id) {
            var allContent = document.querySelectorAll('.content_1');
            allContent.forEach(function (content) {
                content.classList.remove('active');
            });
            var selectedContent = document.getElementById('content' + id);
            selectedContent.classList.add('active');

            var allHeaders = document.querySelectorAll('.pd_header p');
            allHeaders.forEach(function (header) {
                header.classList.remove('active_p');
            });
            var selectedHeader = document.querySelector('.pd_header p:nth-child(' + id + ')');
            selectedHeader.classList.add('active_p');
        }
    </script>

    @stack('scripts')




</body>

</html>
