
<?php
use App\Models\Product;
/** @var Array $data */
/** @var Product $product */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="container-text">
    <img class="img-fluid titulka" src="/public/images/pictures/prosecco-main.jpg" alt="Víno na kopci" >
    <div class="text-nowrap middle-text">
        Originálne talianske produkty.
    </div>
    <div class="" style="align-content: center">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
        </svg>
    </div>
</div>
<div class="px-2 pt-2 my-5 pb-3 text-center border-bottom">
    <div class="container text-center">
        <div class="row">
            <div class="col-12 col-md-4 mb-3">
                <select class="form-select">
                    <option selected>Sort by: Featured</option>
                    <option value="1">Price: Low to High</option>
                    <option value="2">Price: High to Low</option>
                    <option value="3">Newest Arrivals</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2  mb-3"> <!-- col-md-3 -->
                <div class="card">
                    <div class="card-header">
                        <h5>Filtrovať podľa</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="filter-title" data-bs-toggle="collapse" data-bs-target="#price-filter">Cena</h6>
                        <div class="collapse show" id="price-filter">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="price-under-10">
                                <label class="form-check-label" for="price-under-10">
                                    Pod €10
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="price-10-20">
                                <label class="form-check-label" for="price-10-20">
                                    €10 - €20
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="price-20-30">
                                <label class="form-check-label" for="price-20-30">
                                    €20 - €30
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="price-over-30">
                                <label class="form-check-label" for="price-over-30">
                                    Nad €30
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="filter-title" data-bs-toggle="collapse" data-bs-target="#sugar-filter">Cukornatosť</h6>
                        <div class="collapse show" id="sugar-filter">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="extra-dry">
                                <label class="form-check-label" for="extra-dry">
                                    Extra dry
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="dry">
                                <label class="form-check-label" for="dry">
                                    Dry
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="brut">
                                <label class="form-check-label" for="brut">
                                    Brut
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="extra-brut">
                                <label class="form-check-label" for="extra-brut">
                                    Extra brut
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Aplikovať </button>
                </div>
            </div>
            <div class="col-md-10"> <!-- col-sm-12 -->
                <div class="album py-5 bg-light">
                    <div class="container row row-cols-1 row-cols-md-3  g-6 ps-5 pt-2 categoryproducts">

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
<nav class="navbar fixed-bottom navbarbg-light d-lg-none">
    <div class="container-fluid">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
            Filtrovať produkty
        </button>
        <div class="">
            <select class="form-select">
                <option selected>Triediť podľa: Predvolené</option>
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
                <h5 class="modal-title" id="filterModalLabel">Product Filters</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category">
                            <option selected>All Categories</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price Range</label>
                        <input type="range" class="form-range" min="0" max="100" id="price">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="red" id="red">
                            <label class="form-check-label" for="red">
                                Red
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="blue" id="blue">
                            <label class="form-check-label" for="blue">
                                Blue
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="green" id="green">
                            <label class="form-check-label" for="green">
                                Green
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="small" id="small">
                            <label class="form-check-label" for="small">
                                Small
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="medium" id="medium">
                            <label class="form-check-label" for="medium">
                                Medium
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="large" id="large">
                            <label class="form-check-label" for="large">
                                Large
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Apply Filters</button>
            </div>
        </div>
    </div>
</div>