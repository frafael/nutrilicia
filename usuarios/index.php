<?php include '../header.php'; ?>

        <script>  
            function remover(id) {
                popup("Deseja excluir o usuário?",
                    [
                        {"name": "Sim", "action": function(){
                            $.get( "remove.php?id="+id)
                              .done(function( data ) {
                                if(data == '') {
                                    window.location.href= 'index.php?status=2&page='+page;
                                } else {
                                    console.log(data);
                                    alert('Não foi possível realizar a operação.');                    
                                }
                              });
                              $(".popup").remove();
                              $(".popup-background").remove();
                        }},
                        {"name": "Não", "action": function(){
                            $(".popup").remove();
                            $(".popup-background").remove();
                        }}
                    ]);
            }
        </script>

        <div class="content" style="padding-top: 70px;">  
            <div class="title">
                Usuários
                
                <a class="button" href="new.php">Novo usuário</a>
            </div>
            
            <?php
                if (isset($_GET['status']) && $_GET['status'] == '1' )
                    echo '<div class="msg">Usuário inserido com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';

                if (isset($_GET['status']) && $_GET['status'] == '2' )
                    echo '<div class="msg">Usuário excluído com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';

                if (isset($_GET['status']) && $_GET['status'] == '3' )
                    echo '<div class="msg">Usuário atualizado com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';
            ?>

            <?php
                $sql = "SELECT id, login FROM usuarios u ";

                if($result = mysqli_query($connect, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Usuário</th>                 
                        <th width="60px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr id="<?php echo $row['id']; ?>" class="" style="">
                        <td>
                            <div class="login"><?php echo $row['login']; ?></div>                            
                        </td>
                        <td>
                               <div class="actions">
                                     <i title="Editar" onclick="window.location.href='edit.php?id=<?php echo $row['id']; ?>';" class="fa fa-pencil" aria-hidden="true"></i>
                                     <i title="Remover" onclick="remover(<?php echo $row['id']; ?>)" class="fa fa-trash remove" aria-hidden="true"></i>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }

                        // Free result set
                        mysqli_free_result($result);  
                    ?>  
                </tbody>
            </table>
            <div id="pagination"></div>
            <?php
                    } else {
                            echo ' <div class="no-results"><i class="fa fa-search"></i> Não existem usuários a serem listados.</div>';
                    }
                }                   
            ?>

        </div>

<?php include '../footer.php'; ?>
