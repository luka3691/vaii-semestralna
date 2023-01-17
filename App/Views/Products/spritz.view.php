<?php
use App\Models\Product;
/** @var Array $data */
/** @var \App\Models\Product $product */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="container-text">
    <img class="img-fluid titulka" src="/public/images/pictures/federica-ariemma-cSWRV1EXm5I-unsplash.jpg" alt="Poháre so spritz" >
    <div class="text-nowrap middle-text">
        Spritz.
    </div>
</div>
<div class="px-2 pt-2 my-5 pb-3 text-center border-bottom">
    <div class="container text-center">
        <div class="row">

            <div class="col-sm-12">
                <div class="album py-5 px-2  bg-light">
                    <div class="container row row-cols-1 row-cols-md-3 g-6 px-5 pt-2">
                        <?php foreach ($data['data'] as $product) {?>

                            <div class="col pb-4">
                                <div class="card h-100">
                                    <a href="#" class="nav-link">
                                        <img src="public/images/pictures/<?= $product->getImg() ?>" class="card-img-top pt-2" alt="prosecco">
                                        <div class="card-body">
                                            <div class="row justify-content-md-center">
                                                <h5 class="card-title " >
                                                    <?= $product->getName() ?>
                                                </h5>
                                            </div>
                                            <small class="text-nowrap price"> <?= $product->getPrice() ?> eur</small>
                                        </div>
                                    </a>
                                    <div class="card-footer mt-auto">
                                        <?php if ($auth->isLogged()) { ?>
                                            <button  type="button" class="btn btn-primary button-style add-to-cart-working" id="add_<?php echo $product->getId(); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                                                </svg>
                                                Pridať do košíka
                                            </button>
                                        <?php } else { ?>

                                            <button type="button" class="btn btn-primary button-style add-to-cart-blocked">
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
                </div>
            </div>
        </div>
    </div>
</div>