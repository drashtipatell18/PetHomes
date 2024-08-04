let petdata;
let accdata;
let serdata;
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

  const responsew = await fetch('http://localhost:3000/wishlist');
  if (!responsew.ok) {
    throw new Error(`HTTP error! status: ${responsew.status}`);
  }
  wishlist = await responsew.json();

  recommendedprint();
  popularCat();
  populardog();

}

const recommendedprint = () => {
  let print = '';
  let count = 0;
  petdata.forEach((v) => {
    if (count < 15) {
      print += `
          <a class="ProductWrapper p1 col-sm-6 col-lg-4">
            <div class="product" >
              ${wishlist.find((a) => a.id == v.id) ? '<i class="fa-regular fa-heart m_wishIc" style="color: #ff0000;"></i>' : `<i class="fa-regular fa-heart m_wishIc" onclick="handlewhish('${v.id}')"></i>`}
              <div class="productImage proImgIn" onclick="handledeatails('${v.id}')">
                <img src="${v.images[0]}" class="d-block w-100" alt="...">
              </div>
              <div class="productDetail">
                <p  class="m_prPre" >${v.type === 'dog' ? 'Dog' : v.type === 'cat' ? 'Cat' : v.type === 'bird' ? 'Bird' : v.type === 'fish' ? 'Fish' : v.type === 'horse' ? 'Horse' : ''}</p>
                <h5 class="m_prTtl">${v.breed ? v.breed : v.species}</h5>
                <div class="m_pcon d-flex justify-content-between">
                  <span>${v.location}</span>
                  <p>$ ${v.price}</p>
                </div>
              </div>
            </div>
          </a>
        `;
      count++;
    }
  });
  document.getElementById("recommended").innerHTML = print;
}

const popularCat = () => {
  let print = ``;
  console.log(petdata);
  let cat = petdata.filter((v) => v.type == 'cat');

  let catByBreed = {};
  cat.forEach((v) => {
    if (!catByBreed[v.breed]) {
      catByBreed[v.breed] = [];
    }
    catByBreed[v.breed].push(v);
  });


  let count = 0;
  Object.keys(catByBreed).forEach((breed) => {
    catByBreed[breed].forEach((v) => {
      if (count < 5) {
      print += `
      <a class="ProductWrapper "href="dog_pet.html?pet=Cat">
                  <div class="product">
                      <i class="fa-regular fa-heart m_wishIc"></i>
                      <div class="productImage proImgIn">
                          <img src="${v.images[0]}" class="d-block w-100" alt="...">
                      </div>
                      <div class="productDetail">
                          <h6 class="m_Ttl">${v.breed}</h6>
                      </div>
                  </div>
              </a> `
              count++;
      }
    });
  });
  document.getElementById('popularcat').innerHTML = print;
}

const populardog = () => {
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
      if (count < 5) {
      print += `
      <a class="ProductWrapper " href="dog_pet.html?pet=dog">
                  <div class="product">
                      <i class="fa-regular fa-heart m_wishIc"></i>
                      <div class="productImage proImgIn">
                          <img src="${v.images[0]}" class="d-block w-100" alt="...">
                      </div>
                      <div class="productDetail">
                          <h6 class="m_Ttl">${v.breed}</h6>
                      </div>
                  </div>
              </a> `
              count++;
      }
    });
  });
  document.getElementById('populardog').innerHTML = print;
}

const handledeatails = (id) => {
  console.log(id);
  window.open(`dog_view.html?page=pet&id=${id}`, "_self");
}

const handlewhish = async (id) => {
  console.log(id);

  let existingItem = wishlist.find(v => v.id == id);

  let data = petdata.find(v => v.id == id);

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



// window.onload = getdata;
