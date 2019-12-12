<?php 

$connect = mysqli_connect('localhost','root','', 'nutrilicia');
#$db = mysql_select_db('nutrilicia');

if(isset($_POST['id'])) 
    $id = $_POST['id'];

$nome = $_POST['nome'];
$nacionalidade = $_POST['nacionalidade'];
$nascimento = $_POST['nascimento'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$relacionamento = $_POST['relacionamento'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$unidade = $_POST['unidade'];

if(isset($_POST['id'])) {
    $query = "UPDATE responsaveis set nome = '$nome', nacionalidade='$nacionalidade', nascimento='$nascimento', rg='$rg', cpf='$cpf', relacionamento='$relacionamento', email='$email', endereco='$endereco', cep='$cep', telefone='$telefone' where id='$id';";
    $update = mysqli_query($connect, $query);
} else {
    $query = "INSERT INTO responsaveis(nome, nacionalidade, nascimento, rg, cpf, relacionamento, email, endereco, cep, telefone, unidade_id) VALUES ('$nome', '$nacionalidade', '$nascimento', '$rg', '$cpf', '$relacionamento', '$email', '$endereco', '$cep', '$telefone', $unidade)";  
    $insert_responsavel = mysqli_query($connect, $query);
    $responsavel_id = mysqli_insert_id($connect);

    $nome_aluno = $_POST['nome_aluno'];
    $serie_aluno = $_POST['serie_aluno'];
    $restricao_aluno = $_POST['restricao_aluno'];
    $nascimento_aluno = $_POST['nascimento_aluno'];

    $i = 0;
    foreach ($nome_aluno as $key => $value) {
        $query = "INSERT INTO alunos(nome, serie, nascimento, restricao, responsavel_id) VALUES ('$value', '$serie_aluno[$i]', '$restricao_aluno[$i]', '$nascimento_aluno[$i]', $insert_responsavel)";      
        $insert = mysqli_query($connect, $query);
        $i++;
    }
    
    $contrato = $_POST['contrato'];
    if(isset($_POST['contrato'])) {
        #$data = date();

        $filename = '';
        $sql = "SELECT * FROM contratos where id = $contrato";
            if($result = mysqli_query($connect, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $fileName = $row['ano']."-". $responsavel_id . " - ".$nome.".docx";
                    }
                }
            }

        $pacote = $_POST['pacote'];
        $valor = $_POST['valor'];
        $pagamento = $_POST['pagamento'];
        $observacoes = $_POST['observacoes'];

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
