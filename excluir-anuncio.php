<?php
require 'config.php';

if(empty($_SESSION['cLogin'])) {
    ?>
    <script type="text/javascript">window.location.href = "login.php";</script>
    <?php
    exit;
}


require 'classes/anuncios.php';
$a= new Anuncios();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $a->excluirAnuncio($_GET['id']);
}

header("Location: meus_anuncios.php");