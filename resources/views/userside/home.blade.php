@extends('layouts.user_layout')
@section('content')
<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
            <div class="container">
                <div class="m_herTxt">
                    <h1>Bring Us <span style="color: #321B16;">Home</span></h1>
                    <p>Find Your Furry Friend Adopt, Love and Make a Forever <br>Home!</p>
                    <a href="user-side/contact_us.html"><span>Contact Us</span> &nbsp; <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_2">
            <div class="container">
                <div class="m_herTxt">
                    <h1>Meet Your Next <br>Pet</h1>
                    <p>Find Your Furry Friend Adopt, Love and Make a Forever <br>Home!</p>
                    <a href="user-side/contact_us.html"><span>Contact Us</span> &nbsp; <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_3">
            <div class="container">
                <div class="m_herTxt">
                    <h1>Do You Have A Pet?</h1>
                    <p>Search between thousands of pets looking for loving homes.</p>
                    <a href="user-side/contact_us.html"><span>Contact Us</span> &nbsp; <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- slider_area_end -->

<!-- Category start -->
<section class="m_caCo">
    <img src="user-side/img/paw-h1.png" alt="" class="m_paw1">
    <div class="container">
        <h3 class="m_titl ">Shop By Categories</h3>
        <div class="m_category row">
            @foreach ($category as $cat)
            <a href="/pet/{{$cat->id}}" class="m_subCategory col-xl-2 col-sm-4  col-6">
                <img src="images/{{$cat->image}}" alt="">
                <p>{{$cat->name}}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>
<!-- Category end -->

<!-- Recommended for you start -->
<section class="container">
    <h3 class="m_titl mb-0">Recommended for you</h3>
    <div class="m_recCo">
        <img src="user-side/img/paw-h2.png" alt="" class="m_paw2">
        <div class="m_rec " id="recommended">
            @foreach ($pets as $pet)
            <a class="ProductWrapper " href="/viewpet/{{$pet->id}}">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="/images/{{$pet->image}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <p class="m_prPre">{{$pet->breed}}</p>
                        <h5 class="m_prTtl">{{$pet->name}}</h5>
                        <div class="m_pcon d-flex justify-content-between">
                            <span>{{$pet->place}}</span>
                            <p class="mb-0">$ 200.00</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            {{-- <a class="ProductWrapper " href="user-side/dog_view.html">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="user-side/img/dog1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <p class="m_prPre">British White Hair Dog Reteiever</p>
                        <h5 class="m_prTtl">White Retriever</h5>
                        <div class="m_pcon d-flex justify-content-between">
                            <span>London</span>
                            <p class="mb-0">$ 200.00</p>
                        </div>
                    </div>
                </div>
            </a> --}}
        </div>
    </div>
</section>
<!-- Recommended for you End -->

<!-- Templet 1 Start -->
<section class="container">
    <div class="row" style="margin-top: 50px !important;">
        <div class="col-md-6">
            <div class="m_tmp1Left">
                <p class="m_tmpPreH mb-0">Flat 30% Discount</p>
                <h4 class="m_tmpH">100% Organic Pet<br>Food</h4>
                <a href="dog_accessories.html?search=Food" class="m_tmpBtn ">Shop Now</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="m_tmp1Right">
                <p class="m_tmpPreH mb-0">Your Pet Happy</p>
                <h4 class="m_tmpH">Adopt A Pet <br>Don’t Stop!</h4>
                <a href="" class="m_tmpBtn ">Shop Now</a>
            </div>
        </div>
    </div>
</section>
<!-- Templet 1 End -->

<!-- Templet 2 Start -->
<section class="m_temp2Con">
    <div class="container">
        <div class="m_wid">
            <h5>Need help? We’re here to provide a safe start to your lifelong friendship</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at fermentum magna. Vestibulum ultrices
                augue et sem consectetur fermentum. Pellentesque tempus tincidunt consectetur. </p>
            <div class=" m_tBtn d-flex gap-2">
                <div class="m_tmp2b1">
                    <a href="">Learn more about pet safety</a>
                </div>
                <div class="m_tmpDog">
                    <img class="m_reDog" src="user-side/img/tmp2Dog.png" alt="">
                    <a href="">I need help</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Templet 2 End -->

<!-- Essential Accessories & Supplies start -->
<section class="container" style="margin-top: 80px;">
    <h3 class="m_titl " style="margin-bottom: 0;">Essential Accessories & Supplies</h3>
    <div class="m_recCo">
        <div class="m_rec ">
            @foreach ($products as $product)
            <a class="ProductWrapper " href="/product/{{$product->id}}">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="/images/{{$product->image}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <h6 class="m_Ttl">{{$product->name}}</h6>
                    </div>
                </div>
            </a>
            @endforeach
            {{-- <a class="ProductWrapper " href="dog_accessories.html?search=Food">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="user-side/img/ha1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <h6 class="m_Ttl">Food Products</h6>
                    </div>
                </div>
            </a> --}}
        </div>
    </div>

</section>
<!-- Essential Accessories & Supplies End -->

<!-- Popular Cat Breeds start -->
<div class="m_pr" style="position: relative;">
    <img src="user-side/img/paw-h3.png" alt="" class="m_paw3">
    <section class="container" style="margin-top: 80px;">
        <h3 class="m_titl " style="margin-bottom: 0;">Popular Cat Breeds</h3>
        <div class="m_recCo">
            <div class="m_rec " id="popularcat">
                <a class="ProductWrapper " href="dog_view.html">
                    <div class="product">
                        <i class="fa-regular fa-heart m_wishIc"></i>
                        <div class="productImage">
                            <img src="user-side/img/hc1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="productDetail">
                            <h6 class="m_Ttl">Ragdoll</h6>
                        </div>
                    </div>
                </a>
                <a class="ProductWrapper " href="dog_view.html">
                    <div class="product">
                        <i class="fa-regular fa-heart m_wishIc"></i>
                        <div class="productImage">
                            <img src="user-side/img/hc2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="productDetail">
                            <h6 class="m_Ttl">Russian Blue</h6>
                        </div>
                    </div>
                </a>
                <a class="ProductWrapper " href="dog_view.html">
                    <div class="product">
                        <i class="fa-regular fa-heart m_wishIc"></i>
                        <div class="productImage">
                            <img src="user-side/img/hc3.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="productDetail">
                            <h6 class="m_Ttl">American Curl</h6>
                        </div>
                    </div>
                </a>
                <a class="ProductWrapper " href="dog_view.html">
                    <div class="product">
                        <i class="fa-regular fa-heart m_wishIc"></i>
                        <div class="productImage">
                            <img src="user-side/img/hc4.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="productDetail">
                            <h6 class="m_Ttl">Khao Manee</h6>
                        </div>
                    </div>
                </a>
                <a class="ProductWrapper " href="dog_view.html">
                    <div class="product">
                        <i class="fa-regular fa-heart m_wishIc"></i>
                        <div class="productImage">
                            <img src="user-side/img/hc5.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="productDetail">
                            <h6 class="m_Ttl">British Shorthair</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>
<!-- Popular Cat Breeds End -->

<!-- Popular Dog Breeds start -->
<section class="container" style="margin-top: 80px;">
    <h3 class="m_titl " style="margin-bottom: 0;">Popular Dog Breeds</h3>
    <div class="m_recCo">
        <div class="m_rec " id="populardog">
            <a class="ProductWrapper " href="dog_view.html">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="user-side/img/hd1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <h6 class="m_Ttl">German Shepherd</h6>
                    </div>
                </div>
            </a>
            <a class="ProductWrapper " href="dog_view.html">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="user-side/img/hd2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <h6 class="m_Ttl">Poodle</h6>
                    </div>
                </div>
            </a>
            <a class="ProductWrapper " href="dog_view.html">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="user-side/img/hd3.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <h6 class="m_Ttl">Bulldog</h6>
                    </div>
                </div>
            </a>
            <a class="ProductWrapper " href="dog_view.html">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="user-side/img/hd4.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <h6 class="m_Ttl">Pomeranian</h6>
                    </div>
                </div>
            </a>
            <a class="ProductWrapper " href="dog_view.html">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="user-side/img/hd5.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <h6 class="m_Ttl">Belgian Shepherd</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
<!-- Popular Dog Breeds End -->

<!-- Pet cards Start -->
<section class="container">
    <div class="row" style="margin:70px 0 !important;">
        <div class="col-lg-6">
            <div class="m_cardCon">
                <img class="m_cardPaw1" src="user-side/img/ph_c1.png" alt="">
                <div class="caTtl ">
                    <img src="user-side/img/card1.svg" alt="">
                    <h6>Puppies for sale</h6>
                </div>
                <div class="m_cabody">
                    <ul>
                        <li><a href="#">Border Collie for sale</a></li>
                        <li><a href="#">Cavapoo for sale</a></li>
                        <li><a href="#">Chihuahua for sale</a></li>
                        <li><a href="#">Chockapoo for sale</a></li>
                        <li><a href="#">Cocker Spaniel for sale</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Border Collie for sale</a></li>
                        <li><a href="#">Cavapoo for sale</a></li>
                        <li><a href="#">Chihuahua for sale</a></li>
                        <li><a href="#">Chockapoo for sale</a></li>
                        <li><a href="#">Cocker Spaniel for sale</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="m_cardCon">
                <img class="m_cardPaw2" src="user-side/img/ph_c2.png" alt="">
                <div class="caTtl ">
                    <img src="user-side/img/card2.svg" alt="">
                    <h6>Kittens and cats for sale</h6>
                </div>
                <div class="m_cabody">
                    <ul>
                        <li><a href="#">Bengal for sale</a></li>
                        <li><a href="#">British Shorthair for sale</a></li>
                        <li><a href="#">Maine Coon for sale</a></li>
                        <li><a href="#">Mixed Breed for sale</a></li>
                        <li><a href="#">Persian for sale</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Ragdoll for sale</a></li>
                        <li><a href="#">Savannah for sale</a></li>
                        <li><a href="#">Scottish Fold for sale</a></li>
                        <li><a href="#">Siamese for sale</a></li>
                        <li><a href="#">Sphynx for sale</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="m_cardCon">
                <img class="m_cardPaw3" src="user-side/img/ph_c3.png" alt="">
                <div class="caTtl ">
                    <img src="user-side/img/card3.svg" alt="">
                    <h6>Horses for sale</h6>
                </div>
                <div class="m_cabody">
                    <ul>
                        <li><a href="#">American Quarter for sale</a></li>
                        <li><a href="#">Andalusian for sale</a></li>
                        <li><a href="#">Appaloosa for sale</a></li>
                        <li><a href="#">Arabian horse for sale </a></li>
                        <li><a href="#">Connemara for sale</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Irish Draught for sale</a></li>
                        <li><a href="#">Morgan for sale</a></li>
                        <li><a href="#">Palomino for sale</a></li>
                        <li><a href="#">Shettand pony for sale</a></li>
                        <li><a href="#">Welsh Section A for sale</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="m_cardCon">
                <img class="m_cardPaw4" src="user-side/img/ph_c4.png" alt="">
                <div class="caTtl ">
                    <img src="user-side/img/card4.svg" alt="">
                    <h6>Services</h6>
                </div>
                <div class="m_cabody">
                    <ul>
                        <li><a href="#">Cat Daycare</a></li>
                        <li><a href="#">Cat Grooming/Care</a></li>
                        <li><a href="#">Cat Training</a></li>
                        <li><a href="#">Dog Boarding</a></li>
                        <li><a href="#">Dog Daycare</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Dog Grooming/Care</a></li>
                        <li><a href="#">Dog Training</a></li>
                        <li><a href="#">Dog Walking</a></li>
                        <li><a href="#">Horse Share</a></li>
                        <li><a href="#">Horse Training</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="m_cardCon">
                <img class="m_cardPaw5" src="user-side/img/ph_c5.png" alt="">
                <div class="caTtl ">
                    <img src="user-side/img/card5.svg" alt="">
                    <h6>Other pets for sale</h6>
                </div>
                <div class="m_cabody">
                    <ul>
                        <li><a href="#">Birds for sale</a></li>
                        <li><a href="#">Fish for sale</a></li>
                        <li><a href="#">Invertebrates for sale</a></li>
                        <li><a href="#">Livestock for sale</a></li>
                        <li><a href="#">Poultry for sale</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Rabbits for sale</a></li>
                        <li><a href="#">Reptiles for sale</a></li>
                        <li><a href="#">Rodents pony for sale</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="m_cardCon">
                <img class="m_cardPaw6" src="user-side/img/ph_c6.png" alt="">
                <div class="caTtl ">
                    <img src="user-side/img/card6.svg" alt="">
                    <h6>Accessories for sale</h6>
                </div>
                <div class="m_cabody">
                    <ul>
                        <li><a href="#">Cat Beds for sale</a></li>
                        <li><a href="#">Cat Food & Treats for sale</a></li>
                        <li><a href="#">Cat Toys for sale</a></li>
                        <li><a href="#">Dog Beds for sale</a></li>
                        <li><a href="#">Dog Food & Treats for sale</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Dog Harnesses for sale</a></li>
                        <li><a href="#">Dog Toys for sale</a></li>
                        <li><a href="#">Horse Accessories for sale</a></li>
                        <li><a href="#">Horse Rider Clothing for sale</a></li>
                        <li><a href="#">Horse Rider Equipment for sale</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pet cards Start -->

<!-- Tabs Start -->
<section class="container">
    <div class="m_tabCon">
        <div class="pd_header d-flex flex-wrap">
            <p onclick="showContent(1)" class="active_p">Dogs for sale</p>
            <p onclick="showContent(2)">Cats for sale</p>
            <p onclick="showContent(3)">Cities</p>
            <p onclick="showContent(4)">Articles</p>
        </div>
        <div id="content1" class="content_1 active">
            <h6 class="m_tabTtl">Most popular dog breeds</h6>
            <div class="row">
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Akita for sale</a></li>
                        <li><a href="#">American Bulldog for sale</a></li>
                        <li><a href="#">American Bully for sale</a></li>
                        <li><a href="#">Beagle for sale</a></li>
                        <li><a href="#">Beagle Shepherd dog for sale</a></li>
                        <li><a href="#">Bichon Frise for sale</a></li>
                        <li><a href="#">Border Collie for sale</a></li>
                        <li><a href="#">Border Terrier for sale</a></li>
                        <li><a href="#">Boxer for sale</a></li>
                        <li><a href="#">Cane Corso for sale</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Akita for sale</a></li>
                        <li><a href="#">American Bulldog for sale</a></li>
                        <li><a href="#">American Bully for sale</a></li>
                        <li><a href="#">Beagle for sale</a></li>
                        <li><a href="#">Beagle Shepherd dog for sale</a></li>
                        <li><a href="#">Bichon Frise for sale</a></li>
                        <li><a href="#">Border Collie for sale</a></li>
                        <li><a href="#">Border Terrier for sale</a></li>
                        <li><a href="#">Boxer for sale</a></li>
                        <li><a href="#">Cane Corso for sale</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Akita for sale</a></li>
                        <li><a href="#">American Bulldog for sale</a></li>
                        <li><a href="#">American Bully for sale</a></li>
                        <li><a href="#">Beagle for sale</a></li>
                        <li><a href="#">Beagle Shepherd dog for sale</a></li>
                        <li><a href="#">Bichon Frise for sale</a></li>
                        <li><a href="#">Border Collie for sale</a></li>
                        <li><a href="#">Border Terrier for sale</a></li>
                        <li><a href="#">Boxer for sale</a></li>
                        <li><a href="#">Cane Corso for sale</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Akita for sale</a></li>
                        <li><a href="#">American Bulldog for sale</a></li>
                        <li><a href="#">American Bully for sale</a></li>
                        <li><a href="#">Beagle for sale</a></li>
                        <li><a href="#">Beagle Shepherd dog for sale</a></li>
                        <li><a href="#">Bichon Frise for sale</a></li>
                        <li><a href="#">Border Collie for sale</a></li>
                        <li><a href="#">Border Terrier for sale</a></li>
                        <li><a href="#">Boxer for sale</a></li>
                        <li><a href="#">Cane Corso for sale</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-12">
                    <ul>
                        <li><a href="#">Akita for sale</a></li>
                        <li><a href="#">American Bulldog for sale</a></li>
                        <li><a href="#">American Bully for sale</a></li>
                        <li><a href="#">Beagle for sale</a></li>
                        <li><a href="#">Beagle Shepherd dog for sale</a></li>
                        <li><a href="#">Bichon Frise for sale</a></li>
                        <li><a href="#">Border Collie for sale</a></li>
                        <li><a href="#">Border Terrier for sale</a></li>
                        <li><a href="#">Boxer for sale</a></li>
                        <li><a href="#">Cane Corso for sale</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="content2" class="content_1">
            <h6 class="m_tabTtl">Most popular cat breeds</h6>
            <div class="row">
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Abyssinian for sale</a></li>
                        <li><a href="#">American Shorthair for sale</a></li>
                        <li><a href="#">Balinese forsale</a></li>
                        <li><a href="#">Bengal for sale</a></li>
                        <li><a href="#">Birman for sale</a></li>
                        <li><a href="#">Bombay for sale</a></li>
                        <li><a href="#">British Longhair for sale</a></li>

                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">British Shorthair for sale</a></li>
                        <li><a href="#">Burmese for sale</a></li>
                        <li><a href="#">Cornish Rex for sale</a></li>
                        <li><a href="#">Devon Rex for sale</a></li>
                        <li><a href="#">Egyptian Mau for sale</a></li>
                        <li><a href="#">Exotic for sale</a></li>
                        <li><a href="#">Himalayan for sale</a></li>

                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Keetso for sale</a></li>
                        <li><a href="#">Maine Coon for sale</a></li>
                        <li><a href="#">Manx for sale</a></li>
                        <li><a href="#">Mixed Breed for sale</a></li>
                        <li><a href="#">Munchkin for sale</a></li>
                        <li><a href="#">Norwegian Forest Cat for sale</a></li>
                        <li><a href="#">Oriental for sale</a></li>

                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Persian for sale</a></li>
                        <li><a href="#">RagaMuffin for sale</a></li>
                        <li><a href="#">Ragdoll for sale</a></li>
                        <li><a href="#">Russian Blue for sale</a></li>
                        <li><a href="#">Savannah for sale</a></li>
                        <li><a href="#">Scottish Fold for sale</a></li>
                        <li><a href="#">Selkirk Rex for sale</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-12">
                    <ul>
                        <li><a href="#">Siamese for sale</a></li>
                        <li><a href="#">Siberian for sale</a></li>
                        <li><a href="#">Snowshoe for sale</a></li>
                        <li><a href="#">Sphynx for sale</a></li>
                        <li><a href="#">Tonkinese for sale</a></li>
                        <li><a href="#">Turkish Angora for sale</a></li>
                        <li><a href="#">Turkish Van for sale</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="content3" class="content_1">
            <h6 class="m_tabTtl">Most popular cities</h6>
            <div class="row">
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Kittens and cats for sale in Barnsley</a></li>
                        <li><a href="#">Kittens and cats for sale in Bournemouth</a></li>
                        <li><a href="#">Kittens and cats for sale in Brighton</a></li>
                        <li><a href="#">Kittens and cats for sale in Cambridge</a></li>
                        <li><a href="#">Kittens and cats for sale in Edinburgh</a></li>
                        <li><a href="#">Kittens and cats for sale in Exeter</a></li>
                        <li><a href="#">Kittens and cats for sale in Glasgow</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Kittens and cats for sale in Hull</a></li>
                        <li><a href="#">Kittens and cats for sale in London</a></li>
                        <li><a href="#">Kittens and cats for sale in Manchester</a></li>
                        <li><a href="#">Kittens and cats for sale in Newcastle upon Tyne</a></li>
                        <li><a href="#">Kittens and cats for sale in Norwich</a></li>
                        <li><a href="#">Kittens and cats for sale in Nottingham</a></li>
                        <li><a href="#">Kittens and cats for sale in Oxford</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Kittens and cats for sale in Portsmouth</a></li>
                        <li><a href="#">Kittens and cats for sale in Reading</a></li>
                        <li><a href="#">Kittens and cats for sale in Sunderland</a></li>
                        <li><a href="#">Kittens and cats for sale in Swindon</a></li>
                        <li><a href="#">Kittens and cats for sale in Worcester</a></li>
                        <li><a href="#">Kittens and cats for sale in York</a></li>
                        <li><a href="#">Puppies for sale in Barnsley</a></li>
                        <li><a href="#">Puppies for sale in Bournemouth</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Puppies for sale in Brighton</a></li>
                        <li><a href="#">Puppies for sale in Cambridge</a></li>
                        <li><a href="#">Puppies for sale in Edinburgh</a></li>
                        <li><a href="#">Puppies for sale in Exeter</a></li>
                        <li><a href="#">Puppies for sale in Glasgow</a></li>
                        <li><a href="#">Puppies for sale in Hull</a></li>
                        <li><a href="#">Puppies for sale in London</a></li>
                        <li><a href="#">Puppies for sale in Manchester</a></li>
                        <li><a href="#">Puppies for sale in Newcastle upon Tyne</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-12">
                    <ul>
                        <li><a href="#">Puppies for sale in Norwich</a></li>
                        <li><a href="#">Puppies for sale in Nottingham</a></li>
                        <li><a href="#">Puppies for sale in Oxford</a></li>
                        <li><a href="#">Puppies for sale in Portsmouth</a></li>
                        <li><a href="#">Puppies for sale in Reading</a></li>
                        <li><a href="#">Puppies for sale in Sunderland</a></li>
                        <li><a href="#">Puppies for sale in Swindon</a></li>
                        <li><a href="#">Puppies for sale in Worcester</a></li>
                        <li><a href="#">Puppies for sale in York</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="content4" class="content_1">
            <h6 class="m_tabTtl">Article categories</h6>
            <div class="row">
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Birds</a></li>
                        <li><a href="#">Breeding</a></li>
                        <li><a href="#">Cats</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Dogs</a></li>
                        <li><a href="#">Fish</a></li>
                        <li><a href="#">Horses</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Industry Report</a></li>
                        <li><a href="#">Invertebrates</a></li>
                        <li><a href="#">Livestock</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-6">
                    <ul>
                        <li><a href="#">Poultry</a></li>
                        <li><a href="#">Rabbits</a></li>
                        <li><a href="#">Reptiles</a></li>
                    </ul>
                </div>
                <div class="col-xl col-lg-4 col-md-12">
                    <ul>
                        <li><a href="#">Rodents</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabs End -->
@endsection
