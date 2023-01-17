<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect("?c=home");
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect("?c=home");
    }

    /**
     * Newletter edit
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function newsletter(): Response
    {
        $errors = [];
        $data = [];
        $formData = $this->app->getRequest()->getPost();
        if (isset($formData['submit'])) {
            if ($this->app->getValidator()->newsletterEdit($errors) === false) {
                $data = ['success' => false, 'email2' => 'Email nie je platný!', 'email3' => ''];
            } else {
                $data = ['success' => true, 'email2' => '', 'email3' => ''];
            }

        } else if (isset($formData['delete'])) {
            if ($this->app->getValidator()->newsletterEdit($errors) === false) {
                $data = ['success' => false, 'email2' => '', 'email3' => 'Email nie je platný!'];
            } else {
                $data = ['success' => true, 'email2' => '', 'email3' => ''];
            }
        } else {
            $data = ['success' => false, 'email2' => '', 'email3' => ''];
        }
        return $this->html($data);
    }
    /**
     * Register a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function register(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->register($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect("?c=home");
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }
}