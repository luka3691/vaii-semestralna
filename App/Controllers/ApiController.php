<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Message;

class ApiController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html();
    }

    public function getAll(): string
    {
        $msgs = \Models\Message::getAll();
        return $this->html();

    }
    public function getmessage(): string
    {
        $msg = new Message();
        $msg->setMessage($_POST['message']);
        $msg->save();
        return $this->json(true);
    }
}