@extends('layouts.user_layout')
@section('content')
<!-- Products -->
<section class="ProductDataContainer ">
    <!-- Products Filter -->
    <div class="productFilterContainer">
        <div class="filterHeader">
            <h5>Filter</h5>
            <a class="clear" href="">Clear</a>
            <img class="filterCross" src="/user-side/images/cross.png">
        </div>
        <a class="clear" href="" id="a_pet">Dogs</a>
        <div class="filterDataContainer">
            <div class="filterData">
                <h4 class="filterParameter">Type of Listing</h4>
                <div class="filterParameterVariations ">
                    <div class="menu">
                        <a class="button m_lis1" onclick="toggleButton(this)" data-value="sale">For Sale</a>
                        <a class="button m_lis2" onclick="toggleButton(this)" data-value="adoption">For Adoption</a>
                        <a class="button m_lis3" onclick="toggleButton(this)" data-value="stud">For Stud</a>
                        <a class="button m_lis4" onclick="toggleButton(this)" data-value="wanted">Wanted</a>
                    </div>
                </div>
            </div>

            <div class="filterData">
                <h3 class="filterParameter">Breed</h3>
                <div class="filterParameterVariations">
                    <div class="addto-search mb-3">
                        <form action="#">
                            <div class="form-input m_sideSearch">
                                <i class="fa fa-search" style="color: #976239;"></i>
                                <input class="keyword" type="text" placeholder="Filter Breed"
                                    onkeyup="handleSearchBreed(event)">
                            </div>
                        </form>
                    </div>
                    <div class="addto-playlists">
                        <ul id="displaySubcategory" onclick="handleSubcategory(event)">
                            <li>
                                <label for="breed-1" class="playlist-name m_radio1">
                                    <input id="breed-1" type="radio" name="breed" value="" checked>
                                    All Breed
                                </label>
                            </li>
                            {{-- <li>
                                <label for="breed-2" class="playlist-name m_radio2">
                                    <input id="breed-2" type="radio" name="breed" value="affenpinscher">
                                    Affenpinscher
                                </label>
                            </li> --}}
                            @foreach ($breeds as $breed)
                            <li>
                                <label for="breed-2" class="playlist-name m_radio2">
                                    <input data-breed="{{$breed}}" type="radio" name="breed" value="affenpinscher">
                                    {{$breed}}
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="filterData">
                <h3 class="filterParameter">City/Region</h3>
                <div class="m_sBox d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <i class="fa-solid fa-location-dot"></i>
                        All of UK
                    </div>
                    <i class="fa-solid fa-location-crosshairs"></i>
                </div>
                <div>
                    <select
                        class="custom-select m_sBox d-flex align-items-center justify-content-between  ps-3  rounded-0"
                        onchange="handlecity(event)">
                        <option value="0">Nationwide</option>
                        <option value="london">London</option>
                        <option value="new york">New York</option>
                        <option value="Atlanta">Atlanta</option>
                        <option value="Chicago">Chicago</option>
                    </select>
                </div>
                <!-- <img src="img/arrow.svg" alt=""> -->
                <!-- </div> -->
            </div>

            <div class="filterData">
                <h3 class="filterParameter">Keyword </h3>
                <div class="">
                    <input class="keyword m_sbs" type="text" placeholder="Search (min. 3 characters)"
                        onkeyup="handleSearch(event)">
                </div>
                <div class="text-end text-secondary">
                    0/100
                </div>
            </div>

            <div class="filterData">
                <h3 class="filterParameter">Price</h3>
                <div class="d-flex gap-3 w-100">
                    <div class="form-input m_sideSearch m_price d-flex gap-2 align-items-center">
                        $
                        <input id="from" class="keyword" type="text" placeholder="From" oninput="handleprice()">
                    </div>
                    <div class="form-input m_sideSearch m_price d-flex gap-2 align-items-center">
                        $
                        <input id="to" class="keyword" type="text" placeholder="To" oninput="handleprice()">
                    </div>
                </div>
            </div>
            <div class="filterData">
                <h3 class="filterParameter">Advertiser Safety</h3>
                <div class="filterParameterVariations">
                    <ul>
                        <!-- <li>
                            <label for="breed-11" class="playlist-name m_radio11">
                                <input id="breed-11" type="radio" name="breed" value="anatolian-shepherd">
                                Anatolian Shepherd
                            </label>
                        </li> -->
                        <li>
                            <label for="as-1" class="playlist-name as1">
                                <input id="as-1" type="radio" name="breed" value="all-breed">
                                Only Council licensed breeders
                            </label>
                        </li>
                        <li>
                            <label for="as-2" class="playlist-name as2">
                                <input id="as-2" type="radio" name="breed" value="affenpinscher">
                                Only ID Verified breeders
                            </label>
                        </li>
                        <li>
                            <label for="as-3" class="playlist-name as3">
                                <input id="as-3" type="radio" name="breed" value="afghan-hound">
                                Only KC Assured breeders
                            </label>
                        </li>
                        <li>
                            <label for="as-4" class="playlist-name as4">
                                <input id="as-4" type="radio" name="breed" value="airedale-terrier">
                                Only KC registered dogs
                            </label>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="filterData">
                <h3 class="filterParameter">Age Range</h3>
                <div class="filterParameterVariations">
                    <ul onclick="handleAge(event)">
                        <li>
                            <label for="ar-1" class="playlist-name ar1">
                                <input id="ar-1" type="radio" name="age" value='3'>
                                0 - 3 Months
                            </label>
                        </li>
                        <li>
                            <label for="ar-2" class="playlist-name ar2">
                                <input id="ar-2" type="radio" name="age" value="12">
                                4 - 12 Months
                            </label>
                        </li>
                        <li>
                            <label for="ar-3" class="playlist-name ar3">
                                <input id="ar-3" type="radio" name="age" value="24">
                                1 - 2 Years
                            </label>
                        </li>
                        <li>
                            <label for="ar-4" class="playlist-name ar4">
                                <input id="ar-4" type="radio" name="age" value="60">
                                3 - 5 Years
                            </label>
                        </li>
                        <li>
                            <label for="ar-4" class="playlist-name ar5">
                                <input id="ar-4" type="radio" name="age" value="61">
                                Older than 5 Years
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="responsiveClear">
            <a class="resClear" href="">Clear All</a>
            <a class="resApply" href="">APPLY FILTERS</a>
        </div>
    </div>


    <!-- Responsive offcanvas sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRes" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="filterHeader">
                <h5>Filter</h5>
                <a class="clear" href="">Clear</a>
                <!-- <img class="filterCross" src="img/cross.png"> -->
            </div>
            <a class="clear" href="" id="a_pet1">{{$category->name}}</a>
            <div class="filterDataContainer">
                <div class="filterData">
                    <h4 class="filterParameter">Type of Listing</h4>
                    <div class="filterParameterVariations ">
                        <div class="menu">
                            <a class="button m_lis1  selected">For Sale</a>
                            <a class="button m_lis2 ">For Adoption</a>
                            <a class="button m_lis3 ">For Stud</a>
                            <a class="button m_lis4 ">Wanted</a>
                        </div>
                    </div>
                </div>

                <div class="filterData">
                    <h3 class="filterParameter">Breed</h3>
                    <div class="filterParameterVariations">
                        <div class="addto-search mb-3">
                            <form action="#">
                                <div class="form-input m_sideSearch">
                                    <i class="fa fa-search" style="color: #976239;"></i>
                                    <input class="keyword" type="text" placeholder="Filter Breed"
                                        onkeyup="handleSearchBreed(event)">
                                </div>
                            </form>
                        </div>
                        <div class="addto-playlists">
                            <ul id="displaySubcategory1" onclick="handleSubcategory(event)">
                                <li>
                                    <label for="breed-1" class="playlist-name m_radio1">
                                        <input id="breed-1" type="radio" name="breed" value="" checked>
                                        All Breed
                                    </label>
                                </li>
                                {{-- <li>
                                    <label for="breed-2" class="playlist-name m_radio2">
                                        <input id="breed-2" type="radio" name="breed" value="affenpinscher">
                                        Affenpinscher
                                    </label>
                                </li> --}}
                                @foreach ($breeds as $breed)
                                <li>
                                    <label for="breed-2" class="playlist-name m_radio2">
                                        <input data-breed="{{$breed}}" type="radio" name="breed" value="affenpinscher">
                                        {{$breed}}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="filterData">
                    <h3 class="filterParameter">City/Region</h3>
                    <div class="m_sBox d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <i class="fa-solid fa-location-dot"></i>
                            All of UK
                        </div>
                        <i class="fa-solid fa-location-crosshairs"></i>
                    </div>
                    <div class="m_sBox d-flex align-items-center justify-content-between ps-3">
                        <div>
                            Nationwide
                        </div>
                        <img src="/user-side/img/arrow.svg" alt="">
                    </div>
                </div>

                <div class="filterData">
                    <h3 class="filterParameter">Keyword </h3>
                    <div class="">
                        <input class="keyword m_sbs" type="text" placeholder="Search (min. 3 characters)"
                            onkeyup="handleSearch(event)">
                    </div>
                    <div class="text-end text-secondary">
                        0/100
                    </div>
                </div>

                <div class="filterData">
                    <h3 class="filterParameter">Price</h3>
                    <div class="d-flex gap-3 w-100">
                        <div class="form-input m_sideSearch m_price d-flex gap-2 align-items-center">
                            $
                            <input id="from1" class="keyword" type="text" placeholder="From"
                                oninput="handleprice()">
                        </div>
                        <div class="form-input m_sideSearch m_price d-flex gap-2 align-items-center">
                            $
                            <input id="to1" class="keyword" type="text" placeholder="To" oninput="handleprice()">
                        </div>
                    </div>
                </div>
                <div class="filterData">
                    <h3 class="filterParameter">Advertiser Safety</h3>
                    <div class="filterParameterVariations">
                        <ul>
                            <li>
                                <label for="as-1" class="playlist-name as1">
                                    <input id="as-1" type="radio" name="breed" value="all-breed">
                                    Only Council licensed breeders
                                </label>
                            </li>
                            <li>
                                <label for="as-2" class="playlist-name as2">
                                    <input id="as-2" type="radio" name="breed" value="affenpinscher">
                                    Only ID Verified breeders
                                </label>
                            </li>
                            <li>
                                <label for="as-3" class="playlist-name as3">
                                    <input id="as-3" type="radio" name="breed" value="afghan-hound">
                                    Only KC Assured breeders
                                </label>
                            </li>
                            <li>
                                <label for="as-4" class="playlist-name as4">
                                    <input id="as-4" type="radio" name="breed" value="airedale-terrier">
                                    Only KC registered dogs
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="filterData">
                    <h3 class="filterParameter">Age Range</h3>
                    <div class="filterParameterVariations">
                        <ul onclick="handleAge(event)">
                            <li>
                                <label for="ar-1" class="playlist-name ar1">
                                    <input id="ar-1" type="radio" name="age" value='3'>
                                    0 - 3 Months
                                </label>
                            </li>
                            <li>
                                <label for="ar-2" class="playlist-name ar2">
                                    <input id="ar-2" type="radio" name="age" value="12">
                                    4 - 12 Months
                                </label>
                            </li>
                            <li>
                                <label for="ar-3" class="playlist-name ar3">
                                    <input id="ar-3" type="radio" name="age" value="24">
                                    1 - 2 Years
                                </label>
                            </li>
                            <li>
                                <label for="ar-4" class="playlist-name ar4">
                                    <input id="ar-4" type="radio" name="age" value="60">
                                    3 - 5 Years
                                </label>
                            </li>
                            <li>
                                <label for="ar-4" class="playlist-name ar5">
                                    <input id="ar-4" type="radio" name="age" value="61">
                                    Older than 5 Years
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="responsiveClear">
                <a class="resClear" href="">Clear All</a>
                <a class="resApply" data-bs-dismiss="offcanvas" aria-label="Close">APPLY FILTERS</a>
            </div>
        </div>
    </div>


    <!-- All Products -->
    <div class="allProducts">
        <div class="sortContainer">
            <!-- Products Filter:Responsive -->
            <div class="responsiveFilterContainer" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRes"
                aria-controls="offcanvasExample">
                <img src="/user-side/img/filter.png">
                <span>FILTER</span>
            </div>
            <div class="m_prTitl">
                <h3 id="pet_sal">{{$category->name}} for Sale</h3>
                <p id="pet_itme">{{count($pets)}} {{$category->name}} For Sale</p>
            </div>
            <div class="sort">
                <!-- <h5 style="margin-bottom: 0;">Sort By: &nbsp</h5> -->
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"
                        style="color: #976239 !important; background-color: transparent !important;border: none !important;font-weight: 500; box-shadow: 0px 0px 24px 4px #dbbf8f4d;">
                        Sort by <span id="selected-sort"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item dropdown-sort" href="#" data-sort-value="all">latest</a></li>
                        <li><a class="dropdown-item dropdown-sort" href="#" data-sort-value="Discount">Discount</a>
                        </li>
                        <li><a class="dropdown-item dropdown-sort" href="#" data-sort-value="Featured">Featured</a>
                        </li>
                        <li><a class="dropdown-item dropdown-sort" href="#" data-sort-value="lh">Price: Low to
                                High</a></li>
                        <li><a class="dropdown-item dropdown-sort" href="#" data-sort-value="hl">Price: High to
                                Low</a></li>
                        <li><a class="dropdown-item dropdown-sort" href="#" data-sort-value="ct">Customer Rating</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="m_prTitl2">
            <h3 class="mb-0" id="pet_sal1">{{$category->name}} for Sale</h3>
            <p id="pet_itme1">{{count($pets)}} {{$category->name}} For Sale</p>
        </div>
        <div class="productContainer row" id="displayPet">

            @foreach ($pets as $pet)
            @php
                $files = explode(',', $pet->image);
            @endphp
            <a data-breed="{{$pet->breed}}" class="ProductWrapper p1 col-sm-6 col-lg-4" href="/viewpet/{{$pet->id}}">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="/images/{{$files[0]}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <p>{{$pet->breed}}</p>
                        <h5>{{$pet->name}}</h5>
                        <div class="m_pcon d-flex justify-content-between">
                            <span>{{$pet->place}}</span>
                            <p>₹ {{$pet->price}}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            {{-- <a class="ProductWrapper p1 col-sm-6 col-lg-4" href="dog_view.html">
                <div class="product">
                    <i class="fa-regular fa-heart m_wishIc"></i>
                    <div class="productImage">
                        <img src="/user-side/img/dog1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="productDetail">
                        <p>British White Hair Dog Reteiever</p>
                        <h5>White Retriever</h5>
                        <div class="m_pcon d-flex justify-content-between">
                            <span>London</span>
                            <p>$ 200.00</p>
                        </div>
                    </div>
                </div>
            </a> --}}

        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="js/pet.js"></script>
<script>
    var button = document.getElementsByClassName("button");

    var addSelectClass = function () {
        removeSelectClass();
        this.classList.add('selected');
    }

    var removeSelectClass = function () {
        for (var i = 0; i < button.length; i++) {
            button[i].classList.remove('selected')
        }
    }
    for (var i = 0; i < button.length; i++) {
        button[i].addEventListener("click", addSelectClass);
    }
</script>
@endpush
