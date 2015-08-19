<?php

use Phalcon\Mvc\Micro;

$app = new Micro();

$app->get('/', function(){
  phpinfo();
});


/*
  Creating Objects
*/
$app->post('/classes/{name}', function($name){
  echo 'Create new object "' . $name . '"<br>';

  echo "GLOBALS['HTTP_RAW_POST_DATA'] = ";
  print_r($GLOBALS['HTTP_RAW_POST_DATA']);
  echo '<br><br>post\n';

  echo '$_POST = ';
  print_r($_POST);
  echo '<br><br>';

  echo '$_GET = ';
  print_r($_GET);
  echo '<br><br>';

  echo '$_REQUEST = ';
  print_r($_REQUEST);
  echo '<br><br>';

  echo '$_SERVER = ';
  print_r($_SERVER);
  echo '<br><br>';

  echo '$_FILES = ';
  print_r($_FILES);
  echo '<br><br>';

  echo '$_ENV = ';
  print_r($_ENV);
  echo '<br><br>';

  echo '$_COOKIE = ';
  print_r($_COOKIE);
  echo '<br><br>';

  echo '$_SESSION = ';
  print_r($_SESSION);
  echo '<br><br>';
});

$app->post('/objects/{name}', function($name){
  $data = $GLOBALS['HTTP_RAW_POST_DATA'];
  $m = new MongoClient();
  $db = $m->selectDB("wer");
  $collection = $db->selectCollection($name);
  $collection->insert(array('name' => 'swordy'));
  $m->close();
  echo json_encode($obj);
});

/*$app->post('/objects/{name}', function($name){
  echo 'Create new object "' . $name . '"<br>';

  echo "GLOBALS['HTTP_RAW_POST_DATA'] = ";
  print_r($GLOBALS['HTTP_RAW_POST_DATA']);
  echo '<br><br>post\n';

  echo '$_POST = ';
  print_r($_POST);
  echo '<br><br>';

  echo '$_GET = ';
  print_r($_GET);
  echo '<br><br>';

  echo '$_REQUEST = ';
  print_r($_REQUEST);
  echo '<br><br>';

  echo '$_SERVER = ';
  print_r($_SERVER);
  echo '<br><br>';

  echo '$_FILES = ';
  print_r($_FILES);
  echo '<br><br>';

  echo '$_ENV = ';
  print_r($_ENV);
  echo '<br><br>';

  echo '$_COOKIE = ';
  print_r($_COOKIE);
  echo '<br><br>';

  echo '$_SESSION = ';
  print_r($_SESSION);
  echo '<br><br>';
});*/


/*
  Updating Objects
*/
$app->put('/objects/{name}/{id}', function($name, $id){
  $m = new MongoClient();
  $db = $m->selectDB("wer");
  $collection = $db->selectCollection($name);
  $query = array('_id' => new MongoId($id));
  $newdata = array('name' => 'MQW');
  $obj = $collection->update($query, $newdata);
  $m->close();
  echo json_encode($obj);
});


/*
  Retrieving Objects
*/
$app->get('/objects/{name}/{id}', function($name, $id){
  $m = new MongoClient();
  $db = $m->selectDB("flyway");
  $collection = $db->selectCollection($name);
  $query = array('_id' => new MongoId($id));
  $obj = $collection->findOne($query);
  $m->close();
  echo json_encode($obj);
});


/*
  Queries
*/
$app->get('/objects/{name}', function($name){
  $m = new MongoClient();
  $db = $m->selectDB("wer");
  $collection = $db->selectCollection($name);
  $query = array_slice($_GET, 1);
  $cursor = $collection->find($query);
  $m->close();

  $result = '[';
  foreach ($cursor as $doc) {
      $result .= json_encode($doc);
      if($cursor->hasNext()){
        $result .= ',';
      }
  }
  $result .= ']';
  echo $result;
});


/*
  Deleting Objects
*/
$app->delete('/objects/{name}/{id}', function($name, $id){
  $m = new MongoClient();
  $db = $m->selectDB("wer");
  $collection = $db->selectCollection($name);
  $query = array('_id' => new MongoId($id));
  $result = $collection->remove($query);
  $m->close();
  var_dump($result);
});

/*
  404, not found
*/
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo 'This is crazy, but this page was not found!';
});


$app->handle();