<?php include '../header.php'; ?>

        <div class="content">   
            <div class="title">
                Nova Unidade
            </div>         
            <form id="form" method="post" action="save.php">            
                <label><span>Descrição: </span><input type="text" name="descricao"/></label>
                
                <div class="actions">
                    <button type="button" onclick="submitForm('index.php?status=1');">Gravar</button>
                    <button type="button" class="secondary" onclick="window.location='index.php';">Cancelar</button>
                </div>
            </form>
        </div>

<?php include '../footer.php'; ?>
