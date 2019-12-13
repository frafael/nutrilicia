<?php include '../header.php'; ?>

        <div class="content">   
            <div class="title">
                Editar Aluno
            </div>         
            <form id="form" method="post" action="save.php">
                <?php 
                    if(isset($_GET['id']) and $_GET['id'] != '')
                        $sql = "SELECT * FROM alunos where id = ".$_GET['id'];
                    else
                        echo "<script>window.location.href='index.php';</script>";
                        

                    if($result = mysqli_query($connect, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                ?>         
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                    <input type="hidden" name="responsavel_id" value="<?php echo $row['responsavel_id']; ?>"/>
                    <label><span>Nome: </span><input type="text" name="nome" value="<?php echo $row['nome']; ?>" /></label>
                    <label><span>Série: </span><input type="text" name="serie" value="<?php echo $row['serie']; ?>" /></label>
                    <label><span>Data de Nascimento: </span><input class="date" type="text" name="nascimento" value="<?php echo $row['nascimento']; ?>" /></label>
                    <label><span>Restrição Alimentar: </span><input type="text" name="restricao" value="<?php echo $row['restricao']; ?>"/></label>
                    
                    <div class="actions">
                        <button type="button" onclick="submitForm('index.php?status=3&responsavel_id=<?php echo $row['responsavel_id']; ?>');">Gravar</button>
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
