<?php 

$connect = mysqli_connect('localhost','root','', 'nutrilicia');
#$db = mysql_select_db('nutrilicia');

if(isset($_POST['id'])) 
    $id = $_POST['id'];

$descricao = $_POST['descricao'];

if(isset($_POST['id'])) {
    $query = "UPDATE unidade set descricao = '$descricao' where id='$id';";   
    $update = mysqli_query($connect, $query);
} else {
    $query = "INSERT INTO unidade(descricao) VALUES ('$descricao')";  
    $insert_responsavel = mysqli_query($connect, $query);
}
 
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
