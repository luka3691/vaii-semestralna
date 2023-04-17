<?php
namespace App\Controllers;
use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\Cart;
use App\Models\Cart_item;
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
        if (isset($formData['submit'])) {
            $search = $formData['search'];
            ;return $this->html(['data' => Product::getAll("name like %?%", [$search])]);

        }
        return $this->html([
             Product::getAll()
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function product(): Response
    {

        return $this->html([
            //Product::getOne()
        ]);

    }

    public function getCategoryItems() : JsonResponse
    {

        $items = Product::getAll("category_id = ?", [$existingCart[0]->getId()]);

        $data = [];

        foreach ($items as $product) {
            $data[] = [
                'id' => $product->getId(),
                'cart_user_id' => $product->getCartUserId(),
                'product_id' => $product->getProductId(),
                'quantity' => $product->getQuantity(),
                'name' => Product::getOne($product->getProductId())->getName(),
                'price' => Product::getOne($product->getProductId())->getPrice(),
                'img' => Product::getOne($product->getProductId())->getImg()
            ];
        }

        $response = new JsonResponse(array_values($data));
        //$response->generate();
        return $response;
    }



}


