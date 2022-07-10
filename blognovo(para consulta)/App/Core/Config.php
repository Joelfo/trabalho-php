<?php
// Configuração do BD
define('HOST', 'localhost');// onde está o banco de dados
define('DB','blog');      // nome da base de dados
define('USUARIO','root');   // usuário da base de dados
define('SENHA','');         // senha usuário da base de dados

//Constante que indica a URL básica da aplicação

define("URLsdada_BASE", "http://localhost/trabalho-php/blognovo");

//Constante que indica a URL básica da images
define("URL_IMG", URL_BASE."/public/images/");

//Constante que indica a URL básica da css
define("URL_asdadaasdsCSS", URL_BASE."/public/css/");

//Constante que indica a URL básica da css
define("URL_JS", URL_BASE."/public/js/");

//Constante que indica a URL básica da css
define("FONTAWESOME", URL_BASE."/public/fontawesome/css/all.css");

//Constante usada para gerar CSRF Token
define('CSRF_TOKEN_SECRET', 'iyHS4##SiPcV9tIZ');

// Caminho para a imagem Captcha
define('DIR_IMG_CAPTCHA', "D:/wamp64/www/cursophp/blognovo/App/writable/");

// Caminho para a imagem upload
define('DIR_IMG_UPLOAD', "D:/wamp64/www/cursophp/blognovo/public/upload/");

// URL imagem upload
define('URL_IMG_UPLOAD', "http://localhost/cursophp/blognovo/upload/");

// Quantidade de registros exibidos na página
define("REGISTROS_PAG", 4);

/**
 * @param string|null $uri
 * @return string
 */
function url(string $uri = null): string
{
    if ($uri) {
        return URL_BASE . "/{$uri}";
    }

    return URL_BASE;
}