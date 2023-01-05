<?php

namespace App\Core;

interface IValidityChecker
{
    function newsletterSignUp($errors) : bool;
    function getParam($name): string|null ;
    function printErrorMessage($errors, $key): string;
}