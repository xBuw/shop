<?php

namespace Shop;

use xbuw\framework\Controller\Controller;
use xbuw\framework\Injector\Injector;
use xbuw\framework\Request\Request;
use xbuw\framework\Response\Response;

/**
 * Class ProductController
 * @package Shop
 */
class ProductController extends Controller
{

    private $connection;
    private $request;

    /**
     * ProductController constructor.
     * Start Injector, Database connecting and call request.
     */
    public function __construct()
    {
        Injector::setConfig(require dirname(__FILE__) . "/../config/injector.php");
        $this->connection = Injector::make('xbuw\framework\Database\DatabaseContract',
            require dirname(__FILE__) . "/../config/database.php");
        $this->request = Request::getRequest();
    }

    /**
     * Get one product
     * @return Response
     */
    public function getOneProduct(): Response
    {
        $query = "select * from books where books_id=" . $this->request->id;
        $result = $this->connection->query($query);
        $line = pg_fetch_array($result, null, PGSQL_ASSOC);
        return $this->render(__DIR__ . '/views/oneProduct.html.php', ["array" => $line]);
    }

    /**
     * Get all product
     * @return Response
     */
    public function getAllProduct(): Response
    {
        $query = "select * from books";
        $result = $this->connection->query($query);
        $resultArr = [];
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $resultArr[] = $line;
        }
        return $this->render(__DIR__ . '/views/allProduct.html.php', ["array" => $resultArr]);
    }

    /**
     * Set one product
     * @return Response
     */
    public function setOneProduct(): Response
    {

        $array = [
            'name' => $this->request->name,
            'author' => $this->request->author,
            'year' => $this->request->year
        ];
        $this->connection->insert("books", $array);

        return $this->render(__DIR__ . '/views/setOneProduct.html.php', ["array" => $array]);

    }
}