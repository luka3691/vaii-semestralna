<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Core\IValidityChecker;

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

        $errors = [];
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

                if (empty($errors)) {
                    $exists = \App\Models\User::getAll("email = ?", [$email]);
                    if (count($exists) == 0) {
                        $newUser = new \App\Models\User();
                        $newUser->setEmail($email);
                        $newUser->setPassword();
                        $newUser->setOrderUpdate(1);
                        $newUser->setNewProduct(1);
                        $newUser->setSaleAlert(1);
                        $newUser->save();
                        return true;
                    } else {
                        $errors['email'] = "Emailová adresa je už zaregistrovana.";
                        return false;
                    }
                }
            }
        }
        return false;
    }
}