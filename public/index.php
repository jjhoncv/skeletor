<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/../app/core/core.php';

$klein = new \Klein\Klein();


$klein->with('/', '../app/modules/home/controllers/indexController.php');

//$klein->with("/admin", '../app/modules/admin/public/index.php');

$klein->with('/admin', function () use ($klein) {

  $klein->respond('GET', '/?', function ($request, $response, $service, $app) {
    
    define('_MODULE_', "admin");
    define('_CONTROLLER_', "index");
    define('_VIEW_', "index");
    
    $service->render('../app/modules/admin/views/index.phtml');

  });

  /*$klein->respond('GET', '/?', function ($request, $response, $service, $app) {  
  	$klein->with("/", "../app/modules/home/controllers/indexController.php");
  });*/


});

$klein->respond(function ($request, $response, $service, $app) use ($klein) {
  $app->register('db', function() {
    return new PDO('mysql:host=localhost;dbname=prueba', 'root', 'frontend');
  });
});

$klein->with('/admin/products', function () use ($klein) {

  // controller productoController

  $klein->respond('GET', '/?', function ($request, $response, $service, $app) {
    
    $query = $app->db->prepare('SELECT * FROM products');
    $query->execute();
    $data = $query->fetchAll();

    $service->render('../app/modules/products/views/list.phtml', array("products" => $data));
  });

  $klein->respond('GET', '/new', function ($request, $response, $service, $app) {  
    $service->render('../app/modules/products/views/new.phtml');
  });

  $klein->respond('POST', '/add', function ($request, $response, $service, $app) {  
    
    $description = $request->param("description");
    $price = $request->param("price");
    $weight = $request->param("weight");

    $query = $app->db->prepare('INSERT INTO products (description, price, weight) values (:description, :price, :weight)');

    $query->execute(
      array(
        ":description"=> $description,
        ":price"      => $price,
        ":weight"     => $weight
      )
    );

    $response->redirect("/admin/products")->send();
  });



  $klein->respond('GET', '/edit/[:id]', function ($request, $response, $service, $app) {

    $id = $request->id;

    $query = $app->db->prepare('SELECT * FROM products WHERE id='.$id);
    $query->execute();
    $data = $query->fetchAll();

    $service->render('../app/modules/products/views/edit.phtml', array("products" => $data[0]));
  });


  $klein->respond('POST', '/update/[:id]', function ($request, $response, $service, $app) {  
    
    $description = $request->param("description");
    $price = $request->param("price");
    $weight = $request->param("weight");
    $id = $request->id;

    $query = $app->db->prepare('UPDATE products SET description = :description, price = :price, weight = :weight WHERE id = :id');

    $query->execute( array(
        ":description"=> $description,
        ":price"      => $price,
        ":weight"     => $weight,
        ":id"         => $id
      ));

    $response->redirect("/admin/products")->send();
  });


  /*delete*/
  $klein->respond('GET', '/delete/[:id]', function ($request, $response, $service, $app) {  
    
    $id = $request->id;

    $query = $app->db->prepare('DELETE FROM products WHERE id = :id');

    $query->execute(
      array(":id"     => $id)
    );

    $response->redirect("/admin/products")->send();
  });

});


/* home 
$klein->with("/", "../app/modules/home/controllers/indexController.php");

 search 
$klein->with("/search", "../app/modules/search/controllers/indexController.php");

login
$klein->with("/login", "../app/modules/login/controllers/indexController.php");*/

$klein->dispatch();
?>