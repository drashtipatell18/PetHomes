@php
    use Carbon\Carbon;

    // Assuming $model is the model instance with a created_at timestamp
    $createdAt = $admin->created_at;
    $currentDate = Carbon::now();
    $yearsDifference = $currentDate->diffInYears($createdAt);
@endphp
@extends('layouts.user_layout')
@section('content')

<!-- slider pet section -->
<section class="j_main m_hedPad">
    <div class="j_main_iner">
        <div class="j_imges_sec">
            <div class="j_image_slider">
                <div class="j_thumbnails" id="display_thumb">
                    @php
                        $files = explode(',', $pet->image);
                    @endphp
                    @foreach ($files as $file)
                    <img src="/images/{{$file}}" onclick="showImage('/images/{{$file}}')" alt="Image 1">
                    @endforeach
                    {{-- <img src="/user-side/img/pet1.png" onclick="showImage('/user-side/img/pet1.png')" alt="Image 1">
                    <img src="/user-side/img/pet2.png" onclick="showImage('/user-side/img/pet2.png')" alt="Image 2">
                    <img src="/user-side/img/pet3.png" onclick="showImage('/user-side/img/pet3.png')" alt="Image 3">
                    <img src="/user-side/img/pet4.png" onclick="showImage('/user-side/img/pet4.png')" alt="Image 3">
                    <img src="/user-side/img/pet5.png" onclick="showImage('/user-side/img/pet5.png')" alt="Image 3">
                    <img src="/user-side/img/pet6.png" onclick="showImage('/user-side/img/pet6.png')" alt="Image 3"> --}}
                </div>

                <div class="j_main_image">
                    <div class="j_icon">
                        <i class="fa-regular fa-heart" onclick="toggleWishlist('/user-side/img/pet1.png', this)"></i>
                    </div>
                    <img id="j_mainImage" src="/images/{{$files[0]}}" alt="Main Image">
                </div>
            </div>
        </div>
        <div class="j_petInfo">
            <div class="j_head">
                <h4>{{$pet->breed}}</h4>
                <h6 id="a_name">{{$pet->name}}</h6>
            </div>

            <p class="j_pet_price" id="a_price">₹ {{$pet->price}}</p>
            <div class="j_details">
                <div class="j_info">
                    <div class="j_pro">
                        <img src="/images/{{$admin->image}}" alt="pro">
                        <div>
                            <h5>{{$admin->name}}</h5>
                            <p>
                                <i class="bi bi-geo-alt-fill"></i><span>{{$admin->address}}</span>
                            </p>
                        </div>
                    </div>
                    <p>Member Since : {{$yearsDifference}} Years</p>
                    {{-- <div class="j_about">
                        <p><i class="bi bi-clock"></i><span>30 Minutes</span></p>
                        <p><i class="bi bi-star-fill"></i> <span>4.9</span></p>
                    </div> --}}
                    <hr>
                    <div class="j_veri">
                        <p>Verified By : </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i><span>Phone</span></li>
                            <li><i class="bi bi-x-circle"></i><span>Email</span></li>
                            <li><i class="bi bi-x-circle"></i><span>Facebook</span></li>
                            <li><i class="bi bi-x-circle"></i><span>Google</span></li>
                        </ul>
                    </div>
                    <hr>
                    <div class="j_share">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            class="j_button">

                            <p class="p_share"><i class="bi bi-share"></i><span>Share Adverts</span></p>
                        </button>
                        <p class="shre_report"><i class="bi bi-exclamation-triangle"></i><span>Report Adverts</span>
                        </p>
                    </div>
                    <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Share on</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="j_share_Link">
                                        <div>
                                            <img src="/user-side/img/whatsaap.png" alt="">
                                            <p>Whatsapp</p>
                                        </div>
                                        <div>
                                            <img src="/user-side/img/telegram.png" alt="">
                                            <p>Telegram</p>
                                        </div>
                                        <div>
                                            <img src="/user-side/img/insta.png" alt="">
                                            <p>Messages</p>
                                        </div>
                                        <div style="cursor: pointer">
                                            <img onclick="copyToClipboard()" src="/user-side/img/share.png" alt="">
                                            <p>Copy Link</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="">
                <p class="j_pet_message"><i class="bi bi-chat-dots-fill"></i>Message</p>
            </a>
        </div>
    </div>
</section>

<!-- pet details section -->
<section class="j_main_details">
    <div class="j_inner_details">
        <h2>Details</h2>
        <div class="j_pet_details1">
            <div class="j_deta1">
                <ul id="a_breed">
                    <li>
                        <div class="j_inDetail ">
                            <div class="column1">Breed</div>
                            <div class="column2">:</div>
                            <div class="column3">{{$pet->breed}}</div>
                        </div>
                    </li>
                    {{-- <li>
                        <div class="j_inDetail">
                            <div class="column1">Views</div>
                            <div class="column2">:</div>
                            <div class="column3">30</div>
                        </div>
                    </li> --}}
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">Adv.ID</div>
                            <div class="column2">:</div>
                            <div class="column3">{{$pet->id}}</div>
                        </div>
                    </li>
                    <li id="a_age">
                        <div class="j_inDetail">
                            <div class="column1">Pet Age</div>
                            <div class="column2">:</div>
                            <div class="column3">{{$pet->age}}</div>
                        </div>
                    </li>
                    {{-- <li>
                        <div class="j_inDetail">
                            <div class="column1">Favourites</div>
                            <div class="column2">:</div>
                            <div class="column3">20</div>
                        </div>
                    </li>
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">Advert Type</div>
                            <div class="column2">:</div>
                            <div class="column3">For Sale</div>
                        </div>
                    </li> --}}
                    {{-- <li>
                        <div class="j_inDetail">
                            <div class="column1">Pets in Litter</div>
                            <div class="column2">:</div>
                            <div class="column3">2 Male, 2 Female</div>
                        </div>
                    </li> --}}
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">Pet Available</div>
                            <div class="column2">:</div>
                            <div class="column3">{{$pet->created_at}}</div>
                        </div>
                    </li>
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">Adv. Location</div>
                            <div class="column2">:</div>
                            <div class="column3">{{$pet->place}}</div>
                        </div>
                    </li>
                </ul>
            </div>


            <div class="j_deta2">
                <ul>
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">Health Checked</div>
                            <div class="column2">:</div>
                            <div class="column3">Yes</div>
                        </div>
                    </li>
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">Original Breeder</div>
                            <div class="column2">:</div>
                            <div class="column3">Yes</div>
                        </div>
                    </li>
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">Warm and Flea treated</div>
                            <div class="column2">:</div>
                            <div class="column3">Yes</div>
                        </div>
                    </li>
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">Vaccination Up to Date</div>
                            <div class="column2">:</div>
                            <div class="column3">Yes</div>
                        </div>
                    </li>
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">Pet Viewable with Mother</div>
                            <div class="column2">:</div>
                            <div class="column3">Yes</div>
                        </div>
                    </li>
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">KC Registered by Collection</div>
                            <div class="column2">:</div>
                            <div class="column3">Yes</div>
                        </div>
                    </li>
                    <li>
                        <div class="j_inDetail">
                            <div class="column1">Microchipped by collection date</div>
                            <div class="column2">:</div>
                            <div class="column3">Yes</div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <hr>
    </div>
</section>

<!-- Description section -->
<section class="j_main_des">
    <div class="j_des">
        <h2>Description</h2>
        <p id="a_description">{{$pet->health_info}}</p>
    </div>
</section>

<!-- slimilar Adverts -->
<section class="j_main_similar">
    <div class="j_simi">
        <h2>Similar Adverts</h2>
        <div class="productContainer row" id="similar">
            {{-- <a class="ProductWrapper p9 col-sm-6 col-md-4 col-lg-3" href="dog_view.html">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="img/dog9.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <p>British White Hair Dog Reteiever</p>
                        <h5>Maltipoo</h5>
                        <div class="m_pcon d-flex justify-content-between">
                            <span>USA</span>
                            <p>$ 50.00</p>
                        </div>
                    </div>
                </div>
            </a> --}}
            @foreach ($similars as $similar)

            @php
                $files = explode(',', $similar->image);
            @endphp
            <a class="ProductWrapper p9 col-sm-6 col-md-4 col-lg-3" href="/viewpet/{{$similar->id}}">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="/images/{{$files[0]}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <p>{{$similar->breed}}</p>
                        <h5>{{$similar->name}}</h5>
                        <div class="m_pcon d-flex justify-content-between">
                            <span>{{$similar->place}}</span>
                            <p>₹ {{$similar->price}}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script src="/user-side/js/hamburger.js"></script>
<script src="/user-side/js/products.js"></script>
<script src="/user-side/js/detailspage.js"></script>
<script>
    function copyToClipboard() {
        const url = window.location.href; // Gets the current page URL
        navigator.clipboard.writeText(url).then(function() {
            alert('URL copied to clipboard');
        }, function(err) {
            alert('Failed to copy URL');
            console.error('Error:', err);
        });
    }
</script>
@endpush
