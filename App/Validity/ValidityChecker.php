<?php

namespace App\Validity;

use App\Core\IValidityChecker;
use App\Models\Cart;
use App\Models\User;

class ValidityChecker implements IValidityChecker
{
    public function __construct() {
        //session_start();
    }

    function getParam($name): string|null
    {
        return isset($_POST[$name]) ? htmlspecialchars(trim($_POST[$name]), ENT_QUOTES) : null;
    }

    function printErrorMessage($errors, $key): string
    {
        if (isset($errors[$key])) {
            return "<h5 class='form-error' style='color: red'>{$errors[$key]}</h5>";
        }
        return "";
    }
    function newsletterSignUp($errors) : bool
    {

        $isPost = $_SERVER['REQUEST_METHOD'] == "POST";
        if ($isPost) {
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            if (!$email) {
                $errors['email'] = "Emailová adresa nie je platná.";
                return false;
            } else {

                if (empty($errors)) {
                    $exists = \App\Models\Newsletter::getAll("email = ?", [$email]);
                    if (count($exists) == 0) {
                        $newsletter = new \App\Models\Newsletter();
                        $newsletter->setEmail($email);
                        $newsletter->setConfirmed(0);
                        $newsletter->setOrderUpdate(1);
                        $newsletter->setNewProduct(1);
                        $newsletter->setSaleAlert(1);
                        $newsletter->save();
                        return true;
                    } else {
                        $errors['email'] = "Emailová adresa je už prihlásená na odber.";
                        return false;
                    }
                }
            }
        }
        return false;
    }
    function newsletterEdit($errors) : bool
    {

        //$errors = [];
        $isPost = $_SERVER['REQUEST_METHOD'] == "POST";
        if ($isPost) {
            $email = null;
            if (isset($_POST['email2'])) {
                $email = filter_var($_POST['email2'], FILTER_VALIDATE_EMAIL);
            } else {
                $email = filter_var($_POST['email3'], FILTER_VALIDATE_EMAIL);
            }

            if (!$email) {
                $errors['email'] = "Emailová adresa nie je platná.";
            } else {

                if (empty($errors)) {
                    $exists = \App\Models\Newsletter::getAll("email = ?", [$email]);
                    if (count($exists) == 0) {
                        $errors['email'] = "Emailová adresa nie je v nasej datbaze.";

                    } else {
                        if (isset($_POST['submit'])) {
                            if (isset($_POST['gridCheck1']) && $_POST['gridCheck1'] == "true") {
                                $exists[0]->setOrderUpdate(1);
                            } else {
                                $exists[0]->setOrderUpdate(0);
                            }
                            if (isset($_POST['gridCheck2'])) {
                                $exists[0]->setNewProduct(1);
                            } else {
                                $exists[0]->setNewProduct(0);
                            }
                            if (isset($_POST['gridCheck3'])) {
                                $exists[0]->setSaleAlert(1);
                            } else {
                                $exists[0]->setSaleAlert(0);
                            }
                            $exists[0]->save();
                        } elseif (isset($_POST['delete'])) {
                            $exists[0]->delete();
                        }
                    }
                }
            }
        }
        return false;
    }
    function registration($errors) : bool
    {
        $isPost = $_SERVER['REQUEST_METHOD'] == "POST";
        if ($isPost) {
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            if (!$email) {
                $errors['email'] = "Emailová adresa nie je platná.";
                return false;
            } else if (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 20) {
                $errors['password'] = "Heslo nesplna požiadavky.";

            } else {


            }
        }
        return false;
    }
    function ordering($errors) : bool
    {
        $isPost = $_SERVER['REQUEST_METHOD'] == "POST";
        if ($isPost) {
            //$formData = $this->app->getRequest()->getPost();
            $users = User::getAll("email = ?", [$_SESSION['user']]);
            $existingCart = Cart::getAll("user_id = ?", [$users[0]->getId()]);
            //$existingProductInCart = Cart_item::getAll("cart_id = ? product_id = ?", [$existingCart[0], $formData]);



            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

            if (!$email) {
                $errors['email'] = "Emailová adresa nie je platná.";
                return false;
            } else {

                if (empty($errors)) {
                    $order = new \App\Models\Order();
                    $order->setFirstName($_POST['firstName']);
                    $order->setLastName($_POST['lastName']);
                    $order->setEmail($_POST['email']);
                    $order->setOneaddress($_POST['address']);
                    $order->setTwoaddress($_POST['address2']);
                    $order->setCountry("Slovakia");
                    $order->setZip($_POST['zip']);
                    $order->setNote($_POST['cc-sprava']);
                    //$order->setCartId($existingCart[0]->getId());
                    $order->setCartId($existingCart[0]->getId());
                    $order->save();
                    $existingCart[0]->delete();
                    $newCart = new Cart();
                    $newCart->setUserId($users[0]->getId());
                    $newCart->save();
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }
}