<?php include '../header.php'; ?>

        <div class="content">   
            <div class="title">
                Editar Contrato
            </div>         
            <form id="form" method="post" action="save.php" enctype="multipart/form-data">
                <?php 
                    if(isset($_GET['id']) and $_GET['id'] != '')
                        $sql = "SELECT * FROM contratos where id = ".$_GET['id'];
                    else
                        echo "<script>window.location.href='index.php';</script>";
                        

                    if($result = mysqli_query($connect, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                ?>         

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                    <label><span>Descricao: </span><input type="text" name="descricao" value="<?php echo $row['descricao']; ?>" /></label>
                    <label><span>Ano: </span><input type="text" name="descricao" value="<?php echo $row['ano']; ?>" /></label>
                    <label>
                        <span>Arquivo: </span>
                        <?php echo $row['filename']; ?>                    
                        <input type="hidden" name="filename" value="<?php echo $row['filename']; ?>"/>
                    </label>
                
                <?php 
                            }
                        } else {
                            echo "<script>window.location.href='index.php';</script>";
                        }
                    } else {
                        echo "<script>window.location.href='index.php';</script>";                 
                    }
                ?>   
                
                <div class="actions">
                    <!-- <button type="button" onclick="submitForm('index.php?status=3');">Gravar</button>-->
                    <button type="submit">Gravar</button>
                    <button type="button" class="secondary" onclick="window.location='index.php';">Cancelar</button>
                </div>
            </form>
        </div>

<?php include '../footer.php'; ?>
