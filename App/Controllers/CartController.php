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
        return $this->html([
            'data' => Cart::getAll("user_id=?", [$this->app->getAuth()->getLoggedUserId()])
        ]);
    }
    /**
     * Register a user
     * @return \App\Core\Responses\JsonResponse
     *  @throws \Exception
     */
    public function addToCart() : Response
    {
        //$formData = $this->app->getRequest()->getPost();
        //$cisielko = $formData['code'];
        $tmpCartItem = new Cart_item();
        $users = User::getAll("email = ?", [$this->app->getAuth()->getLoggedUserName()]);
        $existingCart = Cart::getAll("user_id = ?", [$users[0]->getId()]);
        $tmpCartItem->setCartUserId($existingCart[0]->getId());
        //$tmpCartItem->setProductId(sizeof($formData));
        $tmpCartItem->setProductId(4);
        $tmpCartItem->setQuantity(1);
        $tmpCartItem->save();
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