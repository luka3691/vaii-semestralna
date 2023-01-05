<?php

namespace App\Config;

use App\Auth\Authenticator;
use App\Auth\ValidityChecker;

/**
 * Class Configuration
 * Main configuration for the application
 * @package App\Config
 */
class Configuration
{
    public const APP_NAME = 'ProseccoStore';
    public const FW_VERSION = '2.0';

    public const DB_HOST = 'db';  // change to db, if docker you use docker
    public const DB_NAME = 'ins';

    public const DB_USER = 'root'; // change to vaiicko_user, if docker you use docker
    public const DB_PASS = 'dtb456';

    public const LOGIN_URL = '?c=auth&a=login';

    public const ROOT_LAYOUT = 'root';

    public const DEBUG_QUERY = false;

    public const AUTH_CLASS = Authenticator::class;
    public const VALIDATOR_CLASS = ValidityChecker::class;
}