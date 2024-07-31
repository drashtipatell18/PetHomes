let petdata;
let accdata;
let serdata;
let alldata = '';
let wishlist;

const getdata = async () => {


    const response = await fetch('http://localhost:3000/pet');
    if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    petdata = await response.json();

    const responsea = await fetch('http://localhost:3000/Accessories');
    if (!responsea.ok) {
        throw new Error(`HTTP error! status: ${responsea.status}`);
    }
    accdata = await responsea.json();

    const responses = await fetch('http://localhost:3000/Services');
    if (!responses.ok) {
        throw new Error(`HTTP error! status: ${responses.status}`);
    }
    serdata = await responses.json();



    const params = new URLSearchParams(window.location.search);
    const page = params.get('page');
    const id = params.get('id');

    if (page == 'pet') {
        const response = await fetch('http://localhost:3000/pet');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        alldata = await response.json();
    } else if (page == 'accessories') {

        const responsea = await fetch('http://localhost:3000/Accessories');
        if (!responsea.ok) {
            throw new Error(`HTTP error! status: ${responsea.status}`);
        }
        alldata = await responsea.json();
    } else if (page == 'services') {
        const responses = await fetch('http://localhost:3000/Services');
        if (!responses.ok) {
            throw new Error(`HTTP error! status: ${responses.status}`);
        }
        alldata = await responses.json();
    }

    const responsew = await fetch('http://localhost:3000/wishlist');
    if (!responsew.ok) {
        throw new Error(`HTTP error! status: ${responsew.status}`);
    }
    wishlist = await responsew.json();

    if (id) {
        alldata = alldata.find(v => v.id == id);
    }
    console.log(alldata);

    document.getElementById('j_mainImage').src = alldata.images[0];
    // Add your code here to display the data on the page. For example:
    document.getElementById('a_name').textContent = alldata.name;
    document.getElementById('a_price').textContent = '$' + alldata.price;
    document.getElementById('a_description').textContent = alldata.description;

    // document.getElementById('a_breed').innerHTML = `<li><div class="j_inDetail ">
    //                                                     <div class="column1">${alldata.breed ?  'Breed': 'Species'}</div>
    //                                                     <div class="column2">:</div>
    //                                                     <div class="column3">${alldata.breed? alldata.breed: alldata.species}</div>
    //                                                 </div></li>`;


    // document.getElementById('a_age').innerHTML = `<div class="j_inDetail ">
    //                                                 <div class="column1">Age</div>
    //                                                 <div class="column2">:</div>
    //                                                 <div class="column3">${alldata.age}</div>
    //                                                 </div>`;

    let print = ``;

    alldata.images.map((v, i) => {
        print += `<img src="${v}" onclick="showImage('${v}')" alt="Image ${i + 1}">`
    })
    document.getElementById("display_thumb").innerHTML = print;

    similar();
    printdata();

}


const similar = async () => {
    const response = await fetch('http://localhost:3000/pet');
    if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    let petdata = await response.json();
    let print = ``;

    let dog = petdata.filter((v) => v.type == 'dog');

    let dogByBreed = {};
    dog.forEach((v) => {
        if (!dogByBreed[v.breed]) {
            dogByBreed[v.breed] = [];
        }
        dogByBreed[v.breed].push(v);
    });


    let count = 0;
    Object.keys(dogByBreed).forEach((breed) => {
        dogByBreed[breed].forEach((v) => {
            console.log();
            if (count < 4) {
                print += `
        <a class="ProductWrapper p9 col-sm-6 col-md-4 col-lg-3"> 
                    <div class="product" >`
                if (wishlist.find((a) => a.id == v.id)) {
                    print += `<i class="fa-regular fa-heart m_wishIc" style="color: #ff0000;"></i>`
                } else {
                    print += `<i class="fa-regular fa-heart m_wishIc" onclick ='handlewhish("${v.id}")'></i>`
                };
                print += ` <div class="productImage proImg" onclick = 'handledeatails("${v.id}")'>
                            <img src="${v.images[0]}" class="d-block w-100" alt="...">
                        </div>
                        <div class="productDetail">
                            <p>British White Hair Dog Reteiever</p>
                            <h5>${v.breed ? v.breed : v.species}</h5>
                            <div class="m_pcon d-flex justify-content-between">
                                <span>${v.location}</span>
                                <p>$ ${v.price}</p>
                            </div>
                        </div>
                    </div>
                </a>`
                count++;
            }
        });
    });
    document.getElementById('similar').innerHTML = print;
}

const handledeatails = (id) => {
    console.log(id);
    window.open(`dog_view.html?page=pet&id=${id}`, "_self");
}

const handlewhish = async (id) => {
    const response = await fetch('http://localhost:3000/pet');
    if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    let petdata = await response.json();

    console.log(id);

    let existingItem = wishlist.find(item => item.id == id);

    let data = petdata.find(item => item.id == id);

    if (existingItem) {
        alert("Already Add to Wishlist")
    } else {
        alert("successfully add to Wishlist")
        await fetch('http://localhost:3000/wishlist', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
    }
}

const printdata = () => {

    let print = ``
    for (const key in alldata) {
        console.log(key);
        if (alldata.hasOwnProperty(key) && key !== 'images' && key !== 'id' && key !== 'name' && key !== 'price' && key !== 'description' && key !== 'category') {
            print += `<li>
                                <div class="j_inDetail ">
                                    <div class="column1">${key.charAt(0).toUpperCase() + key.slice(1)}</div>
                                    <div class="column2">:</div>
                                    <div class="column3">${alldata[key]}</div>
                                </div>
                   </li>`
        }
    }

    document.getElementById("a_breed").innerHTML = print
}


const handlesearchall = (e) => {
    console.log("dvds");

    const searchData = [...petdata, ...accdata, ...serdata];
    console.log(searchData);

    const searchSuggestionsContainer = document.getElementById('search-suggestions-container');
    const searchSuggestions = document.getElementById('search-suggestions');
    const inputValue = e.target.value.toLowerCase();

    const suggestions = searchData.filter((item) => {
        // console.log(item);
        // const itemName = item.name.toLowerCase();
        let itembreed;
        if (item.breed) {
            itembreed = item.breed.toLowerCase();
        } else if (item.species) {
            itembreed = item.species.toLowerCase();
        }
        const itemCategory = item.category ? item.category.toLowerCase() : '';
        const itemSubCategory = item.sub_category ? item.sub_category.toLowerCase() : '';
        const itemType = item.type ? item.type.toLowerCase() : '';

        return (
            itembreed?.includes(inputValue) ||
            itemCategory.includes(inputValue) ||
            itemSubCategory.includes(inputValue) ||
            itemType.includes(inputValue)
        );
    });

    searchSuggestions.innerHTML = '';
    suggestions.forEach((item, index) => {
        if (index < 6) { // show only 5 suggestions
            const suggestionHTML =
                `<li>
              <a href="${getItemPageUrl(item)}">
                ${item.breed ? `${item.breed}` : ''} 
                ${item.category ? `${item.category}` : ''} 
                ${item.sub_category ? `${item.sub_category}` : ''} 
                ${item.type ? `${item.type}` : ''}
              </a>
            </li>`
                ;
            searchSuggestions.innerHTML += suggestionHTML;
        }
    });

    if (suggestions.length > 0) {
        searchSuggestionsContainer.style.display = 'block';
    } else {
        searchSuggestionsContainer.style.display = 'none';
    }


    searchInput.addEventListener('focus', () => {
        searchSuggestionsContainer.style.display = 'block';
    });

    searchInput.addEventListener('blur', () => {
        setTimeout(() => {
            searchSuggestionsContainer.style.display = 'none';
        }, 200);
    });

    function getItemPageUrl(item) {
        if (item.type === 'dog' || item.type === 'cat' || item.type === 'bird') {
            return `dog_pet.html?pet=${item.type}`;
        } else if (item.category) {
            return `dog_accessories.html?acc=All`;
        } else {
            return `services.html?serv=All`;
        }
    }
}

window.onload = getdata;