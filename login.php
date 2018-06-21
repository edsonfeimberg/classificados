<?php

require "pages/header.php";
require "classes/usuarios.php"
?>

    <div class="container">

        <?php
        $u= new usuarios();

        if(isset($_POST['email'])&& !empty($_POST['email'])) { ?>

            <script type="text/javascript">window.location.href="./";</script>

            <?php

            $email= addslashes($_POST['email']);
            $senha= addslashes($_POST['senha']);

            if($u->login($email, $senha)){

            }else{ ?>
                <div class="alert alert-danger">

                <?php
            }


            }
            ?>


        <h1>Login</h1>

        <form method="POST">

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" >
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control">
            </div>

            <input type="submit" value="Fazer Login" class="btn btn-default">
        </form>
    </div>

<?php
require "pages/footer.php";