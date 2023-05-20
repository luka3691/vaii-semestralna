<?php
use App\Models\Product;
/** @var Array $data */
/** @var Product $product */
/** @var \App\Core\IAuthenticator $auth */
?>
<body>
<div class="container mt-5">
    <div class="row" style="height: 30px;">

    </div>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?c=home">Domov</a></li>
            <li class="breadcrumb-item" id="categoryLink"><a href="?c=products&a=prosecco"></a></li>
            <li class="breadcrumb-item active" id="productLinki" aria-current="page">  </li>

        </ol>
    </nav>
    <div class="row ">
        <div class="col-lg-6 align-content-center" id="productImage">
            <img src="/public/images/pictures/Concadoro-dO-Millesimato.png" alt="Papalin 7-Rocny" class="img-fluid product-page-img">
        </div>
        <div class="col-lg-6 border border-1">
            <h1 class="fw-bold" id="productName">

            </h1>
            <p class="my-4" style="font-size: small"><h6 style="flood-color: silver">
                Popis
            </h6>
            <p id="description"> Víno je vynikajúcou vzorkou prosecco superiore. Hrozno zreje na kopcoch Conegliano a Valdobbiadene – jedinečné miesto s priaznivým podnebím, ovplyvnené horami a morom. Toto všetko prispievaja k tvorbe intenzívne aromatického prosecca.</p>
            <span class="fw-bold text-primary" id="cena" style="font-size: xx-large"></span><span>  / ks</span>
            <div class="mt-2">
                <p style="color: forestgreen"> Na sklade.</p>
            </div>

            <div class="mt-4">
                <div class="row">
                    <div class="col-2">
                        <label for="inputQunt" hidden>Quantity</label>
                        <input type="number" class="form-control" id="inputQunt" aria-describedby="quantityCount" placeholder="1">
                    </div>
                    <div class="col-5" id="cartButtons">
                        <?php if ($auth->isLogged()) { ?>
                            <div id="placeForWorkingCart">
                                <button type="button" id="add_1" class="btn btn-primary button-style add-to-cart-working">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16" onclick="hello()">
                                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                                    </svg>
                                    Pridať do košíka
                                </button>
                            </div>
                        <?php } else { ?>
                            <div id="placeForNotWorkingCart">
                                <button type="button" class="btn btn-primary button-style add-to-cart-blocked">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                                    </svg>
                                    Pridať do košíka
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>


            <div class="card border-light mt-3">
                <div class="card-header" data-bs-toggle="collapse" data-bs-target="#info-doprava">
                    <h5>Možnosti dopravy a platby.</h5>
                </div>
                <div class="card-body collapse hiding" id="info-doprava">
                    <p class="card-text">Doručovací partneri: Sloveská pošta, DPD, DHL. Ceny dopravy od 3,90€. Príjmame platby debetnou alebo kreditnou kartou a aj platbu na dobierku.</p>
                </div>
            </div>
            <div class="card border-light my-2">
                <div class="card-header" data-bs-toggle="collapse" data-bs-target="#info-vratenie">
                    <h5>Vrátenie a reklamácia.</h5>
                </div>
                <div class="card-body collapse hiding" id="info-vratenie">
                    <p class="card-text">Zakúpeny produkt po kontaktovaní zákaznického servisu môžete do 14 dní vrátiť. Reklamácie po otvorení produktu nepríjmame.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 ">
        <div class="col-lg-12">
            <h2 class="fw-bold">Ďalšie informácie</h2>

            <ul class="list-group list-group-flush mt-3">
                <li class="list-group-item">Podiel alkoholu: 11,5 %</li>
                <li class="list-group-item">Veľkosť: 0,75 l</li>
                <li class="list-group-item">Cukornatosť: Brut</li>
                <li class="list-group-item">Značka: Conca d'Oro</li>
            </ul>
        </div>
    </div>
    <div class="px-4 pt-5 my-3 text-center border-bottom">
        <h1 class="display-4 fw-bold elegant-text">Súvisiace produkty.</h1>
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
                            <a  class="nav-link productPage"  id="productPage<?= $exists[$i]->getId() ?>"> <!--href="?c=products&a=product"-->
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
                                    <button type="button" id="add_<?php echo $exists[$i]->getId(); ?>" class="btn btn-primary button-style add-to-cart-working">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16" onclick="hello()">
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
