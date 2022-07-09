

function addFavorite(){
    heartIcons = document.querySelectorAll('.restaurantBox i')
    
    heartIcons.forEach(function(heart, index){

        heart.addEventListener('click', function(e){
            console.log(heart) 
            restaurantId = heart.className.split(' ').pop() // para aceder ao restaurnat id 
            console.log(restaurantId)  
            let request = new XMLHttpRequest()

            request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Favorite restaurants list updated")
                location.reload()
            }
            }
            console.log(heart) 
            var url = "favorite_restaurant.php?restaurantId="  + restaurantId 

            request.open("GET", url, true)
            request.send()
            
        })
    })
}


if (window.location.pathname == "/home.php"){
    addFavorite()
}
    
