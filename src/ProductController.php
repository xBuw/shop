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
    public function getOneProduct($id, $var){
        return $this->render("path", $id." ".$var);
    }
}