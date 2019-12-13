<?php 

$connect = mysqli_connect('localhost','root','', 'nutrilicia');
#$db = mysql_select_db('nutrilicia');

$contrato = $_POST['contrato_id'];
$responsavel_id = $_POST['responsavel_id'];

$pacote = $_POST['pacote'];
$valor = $_POST['valor'];
$pagamento = $_POST['pagamento'];
$parcelamento = $_POST['parcelamento'];
$observacoes = $_POST['observacoes'];

$filename = '';
$sql = "SELECT c.ano as ano, r.nome as responsavel_nome FROM contratos c left join responsaveis r on r.id = $responsavel_id where c.id = $contrato";
if($result = mysqli_query($connect, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $filename = $row['ano']."-". $responsavel_id . " - ".$row['responsavel_nome'].".docx";
        }
    }
}

$sql = "SELECT * FROM responsaveis_contratos where responsavel_id = $responsavel_id and contrato_id = $contrato";
if($result = mysqli_query($connect, $sql)){
    if(mysqli_num_rows($result) > 0){
        $query = "UPDATE responsaveis_contratos set pacote = '$pacote', filename = '$filename', valor='$valor', pagamento='$pagamento', parcelamento='$parcelamento', observacoes='$observacoes' where responsavel_id=$responsavel_id and contrato_id=$contrato;";   
        $update = mysqli_query($connect, $query);
    } else {
        $query = "INSERT INTO responsaveis_contratos(responsavel_id, contrato_id, date, filename, pacote, valor, pagamento, parcelamento, observacoes) VALUES ($responsavel_id,$contrato,now(),'$filename','$pacote','$valor','$pagamento', '$parcelamento', '$observacoes')";
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
