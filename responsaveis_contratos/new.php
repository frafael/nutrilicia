<?php include '../header.php'; ?>

        <div class="content">   
            <div class="title">
                Novo Aluno
            </div>         
            <form id="form" method="post" action="save.php">            
                <?php
                    if(isset($_GET['responsavel_id']) and $_GET['responsavel_id'] != '') {
                ?>                
                    <input type="hidden" name="responsavel_id" value="<?php echo $_GET['responsavel_id']; ?>" />
                <?php
                        $sql = "SELECT * FROM alunos where responsavel_id = ".$_GET['responsavel_id'];
                    } else
                        echo "<script>window.location.href='../responsaveis/index.php';</script>";
                ?>                
 
                <label><span>Pacote: </span><textarea name="pacote"/></textarea></label>
                <label><span>Valor Total: </span><input type="text" class="money2" name="valor"/></label>
                <label><span>Parcelamento: </span><input type="text" name="parcelamento"/></label>
                <label>
                    <span>Forma de Pagamento: </span>
                    <select name="pagamento">
                        <option value=''>Selecione...</option>
                        <option value="VISTA">A vista</option>
                        <option value="BOLETO">Boleto</option>
                        <option value="CHEQUE">Cheque</option>
                    </select>
                </label>
                <label><span>Observações: </span><textarea name="observacoes"/></textarea></label>
                
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
                                        echo "<option value='".$row['id']."'>";
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
                    <button type="button" onclick="submitForm('index.php?status=1&responsavel_id=<?php echo $_GET['responsavel_id']; ?>');">Gravar</button>
                    <button type="button" class="secondary" onclick="window.location='index.php?responsavel_id=<?php echo $_GET['responsavel_id']; ?>';">Cancelar</button>
                </div>
            </form>
        </div>

<?php include '../footer.php'; ?>
