<?php
/**
 * Created by PhpStorm.
 * User: Стас
 * Date: 16.03.2017
 * Time: 17:19
 */

namespace Shop;

use xbuw\framework\Controller\Controller;
use xbuw\framework\Response\Response;

/**
 * Class ProductController
 * @package Shop
 */
class ProductController extends Controller
{
    /**
     * @param $id
     * @return Response
     */
    public function getOneProduct($id): Response
    {
        return $this->render(__DIR__ . '/views/oneProduct.html.php', ["id" => $id], true);
    }

    /**
     * @return Response
     */
    public function getAllProduct(): Response
    {
        return $this->render(__DIR__ . '/views/allProduct.html.php', []);
    }
}