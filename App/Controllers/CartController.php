<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Cart;
use App\Models\Cart_item;
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
        /*
        $existingCartItem = Cart_item::getAll("cart_id = ? product_id = ?", [Cart::getOne($_SESSION['user']), $_POST['code']]);
        if ($existingCartItem[0] == null) {
            $tmpCartItem = new Cart_item();
            $tmpCartItem->setCartId(Cart::getOne($_SESSION['user'])->getId());
            $tmpCartItem->setProductId($_POST['code']);
            $tmpCartItem->save();
            http_response_code(204);
        } else {
            //$this->updateQuantity($existingCartItem[0]->getProductId(), $existingCartItem[0]->getQuantity() + 1);
            throw new Exception("Invalid API call", 400);
        }
        */

    }
    /**
     * Register a user
     * @return \App\Core\Responses\JsonResponse
     *  @throws \Exception
     */
    public function takeFromCart() : Response
    {
        $formData = $this->app->getRequest()->getValue("code");
        //$cisielko = $formData['code'];

        $existingProductInCart = Cart_item::getOne($formData);


        if ($existingProductInCart == null) {

        } else if ($existingProductInCart->getQuantity() == 1) {
            //$po
            //cetProduktov = intval($existingProductInCart[0]->getQuantity()) + 1;
            $existingProductInCart->delete();
        } else {
            $tmpQuantity = $existingProductInCart->getQuantity() - 1;

            $existingProductInCart->setQuantity($tmpQuantity);
            $existingProductInCart->save();
            echo json_encode($tmpQuantity);
        }


        http_response_code(204);
        /*
        $existingCartItem = Cart_item::getAll("cart_id = ? product_id = ?", [Cart::getOne($_SESSION['user']), $_POST['code']]);
        if ($existingCartItem[0] == null) {
            $tmpCartItem = new Cart_item();
            $tmpCartItem->setCartId(Cart::getOne($_SESSION['user'])->getId());
            $tmpCartItem->setProductId($_POST['code']);
            $tmpCartItem->save();
            http_response_code(204);
        } else {
            //$this->updateQuantity($existingCartItem[0]->getProductId(), $existingCartItem[0]->getQuantity() + 1);
            throw new Exception("Invalid API call", 400);
        }
        */

    }
    /**
     * Register a user
     * @return \App\Core\Responses\JsonResponse
     *  @throws \Exception
     */
    public function raiseFromCart() : Response
    {
        $formData = $this->app->getRequest()->getValue("code");
        //$cisielko = $formData['code'];

        $existingProductInCart = Cart_item::getOne($formData);


        if ($existingProductInCart == null) {

        } else {
            $tmpQuantity = $existingProductInCart->getQuantity() + 1;

            $existingProductInCart->setQuantity(1);
            $existingProductInCart->save();
            echo json_encode($tmpQuantity);
        }


        http_response_code(204);
        /*
        $existingCartItem = Cart_item::getAll("cart_id = ? product_id = ?", [Cart::getOne($_SESSION['user']), $_POST['code']]);
        if ($existingCartItem[0] == null) {
            $tmpCartItem = new Cart_item();
            $tmpCartItem->setCartId(Cart::getOne($_SESSION['user'])->getId());
            $tmpCartItem->setProductId($_POST['code']);
            $tmpCartItem->save();
            http_response_code(204);
        } else {
            //$this->updateQuantity($existingCartItem[0]->getProductId(), $existingCartItem[0]->getQuantity() + 1);
            throw new Exception("Invalid API call", 400);
        }
        */

    }
}