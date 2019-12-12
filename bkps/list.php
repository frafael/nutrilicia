<?php 
 
$connect = mysqli_connect('localhost','root','', 'nutrilicia');

?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/icon.png">
        <title>NUTRILÍCIA</title>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/jquery-3.4.1.js" ></script>

        <script>
            var page_url = "<?php if(isset($_GET['page']) && $_GET['page'] != '' ) echo $_GET['page']; ?>"
        </script>
        <script src="js/pagination.js" ></script>
        
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);
            @import url(css/style.css);

            #pagination { margin-top: 15px; }
            #pagination a {
                background: #f1f1f1;
                padding: 3px 10px;
                border-radius: 2px;
                margin: 3px;
                cursor: pointer;
             }
             #pagination a.active {
                background: #4caf50;
                color: white;
             }
             .total_num_row {
                color: #4caf50;
                margin-top: 10px;
                font-size: 15px;
             }            
             .msg {
                position: relative;
                color: #2b763a;
                font-weight: bold;
                border-radius: 4px;
                background: #dcefdd;
                padding: 15px 12px;
                margin-bottom: 15px;                
             }
                
             .msg i {
                position: absolute;
                top: 15px;
                right: 12px;
                padding: 1px 3px 2px 3px;              
             }

            .msg i:hover {
                color: white;
                background: #2b763a;
                border-radius: 2px;
                cursor: pointer;
            }

            .title .button {
                color: white;
                background: #8bce66;
                border: none;
                border-radius: 3px;
                padding: 6px 10px;
                margin-left: 3px;
                cursor: pointer;
                text-decoration: none;
                font-size: 14px;
                position: absolute;
                top: 11px;
                right: 46px;
            }
            .title .button:hover { 
                background: #2b773c;
            }
            .popup {
                min-width: 300px;
                max-width: 700px;
                min-height: 80px;
                background: white;
                padding: 10px;
                z-index: 999;
                position: fixed;
                left: 50%;
                margin-left: -165px;
                top: 50%;
                margin-top: -115px;
                border-radius: 5px;
                box-shadow: 1px 1px 4px #C1C1C1;
            }
            .popup .text{
                min-height: 30px;
                font-weight: bold;
                text-align: center;
                padding: 20px 0;
            }
            .popup .buttons {
                text-align: center;            
            }
            .popup-background {
                position: fixed;      
                background: white;
                opacity: 0.5;                
                z-index: 998;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;      
            }
            
            .popup button {
                color: white;
                background: #8bce66;
                border: none;
                border-radius: 3px;
                padding: 6px 10px;
                margin-left: 3px;
                cursor: pointer;
                text-decoration: none;
                font-size: 14px;
            }
            .popup button:hover { 
                background: #2b773c;
            }
            .no-results {
                margin-top: 15px;
                color: #b1b1b1;
                font-weight: bold;
                padding: 25px;
                border: 2px dashed #e2e2e2;
            }
            
            .bar.search {
                overflow: hidden;             
                height: 0px;
                background: #8bce66;  

                transition: height .5s;         
            }
    
            .bar.search.visible {
                height: 45px;           
            }
            
            .bar.search .search {
                position: relative;            
                right: 0;
                top: 9px;  
                float: right;          
            }

            .bar .search i {
                cursor: pointer;            
            }
            
            .bar .search i:hover {
                cursor: pointer;   
                color: #2a7539;         
            }
        
        </style>
        <script>
            $(function(){
                $(".bar .search i").click(function(){
                    $(".bar.search").toggleClass("visible");                
                })
            });   
            function editar(id) {
                window.location.href = 'edit-responsavel.php?id='+id;
            }

            function remover(id) {
                popup("Deseja excluir o reponsável financeiro?",
                    [
                        {"name": "Sim", "action": function(){
                            $.get( "remove-responsavel.php?id="+id)
                              .done(function( data ) {
                                if(data == '') {
                                    window.location.href= 'list.php?status=2&page='+page;
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

            function popup(text, buttons) {
                $("body").append("<div class='popup'><div class='text'>"+text+"</div><div class='buttons'></div></div>");
                $("body").append("<div class='popup-background'></div>");                
                $(buttons).each(function(i){
                    $(".popup .buttons").append("<button class='button-popup-"+i+"' type='button'>"+this.name+"</button>")  ; 
                    $(".popup .buttons .button-popup-"+i).click(this.action);
    
                });

                
            }
            
            function contratos(id) {
                window.location.href = 'contratos.php?responsael_id='+id;
            }
            
            
        </script>    
    </head>
    <body>
        <div class="bar">
            <div class="content-bar">
                <img class="logo" src="img/logo.png" />
                <div class="menu">
                    <label class="action" for="active"><i class="fa fa-bars" aria-hidden="true"></i> MENU</label>
                    <input type="checkbox" id="active" />
                    <div class="itens">
                        <div class="item"><i class="fa fa-user" aria-hidden="true"></i> Responsáveis</div>
                        <div class="item"><i class="fa fa-file-text" aria-hidden="true"></i> Contratos</div>
                        <div class="item"><i class="fa fa-map-marker" aria-hidden="true"></i> Unidades</div>
                        <div class="item" style="color: #2a7539; font-weight: bold;"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</div>
                    </div>
                </div>
                <div class="search">
                        <i class="fa fa-search" title="BUSCAR" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <div class="bar search">
            <div class="content-bar">
                <div class="search">
                    <form action="" autocomplete="off">
                        <input placeholder="Responsável Financeiro..." type="text" name="search">

                        <select name="unidade">
                                <option value="">Todas Unidades</option>
                                <?php
                                    $sql = "SELECT * FROM unidade";
                                    $unidade = isset($_GET['unidade'])?$_GET['unidade']:'';
                                    if($result = mysqli_query($connect, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<option value='".$row['id']."' ".$_GET['unidade']==$row['id']?"selected='selected'":"".">";
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

                        <button type="submit">BUSCAR</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="content" style="padding-top: 70px;">  
            <div class="title">
                Responsáveis Financeiros
                
                <a class="button" href="http://localhost/nutrilicia/form-responsavel.php">Novo Responsável</a>
            </div>
            
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
                                     <i title="Editar" class="fa fa-pencil" aria-hidden="true"></i>
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
    <body>
</html>
