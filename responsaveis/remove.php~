<?php 

$connect = mysqli_connect('localhost','root','', 'nutrilicia');
#$db = mysql_select_db('nutrilicia');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if($id != '') {
        $query = "DELETE from responsaveis where id = $id";

       if (mysqli_query($connect, $query)) {
       } else {
          echo "Erro ao excluir responsável " . mysqli_error($connect);
       }
       mysqli_close($connect);
    } else {
        echo 'ID não encontrado.';
    }
} else {
    echo 'ID não encontrado.';
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
