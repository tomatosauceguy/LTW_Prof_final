const searchRestaurant = document.querySelector('#searchrestaurant')

// Cria o div com o restaurante quando o custumer procura por um restaurant
function createRestaurantDiv(rest){
  const restaurantDiv = document.createElement('div')
    restaurantDiv.classList.add("restaurantBox")
    //section com o link e a imagem dentro
    const insideSection = document.createElement('section')
    insideSection.classList.add("aspect-ratio-box")

    const restaurantLink = document.createElement('a')
    const restaurantImg = document.createElement('img') 
    restaurantImg.src = 'images/restaurants/originals/' + rest.id + ".jpg" 
    restaurantImg.style.width = '8.17em'
    restaurantImg.style.height = '7em'
    restaurantLink.href = 'restaurantPage.php?id=' + rest.id 

    const restaurantName = document.createElement('p')
    restaurantName.textContent = rest.name

    restaurantLink.appendChild(restaurantImg)
    restaurantDiv.appendChild(restaurantLink)
    restaurantDiv.appendChild(restaurantName)
  
    return restaurantDiv
}


// Cria o div com o restaurante quando o custumer procura por um prato
function createRestaurantDishDiv(dish){
  const restaurantDiv = document.createElement('div')
    restaurantDiv.classList.add("restaurantBox")
    //section com o link e a imagem dentro
    const insideSection = document.createElement('section')
    insideSection.classList.add("aspect-ratio-box")

    const restaurantLink = document.createElement('a')
    const restaurantImg = document.createElement('img')
    restaurantImg.src = 'images/restaurants/originals/' + dish.restaurant + ".jpg"  
    restaurantImg.style.width = '8.17em'
    restaurantImg.style.height = '7em'
    restaurantLink.href = 'restaurantPage.php?id=' + dish.restaurant 

    const restaurantName = document.createElement('p')
    restaurantName.textContent = dish.restaurantName

    restaurantLink.appendChild(restaurantImg)
    restaurantDiv.appendChild(restaurantLink)
    restaurantDiv.appendChild(restaurantName)
  
    return restaurantDiv
}



function getRestaurantAPI(){
  searchRestaurant.addEventListener('input', async function() {

    const section = document.querySelector('#mainBody')
    const sectionCategory = document.querySelectorAll('#mainBody > section')
    const categoryName = document.querySelectorAll('#mainBody > .categoryName')
    const restaurantCategory = document.createElement('section')
    restaurantCategory.classList.add("category")
    const restaurantSection = document.createElement('section')
    restaurantSection.classList.add("restaurants")
    // Limpar o body todo quando se começa a pesquisa

    //============
    
    const restaurantResponse = await fetch('api_restaurants.php?search=' + this.value)
    const restaurants = await restaurantResponse.json()
    console.log(restaurants)

      for (cat of categoryName){
        cat.innerHTML = ''
      }
      for (sect of sectionCategory){
        sect.innerHTML = ''
      }

    for (const rest of restaurants) {
      const restaurantDiv = createRestaurantDiv(rest)
      restaurantSection.appendChild(restaurantDiv)
      restaurantCategory.appendChild(restaurantSection)
      section.appendChild(restaurantSection)
    }
    if (searchRestaurant.value.length == 0){
      location.reload();
    }

  })

}


function getDishAPI(){
  searchRestaurant.addEventListener('input', async function() {
    const section = document.querySelector('#mainBody')
    const sectionCategory = document.querySelectorAll('#mainBody > section')
    const categoryName = document.querySelectorAll('#mainBody > .categoryName')

    const restaurantCategory = document.createElement('section')
    restaurantCategory.classList.add("category")
  
    const restaurantSection = document.createElement('section')
    restaurantSection.classList.add("restaurants")

    // Limpar o body todo quando se começa a pesquisa

    //============
    const dishResponse = await fetch('api_dishes.php?search=' + this.value)
    const dishes = await dishResponse.json()

    for (cat of categoryName){
      cat.innerHTML = ''
    }
    for (sect of sectionCategory){
      sect.innerHTML = ''
    }

    for (const dish of dishes){
      const restaurantDishDiv = createRestaurantDishDiv(dish)
      restaurantSection.appendChild(restaurantDishDiv)
      restaurantCategory.appendChild(restaurantSection)
      section.appendChild(restaurantSection)
    }
    if (searchRestaurant.value.length == 0){
      location.reload();
    }

  })
}


function searchLogic(){
  const selectBox = document.querySelector('[name="searchOptions"]')
  const footer = document.querySelector("#mainBody > main > footer > p")//TODO fazer com que o footer 
  footer.remove()                                                       //nao desapareça quando se faz search na home
  selectBox.addEventListener('change', function(e){

    // Verifica qual é o input selecionado
    const selectedOption = selectBox.options[selectBox.selectedIndex].text

    if (selectedOption == 'Restaurant name'){
        searchRestaurant.disabled = false
        getRestaurantAPI()
    }else if(selectedOption == 'Dish name'){
        searchRestaurant.disabled = false
        getDishAPI()
      }
  })
}


if (window.location.pathname == "/home.php"){
  searchLogic();
}
