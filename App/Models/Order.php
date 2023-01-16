<?php

namespace App\Models;

use App\Core\Model;

class Order extends Model
{
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $oneaddress;
    protected $twoaddress;
    protected $country;
    protected $zip;
    protected $note;
    protected $cart_id;

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
    public function setId($order_id): void
    {
        $this->id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
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
    public function getOneaddress()
    {
        return $this->oneaddress;
    }

    /**
     * @param mixed $oneaddress
     */
    public function setOneaddress($oneaddress): void
    {
        $this->oneaddress = $oneaddress;
    }

    /**
     * @return mixed
     */
    public function getTwoaddress()
    {
        return $this->twoaddress;
    }

    /**
     * @param mixed $twoaddress
     */
    public function setTwoaddress($twoaddress): void
    {
        $this->twoaddress = $twoaddress;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note): void
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getCartId()
    {
        return $this->cart_id;
    }

    /**
     * @param mixed $cart_id
     */
    public function setCartId($cart_id): void
    {
        $this->cart_id = $cart_id;
    }

}