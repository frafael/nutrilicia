<?php include '../header.php'; ?>

        <div class="content">   
            <div class="title">
                Editar Usuário
            </div>         


            <form id="form" method="post" action="save.php">
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == '4' )
                        echo '<div class="msg error">Já existe um usuário com o login informado!<i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';

                    if (isset($_GET['status']) && $_GET['status'] == '5' )
                        echo '<div class="msg error">Senhas não conferem! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';
                ?>

                <?php 
                    if(isset($_GET['id']) and $_GET['id'] != '')
                        $sql = "SELECT id, login, senha, tipo FROM usuarios where id = ".$_GET['id'];
                    else
                        echo "<script>window.location.href='index.php';</script>";
                        

                    if($result = mysqli_query($connect, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                ?>         

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                    <label><span>Usuário: </span><input type="text" name="login" value="<?php echo $row['login']; ?>" /></label>

                    <div style="margin-bottom: 5px; margin-left: -5px; font-weight: bold; font-size: 13px; color: #9a9a9a; padding: 2px 6px; display: inline-block;">
                       <i style="color: #4caf50;" class="fa fa-info"></i> Para manter senha anterior, não preencher campos abaixo
                    </div>
                    <label><span>Senha: </span><input type="password" name="senha"  /></label>
                    <label><span>Confirmação: </span><input type="password" name="contrasenha"  /></label>
                
                <?php 
                            }
                        } else {
                            echo "<script>window.location.href='index.php';</script>";
                        }
                    } else {
                        echo "<script>window.location.href='index.php';</script>";                 
                    }
                ?>   
                
                <div class="actions">
                    <button type="submit">Gravar</button>
                    <button type="button" class="secondary" onclick="window.location='index.php';">Cancelar</button>
                </div>
            </form>
        </div>

<?php include '../footer.php'; ?>
