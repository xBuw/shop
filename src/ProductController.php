<?php

namespace Shop;

use xbuw\framework\Controller\Controller;
use xbuw\framework\Response\Response;

/**
 * Class ProductController
 * @package Shop
 */
class ProductController extends Controller
{

    private $connection;

    /**
     * ProductController constructor.
     */
    function __construct()
    {
        $this->connection = pg_connect("host=localhost dbname=test_db user=postgres password=ilikevolley")
        or die('Could not connect:' . pg_last_error());
    }

    /**
     * @param $id
     * @return Response
     */
    public function getOneProduct($id): Response
    {
        $query = "select * from books where id=" . $id;
        $result = pg_query($this->connection, $query) or die('Error query');

        $line = pg_fetch_array($result, null, PGSQL_ASSOC);

        pg_free_result($result);
        pg_close($this->connection);

        return $this->render(__DIR__ . '/views/oneProduct.html.php', ["array" => $line]);
    }

    /**
     * @return Response
     */
    public function getAllProduct(): Response
    {
        $query = "select * from books";
        $result = pg_query($this->connection, $query) or die('Error query');

        $resultArr[] = null;
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $resultArr[] = $line;
        }

        pg_free_result($result);
        pg_close($this->connection);

        return $this->render(__DIR__ . '/views/allProduct.html.php', ["array" => $resultArr]);
    }

    /**
     * @param $name
     * @param $author
     * @param $year
     * @return Response
     */
    public function setOneProduct($name, $author, $year): Response
    {
        $array = [
            'name' => $name,
            'author' => $author,
            'year' => $year
        ];
        pg_insert($this->connection, "books", $array);
        pg_close($this->connection);

        return $this->render(__DIR__ . '/views/setOneProduct.html.php', ["array" => $array]);
    }
}