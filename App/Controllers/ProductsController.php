<?php
namespace App\Controllers;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Product;

class ProductsController extends AControllerBase {

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function index(): Response
    {
        return $this->html([
            'data' => Product::getAll()
        ]);
    }
    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function prosecco(): Response
    {
        return $this->html([
            'data' => Product::getAll()
        ]);
    }
    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function search(): Response
    {
        return $this->html([
            'data' => Product::getAll()
        ]);
    }
}


