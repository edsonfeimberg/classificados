<?php
require "pages/header.php";
require "classes/usuarios.php"
?>

<div class="container">

    <?php
    $u= new usuarios();

    if(isset($_POST['nome'])&& !empty($_POST['nome'])) {
        $nome= addslashes($_POST['nome']);
        $email= addslashes($_POST['email']);
        $senha= addslashes($_POST['senha']);
        $telefone=addslashes($_POST['telefone']);

        if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['telefone'])){
            if ($u->cadastrar($nome, $email, $senha, $telefone)){ ?>

                <div class="alert alert-success">
                    <strong>Parabéns!</strong>Cadastrado com Sucesso!
                    <a href="login.php" class="alert-link">Faça o Login Agora</a>
                </div>

                <?php
            }else{ ?>

                <div class="alert alert-warning">
                    Este usuário já existe
                    <a href="login.php" class="alert-link">Faça o Login Agora</a>
                </div>

                <?php

            }


        }else{
            ?>
            <div class=" alert alert-warning">
                Preencha todos os campos
            </div>
            <?php
        }
    }
    ?>
    <h1>Cadastre-se</h1>

    <form method="POST">

        <div class="form-group">
             <label for="nome">Nome:</label>
             <input type="text" name="nome" id="nome" class="form-control">
        </div>

        <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" class="form-control" >
        </div>

         <div class="form-group">
             <label for="senha">Senha:</label>
             <input type="password" name="senha" id="senha" class="form-control">
         </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="tel" name="telefone" id="telefone" class="form-control">
        </div>

        <input type="submit" value="Cadastrar" class="btn btn-default">
    </form>
</div>

<?php
require "pages/footer.php";