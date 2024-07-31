let accessoriesdata ;
let filterData = '';
let wishlist = '';
let petdata;
let serdata;


const getData = async () => {

    const responsep = await fetch('http://localhost:3000/pet');
    if (!responsep.ok) {
      throw new Error(`HTTP error! status: ${responsep.status}`);
    }
    petdata = await responsep.json();
  
    const responses = await fetch('http://localhost:3000/Services');
    if (!responses.ok) {
      throw new Error(`HTTP error! status: ${responses.status}`);
    }
    serdata = await responses.json();

    const response = await fetch('http://localhost:3000/Accessories');
    if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    accessoriesdata = await response.json();

    const responsew = await fetch('http://localhost:3000/wishlist');
    if (!responsew.ok) {
        throw new Error(`HTTP error! status: ${responsew.status}`);
    }
    wishlist = await responsew.json();
    // console.log(accessoriesdata);

    const params = new URLSearchParams(window.location.search);
    const accessories = params.get('acc');
    const search = params.get('search');

    let searchData;
    if(search){
        searchData = accessoriesdata.filter((v) => v.sub_category.toLowerCase().includes(search.toLowerCase()));
        console.log(searchData);
    }
    filterData = accessoriesdata;
    
    if(accessories){
        if (accessories == 'All') {
            filterData = accessoriesdata;
        } else  {
            filterData = accessoriesdata.filter((v) => v.category == accessories);
        }
    }

    document.getElementById("acc_sale") ?
        document.getElementById("acc_sale").innerHTML = `${search? search: accessories}  Accessories for Sale` : ''
    document.getElementById("a_acce") ?
        document.getElementById("a_acce").innerHTML = `${search? search: accessories}  Accessories` : ''
         document.getElementById("a_acce1") ?
        document.getElementById("a_acce1").innerHTML = `${search? search: accessories}  Accessories` : ''
    document.getElementById("acc_sale1") ?
        document.getElementById("acc_sale1").innerHTML = `${search? search: accessories}  Accessories for Sale` : ''

    listSubcategory(filterData);
    createCards(searchData? searchData: filterData);

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
                            <h5>${v.name}</h5>
                                <p>$ ${v.price}</p>
                            </div>
                        </div>
                    </div>
                </a>`
    })

    document.getElementById("displayaccessories").innerHTML = print;

    document.getElementById("acc_items") ?
        document.getElementById("acc_items").innerHTML = `${data.length} Items` : ''
    document.getElementById("acc_items1") ?
        document.getElementById("acc_items1").innerHTML = `${data.length} Items` : ''


}

const listSubcategory = (data) => {
    // console.log(data);
    const uniqueSubcategories = [...new Set(data.map((v) => v.sub_category))];
    let print = `<li>
                    <label for="breed-0" class="playlist-name m_radio1">
                      <input id="breed-0" type="radio" name="a_breed" value="All" checked>
                      All Sub Category
                    </label>
                  </li>`;

    uniqueSubcategories.slice(0, 6).forEach((subCategory, i) => {
        print += `<li>
                    <label for="breed-${i + 1}" class="playlist-name m_radio1">
                      <input id="breed-${i + 1}" type="radio" name="a_breed" value="${subCategory}">
                      ${subCategory}
                    </label>
                  </li>`;
    });

    if (uniqueSubcategories.length > 6) {
        print += `<div class="showMore">
                    <i class="fa fa-angle-down"></i>
                    <span>More Breed</span>
                  </div>`;
    }

    uniqueSubcategories.slice(6).forEach((subCategory, i) => {
        print += `<li class="more">
                    <label for="breed-${i + 7}" class="playlist-name m_radio1">
                      <input id="breed-${i + 7}" type="radio" name="a_breed" value="${subCategory}">
                      ${subCategory}
                    </label>
                  </li>`;
    });

    if (uniqueSubcategories.length > 6) {
        print += `<div class="showLess">
                    <i class="fa fa-angle-up"></i>
                    <span>Less Breed</span>
                  </div>`;
    }

    document.getElementById("displaySubcategory")?document.getElementById("displaySubcategory").innerHTML = print: '' ;
    document.getElementById("displaySubcategory1")?document.getElementById("displaySubcategory1").innerHTML = print: '' ;
   
    drop();
};

const handleSearchsub = (e) => {

    let searchText = e.target.value.toLowerCase();
    console.log(searchText);
    let filteredData = filterData.filter(item => item.sub_category.toLowerCase().includes(searchText));

    listSubcategory(filteredData);
    createCards(filteredData);
 
}

const handlesearch = (event) => {
    let searchText = event.target.value.toLowerCase();
    console.log(searchText);

    let filt = filterData.filter(item => {
        let name = item.name ? item.name.toLowerCase().includes(searchText) : false;
        let category = item.category ? item.category.toLowerCase().includes(searchText) : false;

        return name || category;
    });

    createCards(filt);
}

const handleprice = () => {
    let fromInput1 = document.getElementById('from');
    let fromInput2 = document.getElementById('from1');
    let toInput1 = document.getElementById('to');
    let toInput2 = document.getElementById('to1');

    const fromValue = parseFloat(fromInput1.value) || parseFloat(fromInput2.value);
    const toValue = parseFloat(toInput1.value) || parseFloat(toInput2.value);


    let filteredData = filterData;
    if (toValue) {
        filteredData = filterData.filter(v => v.price >= fromValue && v.price <= toValue);
    } else {
        filteredData = filterData.filter(v => v.price >= fromValue);
    }

    createCards(filteredData.length != 0 ? filteredData : filterData);
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

const handleSubcategory = (event) => {

    let selectedValue = '';
    let finaldata = '';
    if (event.target.type === "radio") {
        selectedValue = event.target.value;
        // console.log(`Selected breed: ${selectedValue}`);
    }else {
      // If it's not a radio button event, get the currently selected value
      selectedValue = $('input[name="a_breed"]:checked').val();
  }
    if (selectedValue == "All") {
        finaldata = filterData;
    } else {
        finaldata = filterData.filter((v) => v.sub_category == selectedValue);
    }

    document.getElementById("acc_sale") ?
        document.getElementById("acc_sale").innerHTML = `${selectedValue}  Accessories for Sale` : ''
    document.getElementById("a_acce") ?
        document.getElementById("a_acce").innerHTML = `${selectedValue}  Accessories` : ''
         document.getElementById("a_acce1") ?
        document.getElementById("a_acce1").innerHTML = `${selectedValue}  Accessories` : ''
    document.getElementById("acc_sale1") ?
        document.getElementById("acc_sale1").innerHTML = `${selectedValue}  Accessories for Sale` : ''

    createCards(finaldata)
}

const handledeatails = (id) => {
    window.open(`dog_view.html?page=accessories&id=${id}`, "_self");
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
  
    const searchData = [...petdata, ...accessoriesdata, ...serdata]; 
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
  let finaldata;
  if(city !== 0){
      finaldata = filterData.filter((v) => v.location ? v.location.toLowerCase().includes(city.toLowerCase()) : false);
  }
  if(finaldata){
      createCards(finaldata);
  }  
}

window.onload = getData();