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
        $idCategory = "1";
        return $this->html([
            'data' => Product::getAll("category_id=?", [$idCategory])
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function wine(): Response
    {
        $idCategory = "2";
        return $this->html([
            'data' => Product::getAll("category_id=?", [$idCategory])
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function spritz(): Response
    {
        $idCategory = "3";
        return $this->html([
            'data' => Product::getAll("category_id=?", [$idCategory])
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function oliveoil(): Response
    {
        $idCategory = "4";
        return $this->html([
            'data' => Product::getAll("category_id=?", [$idCategory])
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function search(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        if (isset($formData['submit'])) {
            $search = $formData['search'];
            ;return $this->html(['data' => Product::getAll("name like %?%", [$search])]);

        }
        return $this->html([
             Product::getAll()
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function product(): Response
    {

        return $this->html([
            //Product::getOne()
        ]);

    }





}


