<?php
use App\Models\Product;
/** @var Array $data */
/** @var \App\Models\Product $product */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="container-text">
    <img class="img-fluid titulka" src="/public/images/pictures/lucio-patone-Gt4FnWPbjfo-unsplash.jpg" alt="Vetva s olivami" >
    <div class="text-nowrap middle-text">
        Olivový olej..
    </div>
    <div class="" style="align-content: center;">
        <svg id="sipka" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
        </svg>
    </div>
</div>
<div class="row justify-content-between">
    <div class="col-6">
        <nav class="ms-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?c=home">Domov</a></li>
                <li class="breadcrumb-item active" aria-current="page">Olivový olej</li>
            </ol>
        </nav>
    </div>

    <div class="col-6 col-md-4 align-self-end">
        <label for="sorting2" hidden>Triedenie</label>
        <select name="sorting" id="sorting2" class="form-select" form="allfilters" style="max-width: 380px">
            <option name="sorting" id="sort-default" value="3" selected>Zoradiť: Predvolené</option>
            <option name="sorting" id="sort-low" value="1">Cena: od najlacnejších</option>
            <option name="sorting" id="sort-high" value="2">Cena: od najdrhaších</option>
            <option name="sorting" id="sort-new" value="3">Od najnovších</option>
        </select>
    </div>
</div>

<div class="px-2 pt-2 my-1 pb-3 text-center border-bottom">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-2  mb-3 d-none d-lg-block" > <!-- col-md-3 -->
                <form method="post" name="allfilters" id="allfilters">
                    <div class="card ">
                        <div class="card-header">
                            <h5>Filtrovať podľa</h5>
                        </div>
                        <div class="card-body border-bottom">
                            <h6 class="filter-title" data-bs-toggle="collapse" data-bs-target="#price-filter">Cena</h6>
                            <div class="collapse show " id="price-filter">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="price5" id="price-under-5" value="5">
                                    <label class="form-check-label" for="price-under-5">
                                        Pod €5
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="price510" id="price-5-10" value="10">
                                    <label class="form-check-label" for="price-5-10">
                                        €5 - €10
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="price1020" id="price-10-20" value="20">
                                    <label class="form-check-label" for="price-10-20">
                                        €10 - €20
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="price20" id="price-over-20" value="21">
                                    <label class="form-check-label" for="price-over-20">
                                        Nad €20
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!--<button name="submitfilters"  class="btn btn-primary mt-2">Aplikovať </button>-->
                    </div>
                </form>
                <h4 class="mt-2" id="numberOfProductsInCategory">

                </h4>
            </div>
            <div class="col-md-10"> <!-- col-sm-12 -->
                <div class="album py-5 bg-light">
                    <div class="container row row-cols-1 row-cols-md-3  g-6 ps-5 pt-2 " id="categoryproducts">

                        <?php foreach ($data['data'] as $product) {?>

                            <div class="col pb-4">
                                <div class="card h-100">
                                    <a class="nav-link productPage"  id="productPage<?= $product->getId() ?>">
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
<nav class="navbar fixed-bottom navbarbg-light d-lg-none">
    <div class="container-fluid">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
            Filtrovať produkty
        </button>
        <div class="">
            <label for="sorting" hidden> Triedenie </label>
            <select name="sorting" class="form-select" form="allfilters" id="sorting">
                <option selected>Zoradiť: Predvolené</option>
                <option value="1">Cena: Od najlacnejších</option>
                <option value="2">Cena: Od najdrahších</option>
                <option value="3">Novinky</option>
            </select>
        </div>
    </div>
</nav>
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Produktové filtre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card ">
                    <div class="card-header">
                        <h5>Filtrovať podľa</h5>
                    </div>
                    <div class="card-body border-bottom">
                        <h6 class="filter-title" data-bs-toggle="collapse" data-bs-target="#price-filter">Cena</h6>
                        <div class="collapse show " id="price-filter">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="price5" id="price-under-52" value="5" form="allfilters">
                                <label class="form-check-label" for="price-under-52">
                                    Pod €5
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="price510" id="price-5-102" value="10" form="allfilters">
                                <label class="form-check-label" for="price-5-102">
                                    €5 - €10
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="price1020" id="price-10-202" value="20" form="allfilters">
                                <label class="form-check-label" for="price-10-202">
                                    €10 - €20
                                </label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="price20" id="price-over-202" value="21" form="allfilters">
                                <label class="form-check-label" for="price-over-202">
                                    Nad €20
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--<button name="submitfilters"  class="btn btn-primary mt-2">Aplikovať </button>-->
                </div>

            </div>

        </div>
    </div>
</div>