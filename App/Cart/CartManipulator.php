<?php

namespace App\Cart;

use App\Core\ICartManipulator;
use App\Models\Cart;
use App\Models\Cart_item;

class CartManipulator implements ICartManipulator
{
    function addToCart($idItem): bool
    {
        $existingCartItem = Cart_item::getAll("cart_id = ? product_id = ?", [Cart::getOne($_SESSION['user'], $idItem)]);
        if ($existingCartItem[0] == null) {
            $tmpCartItem = new Cart_item();
            $tmpCartItem->setCartId(Cart::getOne($_SESSION['user']));
            $tmpCartItem->setProductId($idItem);
            $tmpCartItem->save();
            return true;
        } else {
            $this->updateQuantity($existingCartItem[0]->getProductId(), $existingCartItem[0]->getQuantity() + 1);
            return true;
        }


    }

    function removeFromCart($idItem): bool
    {
        $existingCartItem = Cart_item::getAll("cart_id = ? product_id = ?", [Cart::getOne($_SESSION['user'], $idItem)]);
        if ($existingCartItem[0] == null) {
            return false;
        } else {
            $existingCartItem[0]->delete();
            return true;
        }
    }

    function updateQuantity($idItem, $quantity): bool
    {
        $existingCartItem = Cart_item::getAll("cart_id = ? product_id = ?", [Cart::getOne($_SESSION['user'], $idItem)]);
        if ($existingCartItem[0] == null) {
            return false;
        } else {
            $existingCartItem[0]->setQuantity($quantity);
            $existingCartItem[0]->save();
            return true;
        }
    }

}