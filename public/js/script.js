
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
    if (document.title === "Košík") {
        listItems();
    } else if (document.title === "ProseccoStore") {
        addToCart();
    }


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
    let contactButton = document.getElementById("submitContact");
    if (contactButton === null) {

    } else {
        contactButton.addEventListener("click", contactSend);
    }


}
async function contactSend() {
    try {
        console.log(document.getElementById("inputName4").value);
        var details = {
            'name': document.getElementById("inputName4").value,
            'organization': document.getElementById("inputOrganization4").value,
            'email': document.getElementById("inputEmail4").value,
            'message': document.getElementById("inputMessage2").value,
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
                "?c=home&a=contactSend",
                {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    method: "POST",
                    body: formBody
                });
            if (response.status !== 204) {
                throw new Error("ERROR:" + response.status + " " + response.statusText);
            }

        const contactElement = document.getElementById("contactFormPage");
        contactElement.innerHTML = "";
        contactElement.innerHTML +=  '<div class="py-5 text-center">\n' +
            '                <h2 class="elegant-text">Budeme Vás kontaktovať na zadaný email.</h2>\n' +
            '            </div>';
        //const data = await response.json();


    } catch (err) {
        console.log('Request Failed', err);
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
         if(action === "add") {
             let response = await fetch(
                 "?c=cart&a=addToCart",
                 {
                     headers: {
                         'Content-Type': 'application/x-www-form-urlencoded',
                     },
                     method: "POST",
                     body: formBody
                 });
             if (response.status !== 204) {
                 throw new Error("ERROR:" + response.status + " " + response.statusText);
             }
         } else if (action === "take") {
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
             if (response.status !== 204) {
                 throw new Error("ERROR:" + response.status + " " + response.statusText);
             }
             listItems();
         } else if (action === "raise") {
             console.log("HElloOOO");
             let  response = await fetch(
                 "?c=cart&a=raiseFromCart",
                 {
                     headers: {
                         'Content-Type': 'application/x-www-form-urlencoded',
                     },
                     method: "POST",
                     body: formBody
                 });
             if (response.status !== 204) {
                 throw new Error("ERROR:" + response.status + " " + response.statusText);
             }
             listItems();
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
    let celkovaSuma = 0.0;
    const productElement = document.getElementById("listOfProducts");
    productElement.innerHTML = "";
    messages.forEach(product => {
        const {id, cart_user_id, product_id, quantity, name, price} = product;
        celkovaSuma += quantity * price;
        productElement.innerHTML += '<li class="list-group-item d-flex justify-content-between lh-sm">\n' +
            '                            <div class="col-6">\n' +
            '                                <h6 class="my-0 elegant-text">'+ name +'</h6>\n' +
            '                            </div>\n' +
            '                            <div class=”col-4”>\n' +
            '                                <div class="quantitySetter">\n' +
            '                                    <div class="container text-center">\n' +
          //  '                                        <div class="row">\n' +
          //  '                                            <div class="col">\n' +
            '                                                <svg id="upi_'+ id +'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus add-quantity-button" viewBox="0 0 16 16">\n' +
            '                                                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"></path>\n' +
            '                                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>\n' +
            '                                                </svg>\n' +
          //  '                                            </div>\n' +
          //  '                                            <div class="col">\n' +
            '                                                <h6 id="qty_'+ id +'" class=”count” style="text-align: left">'+ quantity +'</h6>\n' +
          //  '                                            </div>\n' +
          //  '                                            <div class="col" >\n' +
            '                                                <svg id="dwn_'+ id +'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-minus take-quantity-button" viewBox="0 0 16 16">\n' +
            '                                                    <path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"></path>\n' +
            '                                                    <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"></path>\n' +
            '                                                </svg>\n' +
          //  '                                            </div>\n' +
          //  '                                        </div>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                            <div class="col-2" style="text-align: right">\n' +
            '                                <span id="prc_'+ id +'" class="text-muted elegant-text">'+  (price * quantity).toFixed(2) +'</span>\n' +
            '                            </div>\n' +
            '                        </li>'
    });
    productElement.innerHTML +=  '<li class="list-group-item d-flex justify-content-between align-self-lg-end elegant-text">\n' +
        '                        <strong>' + celkovaSuma.toFixed(2) + ' eur</strong>\n' +
        '                    </li>';
    editCart();
}


 window.onload = cartManipulation;
