<?php 

$connect = mysqli_connect('localhost','root','', 'nutrilicia');
$db = mysql_select_db('nutrilicia');


?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/icon.png">
        <title>NUTRILÍCIA</title>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/jquery-3.4.1.js"></script>
        <script src="js/jquery.mask.js"></script>

        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);
            @import url(css/style.css);
        </style>
        <script>
            $(document).ready(function(){
              $('.date').mask('00/00/0000');
              $('.time').mask('00:00:00');
              $('.date_time').mask('00/00/0000 00:00:00');
              $('.cep').mask('00000-000');
              $('.phone').mask('0000-0000');
              $('.phone_with_ddd').mask('(00) 0000-0000');
              $('.phone_us').mask('(000) 000-0000');
              $('.mixed').mask('AAA 000-S0S');
              $('.cpf').mask('000.000.000-00', {reverse: true});
              $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
              $('.money').mask('000.000.000.000.000,00', {reverse: true});
              $('.money2').mask("#.##0,00", {reverse: true});
              $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                translation: {
                  'Z': {
                    pattern: /[0-9]/, optional: true
                  }
                }
              });
              $('.ip_address').mask('099.099.099.099');
              $('.percent').mask('##0,00%', {reverse: true});
              $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
              $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
              $('.fallback').mask("00r00r0000", {
                  translation: {
                    'r': {
                      pattern: /[\/]/,
                      fallback: '/'
                    },
                    placeholder: "__/__/____"
                  }
                });
              $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});

                $(".aluno.more").click(function(){
                     $(".alunos").append($("#aluno").html());   
                });
            });

            function submitForm() {
                $.post( "save-responsavel.php", $("#form").serialize())
                  .done(function( data ) {
                    if(data == '') {
                        window.location.href= 'list.php?status=1';
                    } else {
                        alert('Não foi possível realizar a operação.');                    
                    }
                  });
            }
        </script>    
        <script id="aluno" type="template">
            <div class="aluno">
                <label><span>Nome: </span><input type="text" name="nome_aluno[]"/></label>
                <label><span>Série/FB2 ou Regular: </span><input type="text" name="serie_aluno[]"/></label>
                <label><span>Data de Nascimento: </span><input type="text" name="nascimento_aluno[]"/></label>
                <label><span>Restrição Alimentar: </span><input type="text" name="restricao_aluno[]"/></label>
            </div>
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
                        <form action="">
                        <input placeholder="BUSCAR" type="text" name="search" />
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <button type="submit">BUSCAR</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content">
            <?php
                $nome = '';
                $serie = '';
                $nascimento = '';
                $restricao = '';
                
                if(isset($_GET['id'])) {
                    $sql = "SELECT * FROM alunos where id = ".$_GET['id'];
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
                }
            ?>
                
            <div class="title">
                Novo Aluno
            </div>         
            <form id="form" method="post" action="save-responsavel.php">            
                <label><span>Nome: </span><input type="text" name="nome_aluno[]"/></label>
                <label><span>Série/FB2 ou Regular: </span><input type="text" name="serie_aluno[]"/></label>
                <label><span>Data de Nascimento: </span><input type="text" name="nascimento_aluno[]"/></label>
                <label><span>Restrição Alimentar: </span><input type="text" name="restricao_aluno[]"/></label>              
                
                
                <div class="actions">
                    <button type="button" onclick="submitForm();">Gravar</button>
                    <button type="button" class="secondary">Cancelar</button>
                </div>
            </form>
        </div>
    </body>
</html>
