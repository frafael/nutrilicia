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

                <label><span>Nome: </span><input type="text" name="nome"/></label>
                <label><span>Série/FB2 ou Regular: </span><input type="text" name="serie"/></label>
                <label><span>Data de Nascimento: </span><input type="text" name="nascimento"/></label>
                <label><span>Restrição Alimentar: </span><input type="text" name="restricao"/></label>
                
                <div class="actions">
                    <button type="button" onclick="submitForm('index.php?status=1&responsavel_id=<?php echo $_GET['responsavel_id']; ?>');">Gravar</button>
                    <button type="button" class="secondary" onclick="window.location='index.php?responsavel_id=<?php echo $_GET['responsavel_id']; ?>';">Cancelar</button>
                </div>
            </form>
        </div>

<?php include '../footer.php'; ?>
