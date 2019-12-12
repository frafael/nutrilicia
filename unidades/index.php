<?php include '../header.php'; ?>

        <script>  
            function editar(id) {
                window.location.href = 'edit-responsavel.php?id='+id;
            }

            function remover(id) {
                popup("Deseja excluir o reponsável financeiro?",
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
            
            function contratos(id) {
                window.location.href = 'contratos.php?responsavel_id='+id;
            }
        </script>

        <div class="content" style="padding-top: 70px;">  
            <div class="title">
                Responsáveis
                
                <a class="button" href="new.php">Novo Responsável</a>
            </div>
            
            <?php
                if (isset($_GET['status']) && $_GET['status'] == '1' )
                    echo '<div class="msg">Responsável financeiro inserido com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';

                if (isset($_GET['status']) && $_GET['status'] == '2' )
                    echo '<div class="msg">Responsável financeiro excluído com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';

                if (isset($_GET['status']) && $_GET['status'] == '3' )
                    echo '<div class="msg">Responsável financeiro atualizado com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';
            ?>

            <?php
                $sql = "SELECT r.nome as nome, r.id as id, u.descricao as unidade FROM responsaveis r left join unidade u on u.id = r.unidade_id";
                
                $sql = $sql.' WHERE 1=1';
                if(isset($_GET['search']))
                    $sql = $sql." and r.nome like '%".$_GET['search']."%'";

                if(isset($_GET['unidade']) and $_GET['unidade'] != '')
                    $sql = $sql." and u.id = ".$_GET['unidade'];

                if($result = mysqli_query($connect, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Responsável</th>
                        <th width="150px">Unidade</th>                 
                        <th width="85px">Ações</th>
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
                            <?php echo $row['unidade']; ?>
                        </td>
                        <td>
                            <div class="actions">
                                     <i title="Editar" onclick="window.location.href='edit.php?id=<?php echo $row['id']; ?>';" class="fa fa-pencil" aria-hidden="true"></i>
                                     <i title="Contratos" class="fa fa-files-o" aria-hidden="true"></i>
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
                            echo ' <div class="no-results"><i class="fa fa-search"></i> Não existem responsáveis a serem listados.</div>';
                    }
                }                   
            ?>

        </div>

<?php include '../footer.php'; ?>
