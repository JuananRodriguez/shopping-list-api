<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});


/*
$app->get('/books', function() {

 require_once('db.php');
 $query = "select * from library order by book_id";
 $result = $connection->query($query);
 // var_dump($result);
 while ($row = $result->fetch_assoc()){
$data[] = $row;
 }
 echo json_encode($data);

	echo 'holis';
});


$app->get('/', function() { echo 'index'});
*/


$app->get('/', function (Request $request, Response $response, array $args) {

echo 'nothing';

});







$app->run();

?>
