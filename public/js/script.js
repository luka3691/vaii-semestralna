
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

function addToCart() {
    let workingCartButtons = document.getElementsByClassName("add-to-cart-working");
    for (let i = 0; i < workingCartButtons.length; i++) {
        let theButton = workingCartButtons[i];
        theButton.addEventListener("click", addedToCartAnimation);
        theButton.addEventListener("click", function () {
                cartAction("help", theButton.id);
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
         let response = await fetch(
             "?c=cart&a=addToCart",
             {
                 headers: {
                     'Content-Type': 'application/x-www-form-urlencoded',
                 },
                 method: "POST",
                 body: formBody
             });

         //const data = await response.json();
         console.log(product_code);
         if (response.status != 200) {
             throw new Error("ERROR:" + response.status + " " + response.statusText);
         }

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
 window.onload = addToCart;
