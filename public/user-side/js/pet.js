
let petdata = '';
let filterData = '';
let wishlist = '';
let accdata;
let serdata;


const getData = async () => {
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

    const responsew = await fetch('http://localhost:3000/wishlist');
    if (!responsew.ok) {
        throw new Error(`HTTP error! status: ${responsew.status}`);
    }
    wishlist = await responsew.json();


    const params = new URLSearchParams(window.location.search);
    const pet = params.get('pet');
    const breed = params.get('breed');
    console.log(breed);

    let breedfilterData;
    if (breed) {
        breedfilterData = petdata.filter((v) => v.breed === breed && v.type.toLowerCase() == pet.toLowerCase());
    }
    filterData = petdata.filter((v) => v.type.toLowerCase() == pet.toLowerCase());


    console.log(filterData);


    document.getElementById("pet_sal") ?
        document.getElementById("pet_sal").innerHTML = `${pet}  for Sale` : ''
    document.getElementById("a_pet") ?
        document.getElementById("a_pet").innerHTML = `${pet}` : '';
    document.getElementById("a_pet1") ?
        document.getElementById("a_pet1").innerHTML = `${pet}` : '';
    document.getElementById("pet_sal1") ?
        document.getElementById("pet_sal1").innerHTML = `${pet}  for Sale` : ''


    listSubcategory(filterData);
    createCards(breedfilterData ? breedfilterData : filterData);

}


const createCards = (data) => {
    let print = ``;

    data.map((v) => {
        print += `
        <a class="ProductWrapper p1 col-sm-6 col-lg-4"> 
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
    })

    document.getElementById("displayPet").innerHTML = print;

    document.getElementById("pet_itme") ?
        document.getElementById("pet_itme").innerHTML = `${data.length} pets` : ''
    document.getElementById("pet_itme1") ?
        document.getElementById("pet_itme1").innerHTML = `${data.length} pets` : ''

}

const listSubcategory = (data) => {
    let print = `<li>
                    <label for="breed-0" class="playlist-name m_radio1">
                    <input id="breed-0" type="radio" name="a_breed" value="all-breed" checked>
                    All Breed
                    </label>
                </li>`;
    data.map((v, i) => {
        if (i < 6) {
            print += `<li><label for="breed-${i + 1}" class="playlist-name m_radio1">
                    <input id="breed-${i + 1}" type="radio" name="a_breed" value="${v.breed ? v.breed : v.species}">
                    ${v.breed ? v.breed : v.species}
                    </label></li>`
        }
    });
    if (data.length > 6) {
        print += ` <div class="showMore">
        <i class='fa fa-angle-down'></i>
        <span>More Breed</span>
        </div>`
    }
    data.map((v, i) => {
        if (i >= 6) {
            print += `<li class="more"><label for="breed-${i + 1}" class="playlist-name m_radio1">
            <input id="breed-${i + 1}" type="radio" name="a_breed" value="${v.breed ? v.breed : v.species}">
                ${v.breed ? v.breed : v.species}
                </label></li>`
        }
    });

    if (data.length > 6) {
        print += ` <div class="showLess">
                <i class='fa fa-angle-up'></i>
                <span>Less Breed</span>
                </div>` }

    document.getElementById("displaySubcategory") ? document.getElementById("displaySubcategory").innerHTML = print : ''
    document.getElementById("displaySubcategory1") ? document.getElementById("displaySubcategory1").innerHTML = print : ''


    drop();

}

const handleSearchBreed = (e) => {
    let searchText = e.target.value.toLowerCase();
    console.log(searchText);
    let filteredData = filterData.filter(item =>
        (item.breed && item.breed.toLowerCase().includes(searchText)) ||
        item.species?.toLowerCase().includes(searchText)
    );
    createCards(filteredData);
    listSubcategory(filteredData);
}

const handleSearch = (e) => {
    let searchText = e.target.value.toLowerCase();
    console.log(searchText);

    let filteredData = filterData.filter(item => {
        let speciesMatch = item.species ? item.species.toLowerCase().includes(searchText) : false;
        let breedMatch = item.breed ? item.breed.toLowerCase().includes(searchText) : false;
        let locationMatch = item.location ? item.location.toLowerCase().includes(searchText) : false;

        return speciesMatch || breedMatch || locationMatch;
    });

    createCards(filteredData);
}

const handleprice = () => {
    let fromInput1 = document.getElementById('from');
    let fromInput2 = document.getElementById('from1');
    let toInput1 = document.getElementById('to');
    let toInput2 = document.getElementById('to1');

    const fromValue = parseFloat(fromInput1.value) || parseFloat(fromInput2.value);
    const toValue = parseFloat(toInput1.value) || parseFloat(toInput2.value);

    console.log(toValue, fromValue);

    let filteredData ;

    if (toValue) {
        filteredData = filterData.filter(v => v.price >= fromValue && v.price <= toValue);
    } else {
        filteredData = filterData.filter(v => v.price >= fromValue);
    }
    // console.log(filteredData);
    createCards(filteredData.length != 0 ? filteredData : filterData);

}

const handlewhish = async (id) => {
    console.log(id);

    let existingItem = wishlist.find(item => item.id == id);

    let data = filterData.find(item => item.id == id);

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


const drop = () => {
    $(document).ready(function () {
        $('.showLess, .more').hide();
        $('.showMore').on("click", function () {
            $(this).closest('.filterData').find('.showLess, .more').show();
            $(this).hide();
            // Reapply the current filter
            const selectedBreed = $('input[name="a_breed"]:checked').val();
            handleSubcategory({ target: { type: "radio", value: selectedBreed } });
        });

        $('.showLess').on("click", function () {
            $(this).closest('.filterData').find('.showMore').show();
            $(this).closest('.filterData').find('.showLess, .more').hide();
            // Reapply the current filter
            const selectedBreed = $('input[name="a_breed"]:checked').val();
            handleSubcategory({ target: { type: "radio", value: selectedBreed } });
        });
    });
}
const handleSubcategory = (event) => {
    let selectedValue = '';
    let finaldata = '';
    if (event.target.type === "radio") {
        selectedValue = event.target.value;
    } else {
        // If it's not a radio button event, get the currently selected value
        selectedValue = $('input[name="a_breed"]:checked').val();
    }
    console.log(`Selected breed: ${selectedValue}`);
    
    if (selectedValue == "all-breed") {
        finaldata = filterData;
    } else {
        finaldata = filterData.filter((v) => v.breed ? v.breed == selectedValue : false || v.species ? v.species == selectedValue : false);
    }
    console.log(finaldata);
    createCards(finaldata);
}
const handleAge = (event) => {
    let selectedValue = '';
    let finalData = '';
    const target = event.target;
    if (target.tagName === 'INPUT' && target.type === 'radio') {
        selectedValue = target.value;
    } else if (target.tagName === 'LABEL') {
        selectedValue = target.querySelector('input').value;
    }

    console.log(selectedValue);

    const ageParser = (ageString) => {
        const monthsPerYear = 12;
        let years = 0;
        let months = 0;
        const parts = ageString.split(' ');
        for (const part of parts) {
            console.log(part);
            if (part.endsWith('years') || part.endsWith('year')) {
                years = parseInt(part.replace('years', '').replace('year', ''), 10);
            } else if (part.endsWith('months') || part.endsWith('month')) {
                months = parseInt(part.replace('months', '').replace('month', ''), 10);
            }
        }
        return years * monthsPerYear + months;
    };

    finalData = filterData.filter((v) => {
        const ageInMonths = ageParser(v.age);
        console.log(ageInMonths);
        if (selectedValue === '3') {
            return ageInMonths >= 0 && ageInMonths <= 3;
        } else if (selectedValue === '12') {
            return ageInMonths > 3 && ageInMonths <= 12;
        } else if (selectedValue === '24') {
            return ageInMonths > 12 && ageInMonths <= 24;
        } else if (selectedValue === '60') {
            return ageInMonths > 24 && ageInMonths <= 60;
        } else if (selectedValue === '61') {
            return ageInMonths > 60;
        }
    });
    createCards(finalData);
}

const handledeatails = (id) => {
    window.open(`dog_view.html?page=pet&id=${id}`, "_self");
}

const dropdownItems = document.querySelectorAll('.dropdown-sort');
const selectedSortSpan = document.getElementById('selected-sort');

dropdownItems.forEach((item) => {
    item.addEventListener('click', (e) => {
        const sortvalue = e.target.getAttribute('data-sort-value');
        console.log(sortvalue);

        selectedSortValue = e.target.textContent
        console.log(selectedSortValue);
        selectedSortSpan.textContent = selectedSortValue;

        if (sortvalue == 'all') {
            filterData = filterData;
        } else if (sortvalue == 'lh') {
            filterData = filterData.sort((a, b) => a.price - b.price);
        } else if (sortvalue == 'hl') {
            filterData = filterData.sort((a, b) => b.price - a.price);
        } else if (sortvalue == 'Discount') {
            filterData = filterData
        } else if (sortvalue == 'Featured') {
            filterData = filterData
        } else if (sortvalue == 'ct') {
            filterData = filterData
        }

        createCards(filterData);

    });
});

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
        let itembreed ;
        if(item.breed){
          itembreed = item.breed.toLowerCase();
        }else if(item.species){
          itembreed = item.species.toLowerCase();
        }
        const itemCategory = item.category ? item.category.toLowerCase() : '';
        const itemSubCategory = item.sub_category ? item.sub_category.toLowerCase() : '';
        const itemType = item.type ? item.type.toLowerCase() : '';
  
        return (
          itembreed?.includes(inputValue)||
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

  function toggleButton(element) {
 
    element.classList.toggle('selected');

   
    const selectedValue = element.getAttribute('data-value').toLowerCase();
    
    if (element.classList.contains('selected')) {
        // console.log('Selected:', value);
        finaldata = filterData.filter((v) => v.advert_type.toLowerCase().includes(selectedValue)) ;
    } else {
        // console.log('Unselected:', value);
        finaldata = filterData
    }

    createCards(finaldata);
}

const handlecity = (e)=>{
    const city = e.target.value;
    console.log(city);
    if(city !== 0){
        finaldata = filterData.filter((v) => v.location ? v.location.toLowerCase().includes(city.toLowerCase()) : false);
    }
   

    createCards(finaldata);
}
window.onload = getData();