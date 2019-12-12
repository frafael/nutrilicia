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
            
            #form {
                text-align: left;            
            }
            #form input, #form textarea, #form select  {
                font-family: "Roboto", sans-serif;
                outline: 0;
                background: #f2f2f2;
                border: 1px solid #f2f2f2;
                margin: 0 0 15px;
                padding: 15px;
                box-sizing: border-box;
                font-size: 14px;            
            }
            #form input:focus, #form textarea:focus, #form select:focus {
                border: 1px solid #4caf50;           
            }
            #form input {
                width: 300px;       
            }
            #form textarea {
                width: 600px;   
                vertical-align: middle;    
            }
            #form label {
                width: 100%;
                display: block;            
            }
            #form button {
                font-family: "Roboto", sans-serif;
                text-transform: uppercase;
                outline: 0;
                background: #4CAF50;
               
                margin: 5px;
                width: 100px;
                border: 0;
                padding: 15px;
                color: #FFFFFF;
                font-size: 14px;
                -webkit-transition: all 0.3 ease;
                transition: all 0.3 ease;
                cursor: pointer;
            }
            #form button.secondary {
                background: #c1c1c1;
            } 
            #form button.secondary:hover {
                background: #adadad;
            }            
            #form button:hover {
                background: #43A047;            
            }
            #form {
                margin-top: 35px;            
            }
            #form label span {
                min-width: 180px;
                display: inline-block;            
            }
            #form .actions {
                text-align: center; 
                margin-top: 10px;           
            }
            #form .session {
                margin: 15px 10px 15px 0;
                padding: 5px 0;
                border-bottom: 2px solid #e1e1e1;
                color: #4caf50;
                font-weight: bold;            
            }
            .content .title {
                position: absolute;
                top: 0;
                left: 0;
                width: calc(100% - 80px - 4px);
                text-align: left;
                padding: 15px 40px;
                border-left: 4px solid #4caf50;
                background: #f9f9f9;
                font-weight: bold;
                color: #2b763a;
                box-shadow: 0px 1px 1px #e2e2e2;            
            }
            .alunos {
                border-bottom: 1px solid #ececec;            
            }
            .alunos .aluno {
                padding-left: 20px;
                border-left: 5px solid #ececec;
                margin-bottom: 15px;
            }
    
            .more.aluno { margin: 10px 0 !important; }
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
        </script>    
        <script id="aluno" type="template">
            <div class="aluno">
                <label><span>Nome: </span><input type="text" name="nome"/></label>
                <label><span>Série/FB2 ou Regular: </span><input type="text" name="serie"/></label>
                <label><span>Data de Nascimento: </span><input type="text" name="nascimento"/></label>
                <label><span>Restrição Alimentar: </span><input type="text" name="restricao"/></label>
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
            <div class="title">
                Novo Responsável
            </div>         
            <form id="form" action="">            
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
                        <option>Selecione...</option>
                        <option>FB Júnior Sul</option>
                        <option>FB Júnior Eusébio</option>
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
                        <label><span>Nome: </span><input type="text" name="nome_aluno"/></label>
                        <label><span>Série/FB2 ou Regular: </span><input type="text" name="serie_aluno"/></label>
                        <label><span>Data de Nascimento: </span><input type="text" name="nascimento_aluno"/></label>
                        <label><span>Restrição Alimentar: </span><input type="text" name="restricao_aluno"/></label>
                    </div>
                </div>                
                <button type="button" class="more aluno">Adicionar</button>

                <div class="session">PLANO CONTRATADO</div>
                <label><span>Pacote: </span><input type="text" name="pacote"/></label>
                <label><span>Valor Total: </span><input type="text" class="money2" name="valor"/></label>
                <label><span>Parcelamento: </span><input type="text" name="parcelamento"/></label>
                <label>
                    <span>Forma de Pagamento: </span>
                    <select name="pagamento">
                        <option>Selecione...</option>
                        <option value="VISTA">A vista</option>
                        <option value="BOLETO">Boleto</option>
                        <option value="CHEQUE">Cheque</option>
                    </select>
                </label>
                <label><span>Observações: </span><textarea name="observacoes"/></textarea></label>

                <div class="session">CONTRATO</div>
                <label>
                    <span>Modelo: </span>
                    <select name="modeloContrato">
                        <option>Selecione...</option>
                        <option>2020</option>
                        <option>2020 (2 ALUNOS)</option>
                        <option>2020 (3 ALUNOS)</option>
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
                    <button type="submit">Gravar</button>
                    <button type="button" class="secondary">Voltar</button>
                </div>
            </form>
        </div>
    </body>
</html>
