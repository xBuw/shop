<?php
return [
    'Shop\ProductController@getOneProduct' => ['correctIndexMW'],
    'Shop\ProductController@setOneProduct' => ['checkProductYear']
];
