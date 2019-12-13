<?php include '../header.php'; ?>

        <div class="content">   
            <div class="title">
                Novo Usuário
            </div>       

  
            <form id="form" method="post" action="save.php">            
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == '4' )
                        echo '<div class="msg error">Já existe um usuário com o login informado!<i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';

                    if (isset($_GET['status']) && $_GET['status'] == '5' )
                        echo '<div class="msg error">Senhas não conferem! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';
                ?>

                <label><span>Usuário: </span><input type="text" name="login" value="<?php echo (isset($_GET['login'])?$_GET['login']:''); ?>"/></label>
                <label><span>Senha: </span><input type="password" name="senha"/></label>
                <label><span>Confirmação: </span><input type="password" name="contrasenha"/></label>
                
                <div class="actions">
                    <button type="submit">Gravar</button>
                    <button type="button" class="secondary" onclick="window.location='index.php';">Cancelar</button>
                </div>
            </form>
        </div>

<?php include '../footer.php'; ?>
