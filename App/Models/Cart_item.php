<?php

namespace App\Models;

use App\Core\Model;

class Cart_item extends Model
{
    protected $id;
    protected $cart_user_id;
    protected $product_id;
    protected $quantity;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getCartUserId()
    {
        return $this->cart_user_id;
    }

    /**
     * @param mixed $cart_user_id
     */
    public function setCartUserId($cart_user_id): void
    {
        $this->cart_user_id = $cart_user_id;
    }

}