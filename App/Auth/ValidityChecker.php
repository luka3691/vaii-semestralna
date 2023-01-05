<?php

namespace App\Auth;

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
}