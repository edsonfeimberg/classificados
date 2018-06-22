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
    if(isset($_FILES['fotos'])) {
        $fotos = $_FILES['fotos'];
    }else {
        $fotos=array();
    }

    $a->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $_GET['id']);
}

if(isset($_GET['id'])&& !empty($_GET['id'])) {

    $info= $a->getAnuncio($_GET['id']);

} else {
    ?>
    <script type="text/javascript">window.location.href = "meus_anuncios";</script>
    <?php
    exit;

}


?>

    <div class="alert alert-success">Produto Adicionado Com Sucesso</div>

    <div class="container">
        <h1>Meus Anúncios - Editar Anuncio</h1>

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

                        <option value="<?php echo $cat['id'] ?>" <?php echo ($info['id_categoria']==$cat['id'])?"selected='selected'":'' ?>>
                            <?php echo utf8_encode($cat['nome']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label for="tiutlo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']; ?>">
            </div>

            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="text" name="valor" id="valor" class="form-control" value="<?php echo $info['valor']; ?>">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" class="form-control"><?php echo $info['descricao']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="conservacao">Conservação:</label>
                <select name="conservacao" id="conservacao" class="form-control">
                    <option value="0" <?php echo ($info['estado']==0)?"selected='selected'":'' ?>>Ruim</option>
                    <option value="1" <?php echo ($info['estado']==1)?"selected='selected'":'' ?>>Bom</option>
                    <option value="2" <?php echo ($info['estado']==2)?"selected='selected'":'' ?>>Ótimo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fotos">Conservação:</label>
                <input type="file" name="fotos[]" multiple>

                <div class="panel panel-default"></div>
                <div class="page-header">Fotos do Anuncio</div>
                <div class="panel-body"></div>

            </div>

            <input type="submit" value="Salvar" class="btn btn-default">
        </form>
    </div>

<?php

require 'pages/footer.php';
