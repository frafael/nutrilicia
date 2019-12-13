<?php 

$connect = mysqli_connect('localhost','root','', 'nutrilicia');
#$db = mysql_select_db('nutrilicia');

if(isset($_POST['id'])) 
    $id = $_POST['id'];

$login = $_POST['login'];
$senha = $_POST['senha'];
$contrasenha = $_POST['contrasenha'];
$header = 'index.php';
if(isset($_POST['id'])) {
    $sql = "SELECT * FROM usuarios u where login = '$login' and id != $id";

    if($result = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($result) > 0){
            $header = 'edit.php?status=4&id='.$id;
        }
    }

        $query = "UPDATE usuarios set login = '$login' where id=$id";   
        $update = mysqli_query($connect, $query);

        $header = 'index.php?status=3';

        if (isset($senha) && $senha != '' && $senha != 'undefined' && $senha == $contrasenha) {
            $query = "UPDATE usuarios set senha = '$senha' where id=$id;";   
            $update = mysqli_query($connect, $query);
        } else if (isset($senha) && $senha != '' && $senha != 'undefined') {
            $header = 'edit.php?status=5&id='.$id;   
        }
        
} else {
    $sql = "SELECT * FROM usuarios u where login = '$login'";
    if($result = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($result) > 0){
            $header = 'new.php?status=4&login='.$login;
        }
    }

    if (isset($senha) && $senha != '' && $senha != 'undefined' && $senha == $contrasenha) {
        $query = "INSERT INTO usuarios(login, senha) VALUES ('$login', '$senha')";  
        $insert = mysqli_query($connect, $query);
        $header = 'index.php?status=1';
    } else {
        $header = 'new.php?status=5&login='.$login;
        
    }

}

header('Location:'.$header);

/*if($insert){
  echo"<script language='javascript' type='text/javascript'>
  alert('Usuário cadastrado com sucesso!');window.location.
  href='login.html'</script>";
}else{
  echo"<script language='javascript' type='text/javascript'>
  alert('Não foi possível cadastrar esse usuário');window.location
  .href='cadastro.html'</script>";
}
?>*/
