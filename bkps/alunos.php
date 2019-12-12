<?php 
 
$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$connect = mysql_connect('localhost','','');
$db = mysql_select_db('nutrilicia');
$query_select = "SELECT login FROM usuarios WHERE login = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['login'];

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/icon.png">
        <title>NUTRILÍCIA</title>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);
            @import url(css/style.css);
        </style>
        <script>
            
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
            <table>
                <thead>
                    <tr>
                        <th>Responsável</th>
                        <th width="150px">Unidade</th>                 
                        <th width="85px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>                 
                        <td>
                            <div class="nome">Pâmela Severo</div>
                        </td>
                        <td>Júnior Sul</td>
                        <td>
                            <div class="actions">
                                <i title="Editar" class="fa fa-pencil" aria-hidden="true"></i>
                                <i title="Contratos" class="fa fa-files-o" aria-hidden="true"></i>
                                <i title="Remover" class="fa fa-trash remove" aria-hidden="true"></i>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd">                 
                        <td>
                            <div class="nome">Rafael Lima</div>
                        </td>
                        <td>Júnior Eusébio</td>
                        <td>
                            <div class="actions">
                                <i title="Editar" class="fa fa-pencil" aria-hidden="true"></i>
                                <i title="Contratos" class="fa fa-files-o" aria-hidden="true"></i>
                                <i title="Remover" class="fa fa-trash remove" aria-hidden="true"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>                 
                        <td>
                            <div class="nome">Karina Morais</div>
                        </td>
                        <td>Júnior Sul</td>
                        <td>
                            <div class="actions">
                                <i title="Editar" class="fa fa-pencil" aria-hidden="true"></i>
                                <i title="Contratos" class="fa fa-files-o" aria-hidden="true"></i>
                                <i title="Remover" class="fa fa-trash remove" aria-hidden="true"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
