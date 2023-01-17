<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\Contact;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class HomeController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return true;
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function contact(): Response
    {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\JsonResponse
     */
    public function contactSend(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $contact = new Contact();
        $contact->setName($formData['name']);
        $contact->setOrganization($formData['organization']);
        $contact->setEmail($formData['email']);
        $contact->setMessage($formData['message']);
        $contact->save();
        http_response_code(204);
        return new JsonResponse(true);
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function about(): Response
    {
        return $this->html();
    }
}