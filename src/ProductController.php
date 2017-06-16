<?php

namespace Shop;

use xbuw\framework\Controller\Controller;
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
     */
    function __construct()
    {
        $this->request = Request::getRequest();
        $this->connection = pg_connect("host=localhost " .
            "dbname=test_db user=postgres password=none")
        or die('Could not connect:' . pg_last_error());
    }

    /**
     * Get one product
     * @return Response
     */
    public function getOneProduct(): Response
    {
        $query = "select * from books where id=" . $this->request->id;
        $result = pg_query($this->connection, $query) or die('Error query');

        $line = pg_fetch_array($result, null, PGSQL_ASSOC);

        pg_free_result($result);
        pg_close($this->connection);

        return $this->render(__DIR__ . '/views/oneProduct.html.php', ["array" => $line]);
    }

    /**
     * Get all product
     * @return Response
     */
    public function getAllProduct(): Response
    {
        $query = "select * from books";
        $result = pg_query($this->connection, $query) or die('Error query');

        $resultArr = [];
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $resultArr[] = $line;
        }

        pg_free_result($result);
        pg_close($this->connection);

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

        pg_insert($this->connection, "books", $array);
        pg_close($this->connection);
        return $this->render(__DIR__ . '/views/setOneProduct.html.php', ["array" => $array]);

    }
}