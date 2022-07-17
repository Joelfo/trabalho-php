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

//LOGOUT
$router->get("/Logout", "AcessoRestrito:logOut");

//Dashboard de Vendedor
$router->get("/Dashboard_Vendedor", "DashboardVendedor:index");
$router->get("/Dashboard_Comprador", "DashboardComprador:index");
//Rotas POST:
$router->post("/logar", "AcessoRestrito:login");

//FORNECEDORES:
//Index do dashboard de fornecedores
$router->get("/Fornecedores", "Fornecedor:index");
//Método para listar fornecedores
$router->get("/Fornecedores/Listar", "Fornecedor:ajax_lista");
//Atualizar um fornecedor
$router->get("/Fornecedores/Atualizar/{id-fornecedor}", "Fornecedor:atualizar");
//Gravar atualizações
$router->post("/Fornecedores/Gravar/Atualização", 'Fornecedor:gravar_atualizacao');


// DashboardClientes Cliente.php
$router->get("/Clientes", "Cliente:listarCliente");

// Solicitar um token CSRF para inclusão de usuário. Legal para utilizar com AJAX
//$router->get("/Fornecedores/Atualizar/{id}", "Fornecedor:atualizar");

/*if($router->error()){
    $router->redirect("/error/{router->error()}");
}

$router->get("/{errcode]", "Coffee:notFound");*/

$router->dispatch();

?>