<?php 


$connect = mysqli_connect('localhost','root','', 'nutrilicia');
#$db = mysql_select_db('nutrilicia');

$filename = '';
if(isset($_POST['id'])) { 
    $id = $_POST['id'];
    $filename = $_POST['filename'];
} else {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $filename = basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    /*if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }*/
    // Allow certain file formats
    if($fileType != "docx") {
        echo "Sorry, only DOCX files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$descricao = $_POST['descricao'];
$ano = $_POST['ano'];

if(isset($_POST['id'])) {
    $query = "UPDATE contratos set descricao = '$descricao', ano = '$ano', filename = '$filename' where id='$id';";   
    $update = mysqli_query($connect, $query);
    header('Location:index.php?status=3');
} else {
    $query = "INSERT INTO contratos(descricao, ano, filename) VALUES ('$descricao', '$ano', '$filename')";  
    $insert_responsavel = mysqli_query($connect, $query);
    header('Location:index.php?status=1');
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
