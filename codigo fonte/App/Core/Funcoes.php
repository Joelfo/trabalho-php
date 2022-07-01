<?php
function gerarTokenCSRF(){
    //Gera uma string aleatória contendo valores hexadecimais
    /* hexa_aleatorio armazena o resultado da função openssl_random_pseudo_bytes que 
    é uma sequência aleatória de 16 bytes, convertido para representação hexadecimal, através da função bin2hex.
    Após isso a funlão hash_hmac() gera um valor de hash para o resultado armazenado em hexa_aleatório. Essa
    camada de hash sobre o valor aleatório é para que impedir que alguém externo consiga compreender a lógica 
    de geração dos valores.
    */ 
    $hexa_aleatorio = bin2hex(openssl_random_pseudo_bytes(16));
    return hash_hmac('sha256', $hexa_aleatorio, CSRF_TOKEN_SECRET);
}

function gerarCaptcha(){
    $nomeImagem = random_int(10000, 9999999);
    $imagemCaptcha = imagecreatefromjpeg(DIR_IMG_CAPTCHA . 'template_cap.jpg');
    $corTexto = imagecolorallocate($imagemCaptcha, 0, 98, 255);
    $fonte = DIR_IMG_CAPTCHA . 'arial.ttf' ;
    

}
?>