<?php 
namespace app\controllers;

use App\Core\BaseController;

class Index extends BaseController{
    function getIndex(){
        $this->chamarView('login');
    }
}

?>