let petdata;
let accdata;
let serdata;
let wishlist = '';
const getData = async() =>{

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

    printwishlist(wishlist);

}


const printwishlist = (data) =>{
    let print = ``;

    data.map((v)=>{
        print += `<a class="ProductWrapper" >
                        <div class="product">
                            <i class="fa-solid fa-heart m_wishIc" style="color: #ff0000;" onclick = 'removeWish("${v.id}")'></i>
                            <div class="productImage proImg">
                                <img src="${v.images[0]}" class="d-block w-100" alt="...">
                            </div>
                            <div class="productDetail">
                                <p class="m_prPre">British White Hair Dog Reteiever</p>
                                <h5 class="m_prTtl">${v.breed? v.breed : v.name}</h5>

                                <div class="m_pcon d-flex justify-content-between">
                                    <span>${v.location ? v.location : ''}</span>
                                    <p class="mb-0">$ ${v.price}</p>
                                </div>
                            </div>
                        </div>
                    </a>`
    })


    document.getElementById("display").innerHTML = print;
}

const removeWish = async(id) => {
    console.log(id);
    await fetch(`http://localhost:3000/wishlist/${id}`, {
        method: 'DELETE'
    });
   
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




window.onload = getData;