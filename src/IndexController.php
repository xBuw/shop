<?php
/**
 * Created by PhpStorm.
 * User: Стас
 * Date: 17.03.2017
 * Time: 11:42
 */

namespace Shop;


use xbuw\framework\Controller\Controller;

class IndexController extends Controller
{
    public function index():Response
    {
        return $this->render(__DIR__ . '/views/index.html.php', []);
    }
}