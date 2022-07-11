<?php
//A principio apenas para teste, ideia de fazer métodos de validação aqui que possam ser chamados de qualquer ponto do código
class Validator extends GUMP {
    protected function validate_myValidation($field, array $input, array $params = [], $value){
        return $input[$field] > 1;
    }
}

?>