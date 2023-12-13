let display = document.getElementById('products-main');
let file = './data/produits.json';
let request = new XMLHttpRequest();
let prods;


setInterval(function(){
request.open('GET', file);
request.onload=function(){

        prods = JSON.parse(request.responseText);
        displayData(prods);

    }
    request.send();
}, 1200);   

function displayData(data) {
    let html='';
    for(let i = 0; i < data.length ; i++ ){
    html+= '<div class="product">';

    if(data[i].SOLD != 0){
        html+= '<div class="discount"><p>'+data[i].SOLD+'% OFF</p></div>';
    }
    html+='<div class="img"><img src="images/'+data[i].image+'" alt=""></div><div class="product-info"><p>'+data[i].title+'</p><div class="price">';

    if(data[i].SOLD != 0){
        let new_price = data[i].price -(data[i].SOLD*data[i].price)/100;
        html+= '<p> '+new_price+' MAD</p><small> '+data[i].price+' MAD</small>';
    }else{
        html+= '<p> '+data[i].price+' MAD</p>';
    }
    let string = 'data'+i;
    html+='</div><div class="seller"><span>SELLER: </span> <p>'+data[i].name+'</p></div><button onclick="addToCart('+data[i].id+')"><ion-icon name="cart-outline"></ion-icon></button><a class="more" href="details.php?id_Produit='+data[i].id+'">see more</a></div></div>';
    }
    display.innerHTML= html;
}