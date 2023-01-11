<?php

namespace App\Core;

interface ICartManipulator
{
    function addToCart($idItem) : bool;

    function removeFromCart($idItem) : bool;

    function updateQuantity($idItem, $quantity) : bool;
}