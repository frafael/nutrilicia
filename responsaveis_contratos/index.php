<?php include '../header.php'; ?>

        <script>  
           function generate(responsavel_id, contrato_id) {
                $.get( "generate.php?responsavel_id="+responsavel_id+"&contrato_id="+contrato_id)
                  .done(function( data ) {
                    console.log("|"+data+"|");
                    if(data == '') {
                        alert('Contrato gerado com sucesso.');
                    } else {
                        alert('Não foi possível realizar a operação.');                    
                    }
                  });
            }
            
            
            function remover(responsavel_id, contrato_id) {
                popup("Deseja excluir o contrato para o responsável?",
                    [
                        {"name": "Sim", "action": function(){
                            $.get( "remove.php?responsavel_id="+responsavel_id+"&contrato_id="+contrato_id)
                              .done(function( data ) {
                                console.log(data)
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
                Contratos do Responsável
                
                <a class="button" href="new.php?responsavel_id=<?php echo $_GET['responsavel_id'];?>">Novo Contrato</a>
            </div>
            
            <?php
                if (isset($_GET['status']) && $_GET['status'] == '1' )
                    echo '<div class="msg">Contrato inserido com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';

                if (isset($_GET['status']) && $_GET['status'] == '2' )
                    echo '<div class="msg">Contrato excluído com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';

                if (isset($_GET['status']) && $_GET['status'] == '3' )
                    echo '<div class="msg">Contrato atualizado com sucesso! <i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';
            ?>

            <?php
                if(isset($_GET['responsavel_id']) and $_GET['responsavel_id'] != '')
                    $sql = "SELECT c.id as contrato_id, c.descricao as contrato_descricao, r.id as responsavel_id, r.nome as responsavel_nome FROM responsaveis_contratos rc left join responsaveis r on r.id = rc.responsavel_id left join contratos c on c.id = rc.contrato_id where responsavel_id = ".$_GET['responsavel_id'];
                else
                    echo "<script>window.location.href='../responsaveis/index.php';</script>";

                if($result = mysqli_query($connect, $sql)){

                    if(mysqli_num_rows($result) > 0){
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Responsável</th>              
                        <th>Contrato</th>              
                        <th width="115px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr id="<?php echo $row['contrato_id']; ?>" class="" style="">
                        <td>
                            <div class="responsavel"><?php echo $row['responsavel_nome']; ?></div>                            
                        </td>
                        <td>
                            <div class="contrato"><?php echo $row['contrato_descricao']; ?></div>                            
                        </td>
                        <td>
                            <div class="actions">
                                <i title="Editar" onclick="window.location.href='edit.php?responsavel_id=<?php echo $row['responsavel_id']; ?>&contrato_id=<?php echo $row['contrato_id']; ?>';" class="fa fa-pencil" aria-hidden="true"></i>
                                <i title="Gerar arquivo" onclick="generate(<?php echo $row['responsavel_id']; ?>, <?php echo $row['contrato_id']; ?>)" class="fa fa-file-word-o" aria-hidden="true"></i>
                                <i title="Baixar contrato" onclick="window.location.href='download.php?responsavel_id=<?php echo $row['responsavel_id']; ?>&contrato_id=<?php echo $row['contrato_id']; ?>';" class="fa fa-download" aria-hidden="true"></i>
                                <i title="Remover" onclick="remover(<?php echo $row['responsavel_id']; ?>, <?php echo $row['contrato_id']; ?>)" class="fa fa-trash remove" aria-hidden="true"></i>
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
                            echo ' <div class="no-results"><i class="fa fa-search"></i> Não existem contratos para esse responsável listados.</div>';
                    }
                }                   
            ?>

            <div class="actions list">
                <button type="button" class="secondary" onclick="window.location='../responsaveis/index.php';">Voltar</button>
            </div>

        </div>
<?php include '../footer.php'; ?>
