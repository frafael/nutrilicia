<?php 

$connect = mysqli_connect('localhost','root','', 'nutrilicia');
if(isset($_GET['responsavel_id']) and $_GET['responsavel_id'] != '')
    $sql = "SELECT c.id as contrato_id, c.descricao as contrato_descricao, r.id as responsavel_id, r.nome as responsavel_nome, ".
            "c.filename as filecontrato, rc.filename as filename, ".
            "r.nacionalidade as responsavel_nacionalidade, r.nascimento as responsavel_nascimento, r.rg as responsavel_rg, ".
                    "r.cpf as responsavel_cpf, r.cpf as responsavel_relacionamento, r.email as responsavel_email, ".
                    "r.endereco as responsavel_endereco, r.cep as responsavel_cep, r.telefone as responsavel_telefone, ".
                    "rc.pacote as pacote, rc.valor as valor, rc.pacelamento as parcelamento, rc.pagamento as pagamento, rc.observacoes as observacoes ".
            "FROM responsaveis_contratos rc ".
                "left join responsavel r on r.id = rc.responsavel_id ".
                "left join contrato c on c.id = rc.contrato_id ".
                    "where responsavel_id = ".$_GET['responsavel_id']." and contrato_id =".$_GET['contrato_id'];
else
    echo "<script>window.location.href='../responsaveis/index.php';</script>";
    
if($result = mysqli_query($connect, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                    
            $template_file_name = "../contratos/uploads/".$row['filecontrato'];
            $rand_no = rand(111111, 999999);
            $fileName = $row['filename'];

            $folder   = "files";
            $full_path = $folder . '/' . $fileName;

            try
            {
                if (!file_exists($folder))
                {
                    mkdir($folder);
                }       
                     
                //Copy the Template file to the Result Directory
                copy($template_file_name, $full_path);
             
                // add calss Zip Archive
                $zip_val = new ZipArchive;
             
                //Docx file is nothing but a zip file. Open this Zip File
                if($zip_val->open($full_path) == true)
                {
                    // In the Open XML Wordprocessing format content is stored.
                    // In the document.xml file located in the word directory.
                     
                    $key_file_name = 'word/document.xml';
                    $message = $zip_val->getFromName($key_file_name);                   
                                 
                    $timestamp = date('d-M-Y H:i:s');
                     echo $message;

                    // this data Replace the placeholders with actual values
                    $message = str_replace("#NOME_CONTRATANTE#", $row['responsavel_nome'],       $message);
                    $message = str_replace("#NACIONALIDADE#", $row['responsavel_nacionalidade'],           $message);
                    $message = str_replace("#DATA_NACIMENTO#", $row['responsavel_nascimento'],                  $message);      
                    $message = str_replace("#RG_CONTRATANTE#", $row['responsavel_rg'],           $message); 
                    $message = str_replace("#CPF_CONTRATANTE#", $row['responsavel_cpf'],           $message); 
                    $message = str_replace("#GRAU_RELACIONAMENTO#", $row['responsavel_relacionamento'],           $message); 
                    $message = str_replace("#EMAIL_CONTRATANTE#", $row['responsavel_email'],           $message); 
                    $message = str_replace("#ENDERECO_CONTRATANTE#", $row['responsavel_endereco'],           $message); 
                    $message = str_replace("#CEP_CONTRATANTE#", $row['responsavel_cep'],           $message); 
                    $message = str_replace("#TELEFONE_CONTRATANTE#", $row['responsavel_telefone'],           $message); 
                    
                    $sql = 'select * from alunos where responsavel_id = '.$_GET['responsavel_id'];                    
                    if($result = mysqli_query($connect, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            $i = 1;
                            while($row = mysqli_fetch_array($result)){
                                $message = str_replace("#NOME_ALUNO_".$i."#", $row['nome'],           $message); 
                                $message = str_replace("#SERIE_ALUNO_".$i."#", $row['serie'],           $message); 
                                $message = str_replace("#DATA_NASCIMENTO_ALUNO_".$i."#", $row['nascimento'],           $message); 
                                $message = str_replace("#RESTRICAO_ALIMENTAR_ALUNO_".$i."#", $row['restricao'],           $message); 
                                $i++;                            
                            }
                        }
                    }

                    $message = str_replace("#PACOTE#", $row['pacote'],           $message); 
                    $message = str_replace("#VALOR_TOTAL#", $row['valor'],           $message); 
                    $message = str_replace("#PARCELAMENTO#", $row['parcelamento'],           $message); 
                    $message = str_replace("#FORMA_PAGAMENTO#", $row['pagamento'],           $message); 
                    $message = str_replace("#OBSERVACOES#", $row['observacoes'],           $message); 

                    //Replace the content with the new content created above.
                    $zip_val->addFromString($key_file_name, $message);
                    $zip_val->close();
                }
            }
            catch (Exception $exc) 
            {
                $error_message =  "Error creating the Word Document";
                var_dump($exc);
            }

        }
    }
}


?>
