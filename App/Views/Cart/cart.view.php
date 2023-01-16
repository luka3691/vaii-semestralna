<?php
$layout = 'cart';
/** @var Array $data */
/** @var \App\Models\Cart_item $product */
/** @var \App\Core\IValidityChecker $validator */
?>
<div class="container">
    <main>
        <?php
        $errors = [];
        if ($validator->ordering($errors)) {
            ?>
            <div class="py-5 text-center">
                <!--<img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                -->
                <h2>Ďakujeme za otázku ohľadom cenovej ponuky.</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
            </div>
            <?php
        } else { ?>


        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Produkty v košíku</span>
                </h4>

                <ul class="list-group mb-3" id="listOfProducts">

                    <?php foreach ($data['data'] as $product) {?>

                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div class="col-5">
                                <h6 class="my-0"><?=\App\Models\Product::getOne( $product->getProductId())->getName()?></h6>
                            </div>
                            <div class=”col-3”>
                                <div class="quantitySetter">
                                    <div class="container text-center">
                                        <div class="row">
                                            <div class="col-1">
                                                <svg id="upi_<?php echo $product->getId(); ?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus add-quantity-button" viewBox="0 0 16 16">
                                                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"></path>
                                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>
                                                </svg>
                                            </div>
                                            <div class="col-1">
                                                <h6 id="qty_<?php echo $product->getId(); ?>" class=”count”><?php echo $product->getQuantity(); ?></h6>
                                            </div>
                                            <div class="col-1" >
                                                <svg id="dwn_<?php echo $product->getId(); ?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-minus take-quantity-button" viewBox="0 0 16 16">
                                                    <path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"></path>
                                                    <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3" style="text-align: right">
                                <span id="prc_<?php echo $product->getId(); ?>" class="text-muted"><?=\App\Models\Product::getOne( $product->getProductId())->getPrice() * $product->getQuantity()?> eur</span>
                            </div>

                        </li>

                    <?php } ?>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Orientačná cena</span>

                            <strong>
                                <?php
                                $suma = 0;
                                foreach ($data['data'] as $product) {
                                    $suma +=  \App\Models\Product::getOne( $product->getProductId())->getPrice() * $product->getQuantity();
                                }
                                echo $suma;
                                ?> eur
                            </strong>
                        </li>

                </ul>

            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Fakturačné údaje</h4>
                <form class="needs-validation" method="post" action="<?= "?c=cart&a=cart" ?>">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Meno</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Priezvisko</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Adresa</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Adresa 2 <span class="text-muted">(nepovinné)</span></label>
                            <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Krajina</label>
                            <select class="form-select" id="country" name="country" disabled>
                                <option>Slovensko</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="zip" class="form-label">PSČ</label>
                            <input type="number" class="form-control" id="zip" name="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Správa / Poznámka</h4>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <label for="cc-name" class="form-label">Bližšie informácie o vašej žiadosti o cenovú ponuku.</label>
                            <textarea class="form-control" id="cc-sprava" name="cc-sprava" rows="3"></textarea>
                        </div>

                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Získať cenovú ponuku</button>
                </form>
            </div>
        </div>  <?php } ?>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017–2022 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>