function increase(inputBox, originalPrice){
    if (inputBox.value >= 100){
      inputBox.value = 100
    }else{
      inputBox.value = parseInt(inputBox.value, 10) + 1
    }
    updateDishPrice(inputBox, originalPrice)
  } 
  
  
  function decrease(inputBox, originalPrice){
    if (inputBox.value <= 0){
      inputBox.value = 0
    }else{
      inputBox.value = parseInt(inputBox.value, 10) - 1
    }
    updateDishPrice(inputBox, originalPrice)
  } 
  
  function updateDishPrice(quantity, originalPrice){
    const currentDiv = quantity.parentElement.parentElement  // <div id="dishBox_7"></div>
    const currentPrice = currentDiv.querySelector('p:nth-child(3)')//<p>7.8€</p>
    const newPrice = (quantity.value * originalPrice).toFixed(2)  // Novo preço de acordo com o preço original e e quantidade inserida
  
    currentPrice.innerHTML = newPrice + "€"
    updateTotal()
  }


  

function updateTotal(){
    const totalHTML = document.querySelector('.orders > div:last-child > p > strong') //<strong>0</strong>
    newTotal = 0
  
    const dishes = document.querySelectorAll('.orders > div:not(:last-child)')
    for (const dish of dishes){
      dishPrice = dish.querySelector('p:nth-child(3)').textContent
      newTotal = newTotal + parseFloat(dishPrice)
    }
  
    totalHTML.innerHTML = newTotal.toFixed(2) + "€"
  }
  
  
  
  function encodeToJSONHelper(dishId, dishQuantity){
    const dish = {
      dishId: dishId,
      quantity: dishQuantity
    } 
    return dish;
  }


  function encodeCartToJSON(){
    const toSend = {}
    const dishArray = []
    dishjsonId = 0 
  
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;

  
    const allDishesDiv = document.querySelectorAll('.orders > div:not(:last-child)')
      for (const dish of allDishesDiv){  //Para cada prato
        dishjsonId += 1  //ids diferentes para cada prato na string json
        const dishQuantity = dish.querySelector('div:nth-child(2) > input').value  // 4
        const dishId = dish.querySelector('p:nth-child(4)').textContent  // 4
        const jsonDish = encodeToJSONHelper(dishId, dishQuantity)
        dishArray.push(jsonDish)
      }
      toSend["items"] = dishArray
      const dishTotal = document.querySelector('.orders > div:last-child > p > strong').textContent
      toSend["total"] = dishTotal
      toSend["date"] = dateTime // data em que se fez a compra
      toSend["status"] = "Preparing" 
      const jsonToSend = JSON.stringify(toSend)
  
      return jsonToSend;
  }

  
  function removeElements(){
    const removeButtons = document.querySelectorAll('#dish_name_remove button')
    for (btn of removeButtons){
      const dishBox = btn.parentElement.parentElement
      btn.addEventListener('click', function(e){
        dishBox.remove()
        updateTotal()
  
      })
    }
  }
  


  function finalizeCart(){
    const btn = document.querySelector('#cart .orders #cartCheckout')
    btn.addEventListener('click', function(e){
      const jsonToSend = encodeCartToJSON()
      console.log(jsonToSend)
      const request = new XMLHttpRequest()
      request.open("POST", "testingAjax.php", true)
      request.setRequestHeader("Content-Type", "application/json")
      request.send(jsonToSend)
  
      request.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
        //alert(request.responseText); // faz um alert com a resposta do servidor
        alert("Compra finalizada com sucesso")
        window.location.href = window.location.protocol + "//" + window.location.host + "/" + "home.php";
       }
      }
    })
  }


  // Verifica se está na cart page antes de chamar essas funções: evita erros na consola
if (window.location.pathname == "/cart.php"){
    updateTotal()
    removeElements()
    finalizeCart()
  }