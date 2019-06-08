<?php

//use Psr\Http\Message\ServerRequestInterface as Request;
//use Psr\Http\Message\ResponseInterface as Response;

require_once(__ROOT__."/src/models/product.php");


function workingPage () {

    $product = new Product();
    $product->set('name', 'new name');

    return json_encode( $product->getData() );

}




?>
