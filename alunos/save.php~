<?php 

$connect = mysqli_connect('localhost','root','', 'nutrilicia');
#$db = mysql_select_db('nutrilicia');

if(isset($_POST['id'])) 
    $id = $_POST['id'];

$nome = $_POST['nome'];
$serie = $_POST['serie'];
$restricao = $_POST['restricao'];
$nascimento = $_POST['nascimento'];
$responsavel_id = $_POST['responsavel_id'];

if(isset($_POST['id'])) {
    $query = "UPDATE alunos set nome = '$nome', nascimento='$nascimento', restricao='$rg', restricao='$restricao', responsavel_id='$responsavel_id' where id='$id';";   
    $update = mysqli_query($connect, $query);
} else {
    $query = "INSERT INTO alunos(nome, serie, nascimento, restricao, responsavel_id) VALUES ('$nome', '$serie', '$restricao', '$nascimento', $responsavel_id)";      
    $insert = mysqli_query($connect, $query);
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
