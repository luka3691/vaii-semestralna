



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
        $( "input[type='checkbox']" ).on( "click", listCategoryItems );
        $( "select" ).on( "change", listCategoryItems );
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
    //numberOfItems();
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

    let productPages = document.getElementsByClassName("productPage");
    for (let i = 0; i < productPages.length; i++) {
        let theButton = productPages[i];
        theButton.addEventListener("click", function () {
            openProduct(theButton.id);
        });
    }

}
async function openProduct(product_code) {
    try {
        var product = product_code.slice(11);
        var details = {
            'code': product
        };

        var formBody = [];
        for (var property in details) {
            var encodedKey = encodeURIComponent(property);
            var encodedValue = encodeURIComponent(details[property]);
            formBody.push(encodedKey + "=" + encodedValue);
        }
        console.log(product);

        formBody = formBody.join("&");
        var productWindow = window.open("?c=products&a=product", '_blank');
        let response = await fetch(
            "?c=products&a=productInfo",
            {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                method: "POST",
                body: formBody
            });
        if (response.status !== 200) {
            throw new Error("ERROR:" + response.status + " " + response.statusText);
        }
        let messages = await response.json();
        productWindow.addEventListener("load", function () {
            messages.forEach(product => {
                const {id, name, img, price, desc, category} = product;

                productWindow.document.getElementById("productName").innerHTML = name;
                switch (category){
                    case 1:
                        productWindow.document.getElementById("categoryLink").innerHTML = '<a href="?c=products&a=prosecco">Prosecco</a>';
                        break;
                    case 2:
                        productWindow.document.getElementById("categoryLink").innerHTML = '<a href="?c=products&a=wine">Víno</a>';
                        break;
                    case 3:
                        productWindow.document.getElementById("categoryLink").innerHTML = '<a href="?c=products&a=spritz">Spritz</a>';
                        break;
                    case 4:
                        productWindow.document.getElementById("categoryLink").innerHTML = '<a href="?c=products&a=oliveoil">Olivový olej</a>';
                        break;
                }
                productWindow.document.getElementById("productImage").innerHTML = '<img src="/public/images/pictures/' + img + '" alt="' + name + '" class="img-fluid product-page-img">';
                productWindow.document.getElementById("productLinki").innerHTML = name;
                productWindow.document.getElementById("cena").innerHTML = "€" + price + "  ";
                productWindow.document.getElementById("placeForWorkingCart").innerHTML =
                    '                            <button type="button" id="add_' + id +'" class="btn btn-primary button-style add-to-cart-working">\n' +
                    '                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16" onclick="hello()">\n' +
                    '                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>\n' +
                    '                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>\n' +
                    '                                </svg>\n' +
                    '                                Pridať do košíka\n' +
                    '                            </button>\n' ;

                productWindow.document.getElementById("placeForWorkingCart").innerHTML =
                '                            <button type="button" class="btn btn-primary button-style add-to-cart-blocked">\n' +
                    '                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">\n' +
                    '                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>\n' +
                    '                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>\n' +
                    '                                </svg>\n' +
                    '                                Pridať do košíka\n' +
                    '                            </button>\n';
            });
        })

        /*
        productWindow.onload = function () {
            //productWindow.document.getElementById("productName").innerHTML = "name";

        };*/

    } catch (err) {
        console.log('Request Failed', err);
    }
}
async function contactSend() {
    try {

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
             let response = await fetch(
                 "?c=cart&a=takeFromCart",
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
         } else if (action === "raise") {

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
     } catch (err) {
         console.log('Request Failed', err);
     }
 }



function showCheckCart() {
    document.getElementById('cart-no-plus').setAttribute("height", "0");
    document.getElementById('cart-no-plus').setAttribute("width", "0");
    document.getElementById('cart-no-plus2').setAttribute("height", "0");
    document.getElementById('cart-no-plus2').setAttribute("width", "0");
    document.getElementById('cart-check').setAttribute("height", "16");
    document.getElementById('cart-check').setAttribute("width", "16");
    document.getElementById('cart-check2').setAttribute("height", "16");
    document.getElementById('cart-check2').setAttribute("width", "16");
}
function showNormalCart() {
    document.getElementById('cart-check').setAttribute("height", "0");
    document.getElementById('cart-check').setAttribute("width", "0");
    document.getElementById('cart-check2').setAttribute("height", "0");
    document.getElementById('cart-check2').setAttribute("width", "0");
    document.getElementById('cart-no-plus').setAttribute("height", "16");
    document.getElementById('cart-no-plus').setAttribute("width", "16");

    document.getElementById('cart-no-plus2').setAttribute("height", "16");
    document.getElementById('cart-no-plus2').setAttribute("width", "16");
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
        const {id, cart_user_id, product_id, quantity, name, price, img} = product;
        celkovaSuma += quantity * price;
        productElement.innerHTML += '<li class="list-group-item d-flex justify-content-between lh-sm">\n' +
            '                            <div class="col-2 cart-image-back" style="text-align: left">\n' +
            '                               <img src="public/images/pictures/'+ img +'" class="cart-image pt-2" alt="prosecco"> \n' +
            '                            </div>\n' +
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
    celkovaSuma += 3.9;
    productElement.innerHTML +=  '<li class="list-group-item d-flex justify-content-between align-self-lg-end elegant-text" style="width: 200px">\n' +
        '                        <p >Doprava: </p>\n' +
        '                        <strong >3.90 eur</strong>\n' +
        '                    </li>';
    productElement.innerHTML +=  '<li class="list-group-item d-flex justify-content-between align-self-lg-end elegant-text" style="width: 200px">\n' +
        '                        <p >Platba: </p>\n' +
        '                        <strong >0.00 eur</strong>\n' +
        '                    </li>';
    productElement.innerHTML +=  '<li class="list-group-item d-flex justify-content-between align-self-lg-end elegant-text " style="width: 200px">\n' +
        '                        <strong>Celkova cena: ' + celkovaSuma.toFixed(2) + ' eur</strong>\n' +
        '                    </li>';
    editCart();
}

async function listCategoryItems() {

    var str = $( "#allfilters" ).serialize();
    console.log(str);
    let  response = await fetch(
        "?c=products&a=getCategoryItems",
        {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            method: "POST",
            body: str
        });
    if (response.status !== 200) {
        throw new Error("ERROR:" + response.status + " " + response.statusText);
    }
    let messages = await response.json();
    const productElement = document.getElementById("categoryproducts");
    productElement.innerHTML = " ";
    var numberOfProducts = 0;
    messages.forEach(product => {
        const {id, name, img, price, description, category_id} = product;
        console.log(name);
        numberOfProducts++;
        productElement.innerHTML += '<div class="col pb-4">\n' +
            '                                <div class="card h-100">\n' +
            '                                    <a href="#" class="nav-link">\n' +
            '                                        <img src="public/images/pictures/' + img + '" class="card-img-top pt-2" alt="prosecco">\n' +
            '                                        <div class="card-body">\n' +
            '                                            <div class="row justify-content-md-center">\n' +
            '                                                <h5 class="card-title " >\n' +
                                                                name +
            '                                                </h5>\n' +
            '                                            </div>\n' +
            '                                            <small class="text-nowrap price">' + price +' eur</small>\n' +
            '                                        </div>\n' +
            '                                    </a>\n' +
            '                                    <div class="card-footer mt-auto">\n' +
            '                                            <button  type="button" class="btn btn-primary button-style add-to-cart-working" id="add_<?php echo $product->getId(); ?>">\n' +
            '                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">\n' +
            '                                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>\n' +
            '                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>\n' +
            '                                                </svg>\n' +
            '                                                Pridať do košíka\n' +
            '                                            </button>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                            </div>'
    });
    const numberElement = document.getElementById("numberOfProductsInCategory");
    numberElement.innerHTML = 'Počet nájdených produktov: ' + numberOfProducts + '.';
    addToCart();
}
/*
async function numberOfItems() {

    let response = await fetch("?c=cart&a=getCartItems");
    let messages = await response.json();
    let pocetProduktov = 0;
    const productElement = document.getElementById("numberOfProducts");
    productElement.innerHTML = "";
    messages.forEach(product => {
        const {id, cart_user_id, product_id, quantity, name, price, img} = product;
        pocetProduktov += quantity;

    });
    productElement.innerHTML +=  '<li class="list-group-item d-flex justify-content-between align-self-lg-end elegant-text">\n' +
        '                        <strong>' + celkovaSuma.toFixed(2) + ' eur</strong>\n' +
        '                    </li>';
    editCart();
}
*/




 window.onload = cartManipulation;
