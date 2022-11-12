<?php
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="container-text">
    <img class="img-fluid titulka" src="public/images/pictures/vino-kopec.jpg" alt="Víno na kopci" >
    <div class="text-nowrap middle-text">
        Je čas na prosecco.
    </div>
</div>

<div class="px-4 pt-5 my-3 text-center border-bottom">
    <h1 class="display-4 fw-bold elegant-text">Novinky z Talianska.</h1>
    <div class="col-lg-10 mx-auto">
        <div class="row row-cols-1 row-cols-md-4 g-6 px-5 pt-2">
            <?php $exists = \App\Models\Product::getAll();
            $x = 0;
            if (count($exists) > 4) {
                $x = 5;
            } else {
                $x = count($exists);
            }
            ?>
            <?php for ($i = 0; $i < $x  ; $i++){?>
                <div class="col pb-4">
                    <a href="#" class="nav-link">
                        <div class="card h-100">
                            <img src="public/images/pictures/<?= $exists[$i]->getImg() ?>" class="card-img-top pt-2" alt="prosecco">
                            <div class="card-body">
                                <h5 class="card-title pb">
                                    <?= $exists[$i]->getName() ?>
                                </h5>

                            </div>
                            <div class="card-footer">
                                <small class="text-nowrap price"> <?= $exists[$i]->getPrice() ?> eur</small>


                            </div>
                        </div>
                    </a>
                </div>

            <?php } ?>


        </div>
        <div class="d-grid d-sm-flex justify-content-sm-center mb-5 pt-3">
            <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3 show-more elegant-button">Zobraziť všetko</button>
        </div>
    </div>

</div>
<div id="carouselLogo" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <img class="d-block w-15 logo-carousel" src="public/images/pictures/bedin-logo.png" alt="First slide">
        </div>
        <div class="carousel-item "  data-bs-interval="5000">
            <img class="d-block w-15 logo-carousel" src="public/images/pictures/italo-cescon-logo.png" alt="Second slide">
        </div>
        <div class="carousel-item "  data-bs-interval="5000">
            <img class="d-block w-15 logo-carousel" src="public/images/pictures/perlago-logo.png" alt="Third slide">
        </div>
    </div>
</div>
