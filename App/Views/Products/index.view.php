
<?php
use App\Models\Product;
/** @var Array $data */
/** @var \App\Models\Product $product */

?>

<div class="container-text">
    <img class="img-fluid titulka" src="public/images/pictures/prosecco-main.jpg" alt="Víno na kopci" >
    <div class="text-nowrap middle-text">
        Prosecco.
    </div>
</div>
<div class="px-2 pt-2 my-5 pb-3 text-center border-bottom">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-2">
                <h1 class="display-6 ">Filtre</h1>
                <h5 class="">Tu budú filtre</h5>
            </div>
            <div class="col-sm-10">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="col-lg-10 mx-auto ">
                            <div class="row row-cols-5 row-cols-md-3 g-6 px-5 pt-2 ">
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
                                                <img src="public/images/pictures/prosecco-example.png" class="card-img-top pt-2" alt="prosecco">
                                                <div class="card-body">
                                                    <h5 class="card-title">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>