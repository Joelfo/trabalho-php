<?php
//Instanciação do Router
/* Quando tento usar a variável URL_Base como parâmetro do Router,
   recebo um warning */
$router = new \CoffeeCode\Router\Router('http://localhost/trabalho-php/codigo fonte');
//Namespace
$router->namespace("app\controllers");
//Rotas:

//Rotas GET:
//Página inicial(login)
$router->get("/", "AcessoRestrito:formLogin"); //http://localhost/trabalho-php/codigo_fonte/
$router->get("/Home", "AcessoRestrito:formLogin");

//Dashboard de Vendedor
$router->get("/Dashboard_Vendedor", "DashboardVendedor:index");
//Rotas POST:
$router->post("/logar", "AcessoRestrito:login");

/*if($router->error()){
    $router->redirect("/error/{router->error()}");
}

$router->get("/{errcode]", "Coffee:notFound");*/

$router->dispatch();

?>