<?php include '../header.php'; ?>

        <div class="content">   
            <div class="title">
                Editar Aluno
            </div>         
            <form id="form" method="post" action="save.php">
                <?php 
                    if(isset($_GET['responsavel_id']) and $_GET['responsavel_id'] != '')
                        $sql = "SELECT * FROM responsaveis_contratos where responsavel_id = ".$_GET['responsavel_id']." and contrato_id =".$_GET['contrato_id'];
                    else
                        echo "<script>window.location.href='../responsaveis/index.php';</script>";
                        
                    if($result = mysqli_query($connect, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                ?>         
                    <input type="hidden" name="responsavel_id" value="<?php echo $row['responsavel_id']; ?>"/>

                    <label><span>Pacote: </span><textarea name="pacote"/><?php echo $row['pacote']; ?></textarea></label>
                    <label><span>Valor Total: </span><input type="text" class="money2" name="valor" value="<?php echo $row['valor']; ?>"/></label>
                    <label><span>Parcelamento: </span><input type="text" name="parcelamento" value="<?php echo $row['parcelamento']; ?>"/></label>
                    <label>
                        <span>Forma de Pagamento: </span>
                        <select name="pagamento">
                            <option value=''>Selecione...</option>
                            <option value="VISTA" <?php echo $row['pagamento']=='VISTA'?'selected="selected"':'' ?> >A vista</option>
                            <option value="BOLETO" <?php echo $row['pagamento']=='BOLETO'?'selected="selected"':'' ?> >Boleto</option>
                            <option value="CHEQUE" <?php echo $row['pagamento']=='CHEQUE'?'selected="selected"':'' ?> >Cheque</option>
                        </select>
                    </label>
                    <label><span>Observações: </span><textarea name="observacoes"/><?php echo $row['observacoes']; ?></textarea></label>
                    
                    <div class="session">CONTRATO</div>
                    <label>
                        <span>Modelo: </span>
                        <select name="contrato_id">
                            <option value='null'>Selecione...</option>
                            <!-- <option>2020</option>
                            <option>2020 (2 ALUNOS)</option>
                            <option>2020 (3 ALUNOS)</option> -->
                            <?php
                                $sql = "SELECT * FROM contratos";
                                if($result = mysqli_query($connect, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<option value='".$row['id']."' ".$_GET['contrato_id']==$row['id']?"selected='selected'":"".">";
                                                echo $row['descricao'];
                                            echo "</option>";
                                        }

                                        // Free result set
                                        mysqli_free_result($result);
                                    } else{
                                        echo "";
                                    }
                                }
                            ?>
                        </select>
                    </label>

                    <div class="actions">
                        <button type="button" onclick="submitForm('index.php?status=3');">Gravar</button>
                        <button type="button" class="secondary" onclick="window.location='index.php?responsavel_id=<?php echo $row['responsavel_id']; ?>';">Cancelar</button>
                    </div>
                    
                 <?php 
                            }
                        } else {
                            echo "<script>window.location.href='index.php';</script>";
                        }
                    } else {
                        echo "<script>window.location.href='index.php';</script>";                 
                    }
                ?>  
            </form>
        </div>

<?php include '../footer.php'; ?>
