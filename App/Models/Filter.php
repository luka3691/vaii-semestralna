<?php

namespace App\Models;

use App\Core\Model;

class Filter extends Model
{
    protected $id;
    protected $product_id;
    protected $price;
    protected $sweetness;

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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getSweetness()
    {
        return $this->sweetness;
    }

    /**
     * @param mixed $sweetness
     */
    public function setSweetness($sweetness): void
    {
        $this->sweetness = $sweetness;
    }

}