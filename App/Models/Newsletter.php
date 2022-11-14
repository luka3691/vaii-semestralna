<?php

namespace App\Models;

use App\Core\Model;

class Newsletter extends Model
{
    protected $id;
    protected $email;
    protected $confirmed;
    protected $orderUpdate;
    protected $newProduct;
    protected $saleAlert;

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @param mixed $confirmed
     */
    public function setConfirmed($confirmed): void
    {
        $this->confirmed = $confirmed;
    }

    /**
     * @return mixed
     */
    public function getOrderUpdate()
    {
        return $this->orderUpdate;
    }

    /**
     * @param mixed $orderUpdate
     */
    public function setOrderUpdate($orderUpdate): void
    {
        $this->orderUpdate = $orderUpdate;
    }

    /**
     * @return mixed
     */
    public function getNewProduct()
    {
        return $this->newProduct;
    }

    /**
     * @param mixed $newProduct
     */
    public function setNewProduct($newProduct): void
    {
        $this->newProduct = $newProduct;
    }

    /**
     * @return mixed
     */
    public function getSaleAlert()
    {
        return $this->saleAlert;
    }

    /**
     * @param mixed $saleAlert
     */
    public function setSaleAlert($saleAlert): void
    {
        $this->saleAlert = $saleAlert;
    }



}