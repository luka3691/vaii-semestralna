<?php
namespace App\Controllers;
use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\Filter;
use App\Models\Product;
use App\Models\User;

class ProductsController extends AControllerBase {

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function index(): Response
    {
        return $this->html([
            'data' => Product::getAll()
        ]);
    }
    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function prosecco(): Response
    {
        $idCategory = "1";
        return $this->html([
            'data' => Product::getAll("category_id=?", [$idCategory])
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function wine(): Response
    {
        $idCategory = "2";
        return $this->html([
            'data' => Product::getAll("category_id=?", [$idCategory])
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function spritz(): Response
    {
        $idCategory = "3";
        return $this->html([
            'data' => Product::getAll("category_id=?", [$idCategory])
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function oliveoil(): Response
    {
        $idCategory = "4";
        return $this->html([
            'data' => Product::getAll("category_id=?", [$idCategory])
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function search(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        if (isset($formData['submitsearch'])) {
            $word = explode(' ',trim($formData['search']))[0];
            $search = '%' . $word . '%';
            return $this->html(['data' => Product::getAll("name like ?", [$search])]);

        }
        return $this->html([
            'data' => Product::getAll()
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function product(): Response
    {
        $formData = $this->app->getRequest()->getPost();

        if (isset($formData['code'])) {
            //return $this->html(['data' => Product::getAll("id = ?", $formData['code'])]);
            return $this->html(['data' => Product::getAll("id = ?", ["2"])]);
            //return $this->html(['data' => Product::getAll("name like %?%", [$word])]);

        }
        return $this->html([
            'data' => Product::getAll("id = ?", ["1"])
        ]);

    }
    /**
     * Product info
     * @return \App\Core\Responses\JsonResponse
     *  @throws \Exception
     */
    public function productInfo() : Response
    {
        $formData = $this->app->getRequest()->getValue("code");
        if (!isset($formData)) {
            $existingProduct = Product::getOne("2");
            $data = [];
            $data[] = [
                'id' => $existingProduct->getId(),
                'name' => $existingProduct->getName(),
                'price' => $existingProduct->getPrice(),
                'img' => $existingProduct->getImg(),
                'desc' => $existingProduct->getDescription(),
                'category' => $existingProduct->getCategoryId()
            ];
            $response = new JsonResponse(array_values($data));
            //$response->generate();
            return $response;
        }
        $existingProduct = Product::getOne($formData);
        $data = [];
            $data[] = [
                'id' => $existingProduct->getId(),
                'name' => $existingProduct->getName(),
                'price' => $existingProduct->getPrice(),
                'img' => $existingProduct->getImg(),
                'desc' => $existingProduct->getDescription(),
                'category' => $existingProduct->getCategoryId()
            ];


        $response = new JsonResponse(array_values($data));
        //$response->generate();
        return $response;
    }

    public function getCategoryItems() : JsonResponse
    {

        $formData = $this->app->getRequest()->getPost();
        $isPost = $_SERVER['REQUEST_METHOD'] == "POST";
        $productID = '';
        $whereClause = '';
        $arrayAll = [];
        $data = [];
        if ($isPost) {
            $array = [];
            if (isset($_POST['price5'])) {
                $whereClause .= 'price = ?';
                $array[] = "1";
            }
            if (isset($_POST['price510'])) {
                if (count($array) >= 1) {
                    $whereClause .= ' OR ';
                }
                $whereClause .= 'price = ?';
                $array[] = "2";
            }
            if (isset($_POST['price1020'])) {
                if (count($array) >= 1) {
                    $whereClause .= ' OR ';
                }
                $whereClause .= 'price = ?';
                $array[] = "3";
            }
            if (isset($_POST['price20'])) {
                if (count($array) >= 1) {
                    $whereClause .= ' OR ';
                }
                $whereClause .= 'price = ?';
                $array[] = "4";
            }
            if (count($array) >= 1) {
                $whereClause = '('. $whereClause . ')';
            }

            $array2 = [];
            $firstFilter = false;
            if (isset($_POST['dry']) || isset($_POST['brut']) || isset($_POST['extrabrut']) || isset($_POST['extradry'])) {
                if (count($array) >= 1) {
                    $whereClause .= ' AND (';
                    $firstFilter = true;
                }
            }
            if (isset($_POST['extradry'])) {
                $whereClause .= 'sweetness = ?';
                $array2[] = "1";
            }
            if (isset($_POST['dry'])) {
                if (count($array2) >= 1) {
                    $whereClause .= ' OR ';
                }
                $whereClause .= 'sweetness = ?';
                $array2[] = "2";
            }
            if (isset($_POST['brut'])) {
                if (count($array2) >= 1) {
                    $whereClause .= ' OR ';
                }
                $whereClause .= 'sweetness = ?';
                $array2[] = "3";
            }
            if (isset($_POST['extradry'])) {
                if (count($array2) >= 1) {
                    $whereClause .= ' OR ';
                }
                $whereClause .= 'sweetness = ?';
                $array2[] = "4";
            }
            if ($firstFilter) {
                $whereClause .= ')';
            }
            $arrayAll = array_merge($array, $array2);
            $orderBy = 'price';
            $items = Filter::getAll($whereClause, $arrayAll, $orderBy);
            //$items = Filter::filterAll($whereClause, $array, $orderBy, false);
            foreach ($items as $filteredItems) {

                $product = Product::getOne($filteredItems->getProductId());
                if (isset($_POST['productCategory'])) {
                    if ($_POST['productCategory'] == $product->getCategoryId()) {
                        $data[] = [
                            'id' => $product->getId(),
                            'name' => $product->getName(),
                            'img' => $product->getImg(),
                            'price' => $product->getPrice(),
                            'description' => $product->getDescription(),
                            'category_id' => $product->getCategoryId()
                        ];
                    }
                } else {
                    $data[] = [
                        'id' => $product->getId(),
                        'name' => $product->getName(),
                        'img' => $product->getImg(),
                        'price' => $product->getPrice(),
                        'description' => $product->getDescription(),
                        'category_id' => $product->getCategoryId()
                    ];
                }

            }

        } else {
            $product = Product::getOne(1);

            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'img' => $product->getImg(),
                'price' => $product->getPrice(),
                'description' => $product->getDescription(),
                'category_id' => $product->getCategoryId()
            ];
        }




        $response = new JsonResponse(array_values($data));
        //$response->generate();
        return $response;
    }
    /*
    public function getSearchItems() : JsonResponse
    {

        $items = Product::getAll("name like '?'", [$existingCart[0]->getId()]);

        $data = [];

        foreach ($items as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'img' => $product->getImg(),
                'price' => $product->getPrice(),
                'description' => $product->getDescription(),
                'category_id' => $product->getCategoryId()
            ];
        }

        $response = new JsonResponse(array_values($data));
        //$response->generate();
        return $response;
    }
*/


}


