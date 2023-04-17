<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\Product;
use App\Models\User;

class CartController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html();
    }
    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function cart(): Response
    {
        $idCategory = "1";
        $users = User::getAll("email = ?", [$this->app->getAuth()->getLoggedUserName()]);
        $existingCart = Cart::getAll("user_id = ?", [$users[0]->getId()]);
        //$existingProductInCart = Cart_item::getAll("cart_id = ? product_id = ?", [$existingCart[0], $formData]);

        return $this->html([
            'data' => Cart_item::getAll("cart_user_id = ?", [$existingCart[0]->getId()])
        ]);
    }
    /**
     * Register a user
     * @return \App\Core\Responses\JsonResponse
     *  @throws \Exception
     */
    public function addToCart() : Response
    {
        $formData = $this->app->getRequest()->getValue("code");
        //$cisielko = $formData['code'];


        $users = User::getAll("email = ?", [$this->app->getAuth()->getLoggedUserName()]);
        $existingCart = Cart::getAll("user_id = ?", [$users[0]->getId()]);
        //$existingProductInCart = Cart_item::getAll("cart_id = ? product_id = ?", [$existingCart[0], $formData]);
        $existingProductInCart = Cart_item::getAll("cart_user_id = ? and product_id = ?", [$existingCart[0]->getId(), $formData]);


       if (sizeof($existingProductInCart) == 0) {
           $tmpCartItem = new Cart_item();
           $tmpCartItem->setCartUserId($existingCart[0]->getId());
           $tmpCartItem->setProductId($formData);
           $tmpCartItem->setQuantity(1);
           $tmpCartItem->save();
        }
        http_response_code(204);
       return new JsonResponse(2);
    }
    /**
     * Register a user
     * @return \App\Core\Responses\JsonResponse
     *  @throws \Exception
     */
    public function takeFromCart() : Response
    {
        $formData = $this->app->getRequest()->getValue("code");
        $existingProductInCart = Cart_item::getOne($formData);
        if ($existingProductInCart->getQuantity() == 1) {
            //$po
            //cetProduktov = intval($existingProductInCart[0]->getQuantity()) + 1;
            $existingProductInCart->delete();
        } else {
            $tmpQuantity = $existingProductInCart->getQuantity() - 1;

            $existingProductInCart->setQuantity($tmpQuantity);
            $existingProductInCart->save();
            //$response = new JsonResponse($tmpQuantity);
            echo json_encode($tmpQuantity);
            //return $response;
        }
        http_response_code(204);
        return new JsonResponse(0);
    }
    /**
     * Register a user
     * @return \App\Core\Responses\JsonResponse
     *  @throws \Exception
     */
    public function raiseFromCart() : Response
    {
        $formData = $this->app->getRequest()->getValue("code");
        $existingProductInCart = Cart_item::getOne($formData);
        if ($existingProductInCart != null) {
            $tmpQuantity = $existingProductInCart->getQuantity() + 1;

            $existingProductInCart->setQuantity($tmpQuantity);
            $existingProductInCart->save();
            echo json_encode($tmpQuantity);
        }


        http_response_code(204);
        return new JsonResponse(0);
    }

    /**
     * Register a user
     * @return \App\Core\Responses\JsonResponse
     *  @throws \Exception
     */

    public function getCartItems() : JsonResponse
    {
        $users = User::getAll("email = ?", [$this->app->getAuth()->getLoggedUserName()]);
        $existingCart = Cart::getAll("user_id = ?", [$users[0]->getId()]);
        //$existingProductInCart = Cart_item::getAll("cart_id = ? product_id = ?", [$existingCart[0], $formData]);
        $existingProductInCart = Cart_item::getAll("cart_user_id = ?", [$existingCart[0]->getId()]);

        $data = [];

        foreach ($existingProductInCart as $product) {
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
    public function getNumberOfCartItems() : JsonResponse
    {
        $users = User::getAll("email = ?", [$this->app->getAuth()->getLoggedUserName()]);
        $existingCart = Cart::getAll("user_id = ?", [$users[0]->getId()]);
        //$existingProductInCart = Cart_item::getAll("cart_id = ? product_id = ?", [$existingCart[0], $formData]);
        $existingProductInCart = Cart_item::getAll("cart_user_id = ?", [$existingCart[0]->getId()]);

        $data = [];

        foreach ($existingProductInCart as $product) {
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