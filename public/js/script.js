
async function addedToCartAnimation() {

    showCheckCart();
     let timeleft = 1;
     let downloadTimer = setInterval(function(){
         if(timeleft <= 0){
             showNormalCart();
             clearInterval(downloadTimer);
         }
         timeleft -= 1;
     }, 1000);
}
function cartManipulation() {
    addToCart();
    editCart();
}
function editCart() {
    let addQuantityButton = document.getElementsByClassName("add-quantity-button");
    for (let i = 0; i < addQuantityButton.length; i++) {
        let theButton = addQuantityButton[i];
        theButton.addEventListener("click", function () {
            cartAction("raise", theButton.id);
            listItems();
        });
    }
    let takeQuantityButton = document.getElementsByClassName("take-quantity-button");
    for (let i = 0; i < takeQuantityButton.length; i++) {
        let theButton = takeQuantityButton[i];
        theButton.addEventListener("click", function () {
            cartAction("take", theButton.id);
            listItems();
        });
    }
}
function addToCart() {
    let workingCartButtons = document.getElementsByClassName("add-to-cart-working");
    for (let i = 0; i < workingCartButtons.length; i++) {
        let theButton = workingCartButtons[i];
        theButton.addEventListener("click", addedToCartAnimation);
        theButton.addEventListener("click", function () {
                cartAction("add", theButton.id);
        });
    }

    let blockedCartButtons = document.getElementsByClassName("add-to-cart-blocked");
    for (let i = 0; i < blockedCartButtons.length; i++) {
        let theButton = blockedCartButtons[i];
        theButton.onclick  = addToCartErrorAlert;
    }


}

async function cartAction(action, product_code) {
     try {
         var product = product_code.slice(4);
         console.log(product);
         var details = {
             'code': product
         };

         var formBody = [];
         for (var property in details) {
             var encodedKey = encodeURIComponent(property);
             var encodedValue = encodeURIComponent(details[property]);
             formBody.push(encodedKey + "=" + encodedValue);
         }
         formBody = formBody.join("&");

         console.log("HEllo");
         if(action == "add") {
             let response = await fetch(
                 "?c=cart&a=addToCart",
                 {
                     headers: {
                         'Content-Type': 'application/x-www-form-urlencoded',
                     },
                     method: "POST",
                     body: formBody
                 });
             if (response.status != 200) {
                 throw new Error("ERROR:" + response.status + " " + response.statusText);
             }
         } else if (action == "take") {
             console.log("HEllo");
             let response = await fetch(
                 "?c=cart&a=takeFromCart",
                 {
                     headers: {
                         'Content-Type': 'application/x-www-form-urlencoded',
                     },
                     method: "POST",
                     body: formBody
                 });
             console.log("HEllo");
             if (response.status != 200) {
                 throw new Error("ERROR:" + response.status + " " + response.statusText);
             }
             console.log("HEllo");
             //let messages = await response.json();
             //let button = document.getElementsByClassName("take-quantity-button");
         } else if (action == "raise") {
             let response = await fetch(
                 "?c=cart&a=raiseToCart",
                 {
                     headers: {
                         'Content-Type': 'application/x-www-form-urlencoded',
                     },
                     method: "POST",
                     body: formBody
                 });
             if (response.status != 200) {
                 throw new Error("ERROR:" + response.status + " " + response.statusText);
             }
             //let messages = await response.json();
         }


         //const data = await response.json();
         console.log(product_code);


     } catch (err) {
         console.log('Request Failed', err);
     }
 }



function showCheckCart() {
    document.getElementById('cart-no-plus').setAttribute("height", "0");
    document.getElementById('cart-no-plus').setAttribute("width", "0");
    document.getElementById('cart-check').setAttribute("height", "16");
    document.getElementById('cart-check').setAttribute("width", "16");
}
function showNormalCart() {
    document.getElementById('cart-check').setAttribute("height", "0");
    document.getElementById('cart-check').setAttribute("width", "0");
    document.getElementById('cart-no-plus').setAttribute("height", "16");
    document.getElementById('cart-no-plus').setAttribute("width", "16");
}
function addToCartErrorAlert() {
    document.getElementById('upozornenie-kosik').style.display = "block";
    let popupModalClose = document.getElementById('modalCloseButton');
    document.getElementById('loginModalTrigger').click();
    popupModalClose.onclick = function () {
        document.getElementById('upozornenie-kosik').style.display = "none";
    }
}

async function listItems() {

        let response = await fetch("?c=cart&a=getCartItems");

    let messages = await response.json();
    messages.forEach(product => {
        const {id, cart_user_id, product_id, quantity, name} = product;
        const productElement = document.getElementById("listOfProducts");
        productElement.innerHTML += "<li class=\"list-group-item d-flex justify-content-between lh-sm\">\n" +
            "                            <div class=\"col-5\">\n" +
            "                                <h6 class=\"my-0\">${name}</h6>\n" +
            "                            </div>\n" +
            "                            <div class=”col-3”>\n" +
            "                                <div class=\"quantitySetter\">\n" +
            "                                    <div class=\"container text-center\">\n" +
            "                                        <div class=\"row\">\n" +
            "                                            <div class=\"col-1\">\n" +
            "                                                <svg id=\"upi_${id}\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-plus add-quantity-button\" viewBox=\"0 0 16 16\">\n" +
            "                                                    <path d=\"M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z\"></path>\n" +
            "                                                    <path d=\"M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z\"></path>\n" +
            "                                                </svg>\n" +
            "                                            </div>\n" +
            "                                            <div class=\"col-1\">\n" +
            "                                                <h6 id=\"qty_<?php echo $product->getId(); ?>\" class=”count”><?php echo $product->getQuantity(); ?></h6>\n" +
            "                                            </div>\n" +
            "                                            <div class=\"col-1\" >\n" +
            "                                                <svg id=\"dwn_<?php echo $product->getId(); ?>\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-minus take-quantity-button\" viewBox=\"0 0 16 16\">\n" +
            "                                                    <path d=\"M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z\"></path>\n" +
            "                                                    <path d=\"M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z\"></path>\n" +
            "                                                </svg>\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                            <div class=\"col-3\" style=\"text-align: right\">\n" +
            "                                <span id=\"prc_<?php echo $product->getId(); ?>\" class=\"text-muted\"><?=\\App\\Models\\Product::getOne( $product->getProductId())->getPrice() * $product->getQuantity()?> eur</span>\n" +
            "                            </div>\n" +
            "                        </li>"
    });


    /*

            movieElement.innerHTML += `<div class="col-md-2 border rounded-4 m-1 ">\n` +
                `        <a href="?c=movie&a=title&id=${id}&type=${type}">\n` +
                `            <img class="image w-100 rounded-4 mt-3" src="${IMG_URL+poster_path}" alt="${nazov}">\n` +
                `        </a>\n` +
                `        <div class="nazov text-center text-white">\n` +
                `            ${nazov}\n` +
                `        </div>\n` +
                `    </div> `;
            `<li class="list-group-item d-flex justify-content-between lh-sm">\n` +

            `<div class="col-6">`
                ` <h6 class="my-0"><?=\App\Models\Product::getOne( $product->getProductId())->getName()?></h6>\n`
                `</div>\n`
                <div class=”col-4”>
                <div class="quantitySetter">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <svg id="upi_<?php echo $product->getCartId(); ?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus add-quantity-button" viewBox="0 0 16 16">
                                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"></path>
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>
                                </svg>
                            </div>
                            <div class="col">
                                <h6 id="qty_<?php echo $product->getCartId(); ?>" class=”count”><?php echo $product->getQuantity(); ?></h6>
                        </div>
                        <div class="col" >
                            <svg id="dwn_<?php echo $product->getCartId(); ?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-minus take-quantity-button" viewBox="0 0 16 16">
                                <path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"></path>
                                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col" style="text-align: right">
                <span id="prc_<?php echo $product->getCartId(); ?>" class="text-muted"><?=\App\Models\Product::getOne( $product->getProductId())->getPrice() * $product->getQuantity()?> eur</span>
            </div>

        </li>

     */
}
 window.onload = cartManipulation;
