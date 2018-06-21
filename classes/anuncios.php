<?php

class anuncios {

    public function getMeusAnuncios(){

        $array=array();

        global $pdo;
        $sql=$pdo->prepare("SELECT *,
       (select anuncios_imagem.url from  anuncios_imagem where anuncios_imagem.id_anuncio=anuncios.id limit 1) as url
        FROM anuncios
        WHERE id_usuario=:id_usuario");

        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){

            $array= $sql->fetchAll();

        }

        return $array;


    }

    public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado){

        global $pdo;
        $sql=$pdo->prepare("INSERT INTO anuncios SET titulo=:titulo, id_categoria=:id_categoria, id_usuario=:id_usuario, valor=:valor, descricao=:descricao, estado=:estado");
        $sql->bindValue(':titulo', $titulo);
        $sql->bindValue(':id_categoria', $categoria);
        $sql->bindValue(':id_usuario', $_SESSION['cLogin']);
        $sql->bindValue(':valor', $valor);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(':estado', $estado);
        $sql->execute();

    }


    public function excluirAnuncio($id){

        global $pdo;

        $sql= $pdo->prepare('DELETE FROM anuncios_imagens WHERE id_anuncio=:id_anuncio');
        $sql->bindValue(':id_anuncio', $id);
        $sql->execute();

        $sql= $pdo->prepare('DELETE FROM anuncios WHERE id=:id');
        $sql->bindValue(':id', $id);
        $sql->execute();
    }



}

