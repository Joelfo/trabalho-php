<?php
//Arquivo para definição de configurações para o programa

//Configuração do Banco de Dados
define('HOST', 'localhost');
define('DB', 'estoque');
define('USER', 'root');
define('PASSWORD', '');

define('URL_BASE', 'http://localhost/trabalho-php/codigo_fonte');

define("URL_CSS", URL_BASE."/Public/css/");
define("URL_JS", URL_BASE . "/Public/js/");

//Diretório do background para a imagem CAPTCHA
define('DIR_IMG_CAPTCHA', 'C:/wamp64/www/trabalho-php/codigo_fonte/App/writable/');
define('FILTROS_ENTRADA_FUNCIONARIO', ['cpf' => 'trim|sanitize_string', 'senha' => 'trim|sanitize_string', 'captcha' => 'trim|sanitize_string']);
define('REGRAS_ENTRADA_FUNCIONARIO', ['cpf' => 'required|exact_len,14|cpf_valido', 'senha' => 'required|max_len,10', 'captcha' => 'required|captcha_valido']);

?>