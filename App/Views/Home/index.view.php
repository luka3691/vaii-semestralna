<?php
use \App\Models\Product;
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="container-text">
    <img class="img-fluid titulka" src="/public/images/pictures/vino-kopec.jpg" alt="Víno na kopci" >
    <div class="text-nowrap middle-text">
        Je čas na prosecco.
    </div>
</div>

<div class="px-4 pt-5 my-3 text-center border-bottom">
    <h1 class="display-4 fw-bold elegant-text">Novinky z Talianska.</h1>
    <div class="col-lg-10 pb-3 mx-auto">
        <div class="row row-cols-1 row-cols-md-4 g-6 px-5 pt-2">
            <?php $exists = Product::getAll();
            $x = 0;
            if (count($exists) > 4) {
                $x = 4;
            } else {
                $x = count($exists);
            }
            ?>
            <?php for ($i = 0; $i < $x  ; $i++){?>
                <div class="col pb-4">

                        <div class="card h-100">
                            <a href="#" class="nav-link">
                            <img src="public/images/pictures/<?= $exists[$i]->getImg() ?>" class="card-img-top pt-2" alt="prosecco">
                            <div class="card-body">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-auto">
                                        <h5 class="card-title pb">
                                            <?= $exists[$i]->getName() ?>
                                        </h5>
                                    </div>
                                </div>
                                <small class="text-nowrap price"> <?= $exists[$i]->getPrice() ?> eur</small>
                            </div>
                            </a>
                            <div class="card-footer mt-auto">

                                <?php if ($auth->isLogged()) { ?>
                                    <button id="workingAddButton" type="button" class="btn btn-primary button-style add-to-cart-working">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                                        </svg>
                                        Pridať do košíka
                                    </button>
                                <?php } else { ?>

                                    <button id="blockedAddButton" type="button" class="btn btn-primary button-style add-to-cart-blocked">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                                        </svg>
                                        Pridať do košíka
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                </div>

            <?php } ?>


        </div>

        <a class="btn btn-primary btn-lg px-4 me-sm-3 show-more elegant-button" href="?c=products&a=index" role="button">Zobraziť všetko</a>
    </div>

</div>
<div id="carouselLogo" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <img class="d-block w-15 logo-carousel" src="/public/images/pictures/bedin-logo.png" alt="First slide">
        </div>
        <div class="carousel-item "  data-bs-interval="5000">
            <img class="d-block w-15 logo-carousel" src="/public/images/pictures/italo-cescon-logo.png" alt="Second slide">
        </div>
        <div class="carousel-item "  data-bs-interval="5000">
            <img class="d-block w-15 logo-carousel" src="/public/images/pictures/perlago-logo.png" alt="Third slide">
        </div>
    </div>
</div>
