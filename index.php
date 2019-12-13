<?php
  //$login_cookie = $_COOKIE['login'];
    $success=1;
    if(isset($_COOKIE['nutrilicia'])){
      header('Location:responsaveis/');
    } else if(isset($_POST['login'])) {
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        $connect = mysqli_connect('localhost','root','', 'nutrilicia');
                   
        $verifica = mysqli_query($connect, "SELECT id, login, senha FROM usuarios WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
          
        if (mysqli_num_rows($verifica)<=0){
            $success=0;
        }else{
            setcookie("nutrilicia", $login);
            header('Location:responsaveis/');
        }

    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/icon.png">
        <title>NUTRILÍCIA</title>

        <script scr="js/jquery-3.4.1.js"></script>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);

            body {
                background: url('img/background.png') #76b852 !important;            
                /*#dfead8*/
                /*#e6e6e6*/
            }

            .login-page {
              width: 360px;
              padding: 8% 0 0;
              margin: auto;
            }
            .form {
              position: relative;
              z-index: 1;
              background: #FFFFFF;
              max-width: 360px;
              margin: 0 auto 100px;
              padding: 45px;
              text-align: center;
              box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            }
            .form input {
              font-family: "Roboto", sans-serif;
              outline: 0;
              background: #f2f2f2;
              width: 100%;
              border: 0;
              margin: 0 0 15px;
              padding: 15px;
              box-sizing: border-box;
              font-size: 14px;
            }
            .form button {
              font-family: "Roboto", sans-serif;
              text-transform: uppercase;
              outline: 0;
              background: #4CAF50;
              width: 100%;
              border: 0;
              padding: 15px;
              color: #FFFFFF;
              font-size: 14px;
              -webkit-transition: all 0.3 ease;
              transition: all 0.3 ease;
              cursor: pointer;
            }
            .form button:hover,.form button:active,.form button:focus {
              background: #43A047;
            }
            .form .message {
              margin: 15px 0 0;
              color: #b3b3b3;
              font-size: 12px;
            }
            .form .message a {
              color: #4CAF50;
              text-decoration: none;
            }
            .form .register-form {
              display: none;
            }
            .container {
              position: relative;
              z-index: 1;
              max-width: 300px;
              margin: 0 auto;
            }
            .container:before, .container:after {
              content: "";
              display: block;
              clear: both;
            }
            .container .info {
              margin: 50px auto;
              text-align: center;
            }
            .container .info h1 {
              margin: 0 0 15px;
              padding: 0;
              font-size: 36px;
              font-weight: 300;
              color: #1a1a1a;
            }
            .container .info span {
              color: #4d4d4d;
              font-size: 12px;
            }
            .container .info span a {
              color: #000000;
              text-decoration: none;
            }
            .container .info span .fa {
              color: #EF3B3A;
            }
            body {
              background: #76b852; /* fallback for old browsers */
              background: -webkit-linear-gradient(right, #76b852, #8DC26F);
              background: -moz-linear-gradient(right, #76b852, #8DC26F);
              background: -o-linear-gradient(right, #76b852, #8DC26F);
              background: linear-gradient(to left, #76b852, #8DC26F);
              font-family: "Roboto", sans-serif;
              -webkit-font-smoothing: antialiased;
              -moz-osx-font-smoothing: grayscale;      
            }

            .logo {
                width: 180px;
                margin-bottom: 30px;
                margin-top: -15px;            
            }
            .msg {
                margin-bottom: 10px;
                font-size: 12px;
                padding: 3px;
                font-weight: bold;
                color: #b5521f;
                background: #ffeeee;            
            }
        </style>
        <script type="javascript">
            $(function(){
                $('.message a').click(function(){
                   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
                });
            });
        </script>    
    </head>
    <body>
        <div class="login-page">
          <div class="form">
            <img class="logo" src="img/logo.png" />
            <form class="register-form" method='POST'>
              <input type="login" name='login' placeholder="Usuário" />
              <input type="senha" name='senha' placeholder="Senha"/>
              <input type="text" placeholder="e-mail"/>
              <button>Criar</button>
              <p class="message">Deseja acessar? <a href="#">Cadastrar</a></p>
            </form>
            <form class="login-form" method='POST'>
              <?php
                    if (isset($success) && $success == 0 )
                        echo '<div class="msg">Usuário ou senha incorretos<i class="fa fa-close" onclick="$(\'.msg\').remove();"></i></div>';
              ?>
              <input type="text" name='login' placeholder="Usuário" value='<?php echo (isset($login)?$login:''); ?>'/>
              <input type="password" name='senha' placeholder="Senha"/>
              <button>login</button>
              <p class="message">Não é cadastrado? <a href="#">Crie uma conta</a></p>
            </form>
          </div>
        </div>
    </body>
</html>
