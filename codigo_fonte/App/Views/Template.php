<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Login</title>
    <!--bootstrap CSS-->
    <!--USANDO URL_BASE não está funcionando-->
    <link href="<?= URL_CSS?>bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">estoque</a>
            <ul class="navbar-nav ur-auto">
            <li class="nav-item active">
                <a class="nav-link href="http://localhost/trabalho-php/codigo fonte/">Login</a>
            </li>
            </ul>
        </nav>
    </header>
    <main>
        <?php require_once $view . ".php" ?>
    </main>
    <footer>

    </footer>
    <script src="<?= URL_JS ?>jquery-3.6.0.min.js"></script>
    <script src="<?= URL_JS ?>popper.min.js"></script>
    <script src="<?= URL_JS ?>bootstrap.min.js"></script>
    
    

    <?php 
    if($js != null):
        require_once 'App/Views/' . $js . ".php";
    endif;
    ?>
</div>
</body>
</html>