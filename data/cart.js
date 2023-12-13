let products = null;

fetch('./data/produits.json').then(response => response.json()).then(
    data => {
        products = data;
    }
)

let listCart= [];

function checkCart(){
    var cookieValue = document.cookie
    .split("; ")
    .find(row => row.startsWith('listCart='));

    if(cookieValue){
        listCart = JSON.parse(cookieValue.split('=')[1]);
    }
}

checkCart();

function addToCart($idProduct){
    let productCopy = JSON.parse(JSON.stringify(products));

    if(!listCart[$idProduct]){
        let dataProduct = productCopy.filter(
            product => product.id == $idProduct
        )[0];

        listCart[$idProduct] = dataProduct;
        listCart[$idProduct].qty = 1;
    }else{
        listCart[$idProduct].qty++;
    }

    let timeSave ="expires=Thu, 31 Dec 2030 23:59:59 UTC";
    document.cookie = "listCart="+JSON.stringify(listCart)+"; "+timeSave+"; path=/;";

    addCartToHTML();
}

function addCartToHTML(){
    let listCartHTML = document.querySelector('.shopcart-items');
    let Totale = document.querySelector('.totale');
    listCartHTML.innerHTML = '';
    let T = 0;
    Totale.innerHTML=
            `<div>
                <h4>Sub Total:</h4>
                <h5>MAD ${Totale}</h5>
            </div>
            <button class="btn-primary">Checkout</button>`;

    if(listCart){
        listCart.forEach(product => {
            if(product){
                let newCart = document.createElement('div');
                newCart.classList.add('item');
                let pricePerUni;
                if(product.SOLD != 0){
                    pricePerUni = product.price - (product.SOLD*product.price)/100;
                }else{
                    pricePerUni = product.price;
                }
                newCart.innerHTML = 
                `<div class="img"><img src="images/${product.image}" alt=""></div>
                <div class="item-info">
                    <p class="p-name">${product.title}</p>
                    <p><span>Unit price :  </span>${pricePerUni} MAD</p>
                    <p><span>Qty :  </span id="quantity"> ${product.qty}</p>
                    <p><span>Price :  </span id="gprice">  ${product.qty*pricePerUni} MAD</p>
                </div>
                <button onclick="changeQuantity(${product.id}, 'remove')"><ion-icon name="remove-circle-outline"></ion-icon></button>
                <div class="quantity">
                    <button onclick="changeQuantity(${product.id}, '-')" class="inc"><ion-icon name="remove-outline"></ion-icon></button>
                    <span>${product.qty}</span>
                    <button onclick="changeQuantity(${product.id}, '+')" class="dec" ><ion-icon name="add-outline"></ion-icon></button>
                </div>`;

                listCartHTML.appendChild(newCart);
                T += product.qty*pricePerUni;

            }

        })

        Totale.innerHTML = 
            `<div>
                <h4>Sub Total:</h4>
                <h5>MAD ${T}</h5>
            </div>
            <button class="btn-primary">Checkout</button>`;
        


    }
}

addCartToHTML();

function changeQuantity($idProduct, $type){
    switch ($type) {
        case '+':
            listCart[$idProduct].qty++;
            break;

        case '-':
            listCart[$idProduct].qty--;
            if(listCart[$idProduct].qty <= 0){
                delete listCart[$idProduct];
            }
            break;

        case 'remove':
            delete listCart[$idProduct];
            break;

        default:
            break;
    }
    let timeSave ="expires=Thu, 31 Dec 2030 23:59:59 UTC";
    document.cookie = "listCart="+JSON.stringify(listCart)+"; "+timeSave+"; path=/;";

    addCartToHTML();
}

