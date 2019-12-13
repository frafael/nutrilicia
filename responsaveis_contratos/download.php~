<?php
    $connect = mysqli_connect('localhost','root','', 'nutrilicia');

    if(isset($_GET['contratato_id']) and $_GET['contrato_id'] != '')
        $sql = "SELECT * FROM responsaveis_contratos where responsavel_id = ".$_GET['responsavel_id']." and contrato_id =".$_GET['contrato_id'];
    else
        echo "<script>window.location.href='../responsaveis/index.php';</script>";
        
    if($result = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $filepath = "files/" . $row['filename'];
        
                // Process download
                if(file_exists($filepath)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($filepath));
                    flush(); // Flush system output buffer
                    readfile($filepath);
                    exit;
                }
            }
        }
    }
?>
