<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

//$corsOptions = array(
//    "origin" => "*",
//    "exposeHeaders" => array("Content-Type", "X-Requested-With", "X-authentication", "X-client"),
//    "allowMethods" => array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS')
//);
//$cors = new \CorsSlim\CorsSlim($corsOptions);


/* Function to connect with DB */
function getConnection() {
    $dbhost="database";
    $dbuser="root";
    $dbpass="1234";
    $dbname="Example";
    $port = "3306";
    $dbh = new PDO("mysql:host=$dbhost;port={$port};dbname=$dbname;charset=utf8", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //var_dump( $dbh );
    //print_r( $dbh );
    return $dbh;
};

require_once '../src/controller.php';

$app = new \Slim\App;

require_once '../src/routes.php';




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

*/
$app->get('/', function(){echo 'index';});

/*
$app->get('/', function (Request $request, Response $response, array $args) {
  echo 'nothing';
});
*/


$app->run();

?>
