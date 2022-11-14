 function addedToCartAnimation() {
    let cartButtons = document.getElementsByClassName("add-to-cart");
    for (let i = 0; i < cartButtons.length; i++) {
        let theButton = cartButtons[i];
        theButton.onclick  = function() {
            showCheckCart();
            var timeleft = 1;
            var downloadTimer = setInterval(function(){
                if(timeleft <= 0){
                    showNormalCart();
                    clearInterval(downloadTimer);
                }
                timeleft -= 1;
            }, 1000);
        }
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

 window.onload = addedToCartAnimation;