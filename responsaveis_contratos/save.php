<?php 

$connect = mysqli_connect('localhost','root','', 'nutrilicia');
#$db = mysql_select_db('nutrilicia');

$contrato_ = $_POST['contrato_id'];
$responsavel_id = $_POST['responsavel_id'];

}

$pacote = $_POST['pacote'];
$valor = $_POST['valor'];
$pagamento = $_POST['pagamento'];
$observacoes = $_POST['observacoes'];

$filename = '';
$sql = "SELECT * FROM contratos where id = $contrato";
if($result = mysqli_query($connect, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $fileName = $row['ano']."-". $responsavel_id . " - ".$nome.".docx";
        }
    }
}

$sql = "SELECT * FROM responsaveis_contratos where responsavel_id = $responsavel_id and contrato_id = $contrato";
if($result = mysqli_query($connect, $sql)){
    if(mysqli_num_rows($result) > 0){
        $query = "UPDATE responsaveis_contratos set pacote = '$pacote', pacote = '$filename', valor='$valor', pagamento='$pagamento', restricao='$observacoes' where responsavel_id='$responsavel_id' and contrato_id='$contrato';";   
        $update = mysqli_query($connect, $query);
    } else {
        $query = "INSERT INTO responsaveis_contratos(responsavel_id, contrato_id, date, filename, pacote, valor, pagamento, observacoes) VALUES ($responsavel_id,$contrato,now(),'$filename','$pacote','$valor','$pagamento','$observacoes')";
        $insert = mysqli_query($connect, $query);        
    }
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
