<?php
require "pages/header.php";
?>

<?php
if(empty($_SESSION['cLogin'])) {
    ?>

    <script type="text/javascript">window.location.href = "login.php";</script>

    <?php
    exit;
}

require 'classes/anuncios.php';
$a= new anuncios();

if(isset($_POST['titulo'])&& !empty($_POST['titulo'])){

    $titulo=addslashes($_POST['titulo']);
    $categoria=addslashes($_POST['categoria']);
    $valor=addslashes($_POST['valor']);
    $descricao=addslashes(($_POST['descricao']));
    $estado=addslashes($_POST['conservacao']);

    $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
}

?>

    <div class="alert alert-success">Produto Adicionado Com Sucesso</div>

    <div class="container">
        <h1>Meus Anúncios - Adicionar Anúncio</h1>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="cateogia">Categoria:</label>
                <select name="categoria" id="categoria" class="form-control">

                    <?php
                    require "classes/categorias.php";
                    $c= new categorias();
                    $cats=$c->getLista();
                    foreach ($cats as $cat):
                        ?>

                        <option value="<?php echo $cat['id'] ?>">
                            <?php echo utf8_encode($cat['nome']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label for="tiutlo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
            </div>

            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="text" name="valor" id="valor" class="form-control">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="conservacao">Conservação:</label>
                <select name="conservacao" id="conservacao" class="form-control">
                    <option value="0">Ruim</option>
                    <option value="1">Bom</option>
                    <option value="2">Ótimo</option>
                </select>
            </div>

            <input type="submit" value="Adicionar" class="btn btn-default">
        </form>
    </div>

<?php

require 'pages/footer.php';
