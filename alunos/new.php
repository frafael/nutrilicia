<?php include '../header.php'; ?>

        <div class="content">   
            <div class="title">
                Novo Responsável Financeiro
            </div>         
            <form id="form" method="post" action="save.php">            
                <label><span>Nome: </span><input type="text" name="nome"/></label>
                <label><span>Nacionalidade: </span><input type="text" name="nacionalidade"/></label>
                <label><span>Data de Nascimento: </span><input class="date" type="text" name="nascimento"/></label>
                <label><span>RG: </span><input type="text" name="rg"/></label>
                <label><span>CPF: </span><input type="text" class="cpf" name="cpf"/></label>
                <label><span>Grau de Relacionamento: </span><input type="text" name="relacionamento"/></label>
                <label><span>E-mail: </span><input type="text" class="email" name="email"/></label>
                <label><span>Endereço: </span><input type="text" name="endereco"/></label>
                <label><span>CEP: </span><input type="text" class="cep" name="cep"/></label>
                <label><span>Telefone: </span><input type="text" name="telefone"/></label>
                <label>
                    <span>Unidade: </span>
                    <select name="unidade">
                        <option value='null'>Selecione...</option>
                        <!-- <option>FB Júnior Sul</option>
                        <option>FB Júnior Eusébio</option> -->
                        <?php
                            $sql = "SELECT * FROM unidade";
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
                
                <div class="alunos">
                    <div class="session">ALUNOS (AS)</div>

                    <div class="aluno">
                        <label><span>Nome: </span><input type="text" name="nome_aluno[]"/></label>
                        <label><span>Série/FB2 ou Regular: </span><input type="text" name="serie_aluno[]"/></label>
                        <label><span>Data de Nascimento: </span><input type="text" name="nascimento_aluno[]"/></label>
                        <label><span>Restrição Alimentar: </span><input type="text" name="restricao_aluno[]"/></label>
                    </div>
                </div>                
                <button type="button" class="more aluno">Adicionar</button>

                <div class="session">PLANO CONTRATADO</div>
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
                    <select name="contrato">
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
                    <button type="button" onclick="submitForm(index.php?status=1);">Gravar</button>
                    <button type="button" class="secondary" onclick="window.location='list.php';">Cancelar</button>
                </div>
            </form>
        </div>

<?php include '../footer.php'; ?>
