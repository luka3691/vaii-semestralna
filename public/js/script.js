
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
        });
    }
    let takeQuantityButton = document.getElementsByClassName("take-quantity-button");
    for (let i = 0; i < takeQuantityButton.length; i++) {
        let theButton = takeQuantityButton[i];
        theButton.addEventListener("click", function () {
            cartAction("take", theButton.id);
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
 window.onload = cartManipulation;
