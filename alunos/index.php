<?php include '../header.php'; ?>

        <script>  
            function remover(id) {
                popup("Deseja excluir o aluno?",
                    [
                        {"name": "Sim", "action": function(){
                            $.get( "remove.php?id="+id)
                              .done(function( data ) {
                                if(data == '') {
                                    console.log(data);
                                    window.location.href= 'index.php?status=2&page='+page+'&responsavel_id=<?php echo $_GET['responsavel_id']; ?>';
                                } else {
                                    
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
            
            function contratos(id) {
                window.location.href = 'contratos.php?responsavel_id='+id;
            }
        </script>

        <div class="content" style="padding-top: 70px;">  
            <div class="title">
                Alunos
                
                <a class="button" href="new.php?responsavel_id=<?php echo $_GET['responsavel_id'];?>">Novo Aluno</a>
            </div>
            
            <?php
                if (isset($_GET['status']) && $_GET['status'] == '1' )
                    echo '<div class="msg">Aluno inserido com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';

                if (isset($_GET['status']) && $_GET['status'] == '2' )
                    echo '<div class="msg">Aluno excluído com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';

                if (isset($_GET['status']) && $_GET['status'] == '3' )
                    echo '<div class="msg">Aluno atualizado com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';
            ?>

            <?php
                if(isset($_GET['responsavel_id']) and $_GET['responsavel_id'] != '')
                    $sql = "SELECT * FROM alunos where responsavel_id = ".$_GET['responsavel_id'];
                else
                    echo "<script>window.location.href='../responsaveis/index.php';</script>";

                if($result = mysqli_query($connect, $sql)){
                    
                    if(mysqli_num_rows($result) > 0){
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Aluno</th>              
                        <th width="60px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr id="<?php echo $row['id']; ?>" class="" style="">
                        <td>
                            <div class="nome"><?php echo $row['nome']; ?></div>                            
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
                            echo ' <div class="no-results"><i class="fa fa-search"></i> Não existem alunos para esse responsável listados.</div>';
                    }
                }                   
            ?>
            <div class="actions list">
                <button type="button" class="secondary" onclick="window.location='../responsaveis/index.php';">Voltar</button>
            </div>

        </div>
<?php include '../footer.php'; ?>
