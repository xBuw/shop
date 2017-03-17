<?php
/**
 * Created by PhpStorm.
 * User: Стас
 * Date: 17.03.2017
 * Time: 11:42
 */

namespace Shop;


use xbuw\framework\Controller\Controller;
use xbuw\framework\Response\Response;

/**
 * Class IndexController
 * @package Shop
 */
class IndexController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return $this->render(__DIR__ . '/views/index.html.php', []);
    }
}