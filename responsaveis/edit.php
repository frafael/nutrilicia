<?php include '../header.php'; ?>

        <div class="content">   
            <div class="title">
                Editar Responsável Financeiro
            </div>         
            <form id="form" method="post" action="save.php">
                <?php 
                    $unidade='';
                    if(isset($_GET['id']) and $_GET['id'] != '')
                        $sql = "SELECT * FROM responsaveis where id = ".$_GET['id'];
                    else
                        echo "<script>window.location.href='index.php';</script>";
                        

                    if($result = mysqli_query($connect, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                $unidade=$row['unidade_id'];
                ?>         
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                <label><span>Nome: </span><input type="text" name="nome" value="<?php echo $row['nome']; ?>" /></label>
                <label><span>Nacionalidade: </span><input type="text" name="nacionalidade" value="<?php echo $row['nacionalidade']; ?>" /></label>
                <label><span>Data de Nascimento: </span><input class="date" type="text" name="nascimento" value="<?php echo $row['nascimento']; ?>" /></label>
                <label><span>RG: </span><input type="text" name="rg" value="<?php echo $row['rg']; ?>"/></label>
                <label><span>CPF: </span><input type="text" class="cpf" name="cpf" value="<?php echo $row['cpf']; ?>"/></label>
                <label><span>Grau de Relacionamento: </span><input type="text" name="relacionamento" value="<?php echo $row['relacionamento']; ?>"/></label>
                <label><span>E-mail: </span><input type="text" class="email" name="email" value="<?php echo $row['email']; ?>"/></label>
                <label><span>Endereço: </span><input type="text" name="endereco" value="<?php echo $row['endereco']; ?>"/></label>
                <label><span>CEP: </span><input type="text" class="cep" name="cep" value="<?php echo $row['cep']; ?>"/></label>
                <label><span>Telefone: </span><input type="text" name="telefone" value="<?php echo $row['telefone']; ?>"/></label>
                
                
                <?php 
                            }
                        } else {
                            echo "<script>window.location.href='index.php';</script>";
                        }
                    } else {
                        echo "<script>window.location.href='index.php';</script>";                 
                    }
                ?>   

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
                                        echo "<option value='".$row['id']."' ".(($unidade==$row['id'])?"selected='selected'":"").">";
                                            echo $row['descricao'];
                                        echo "</option>";
                                    }

                                    // Free result set
                                    mysqli_free_result($result);
                                } else{
                                    echo $unidade;
                                }
                            }
                        ?>
                    </select>
                </label>
                
                <div class="actions">
                    <button type="button" onclick="submitForm('index.php?status=3');">Gravar</button>
                    <button type="button" class="secondary" onclick="window.location='index.php';">Cancelar</button>
                </div>
            </form>
        </div>

<?php include '../footer.php'; ?>
