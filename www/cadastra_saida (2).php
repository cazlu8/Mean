<?php
$connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
$empresa=$_POST['empresa'];
$peso=$_POST['peso_saida'];
$data=$_POST['calendario2'];
$residuo=$_POST['residuo_classificado'];
$tipo_destino=$_POST['destino'];

$_residuo=pg_query($connection,"SELECT nome_residuo from residuo_classificado where id_residuo='$residuo'");
$line = pg_fetch_assoc($_residuo);
$residuo= $line['nome_residuo'];
$_empresa=pg_query($connection,"SELECT nome_empresa from  empresa where id_empresa='$empresa'");
$line = pg_fetch_assoc($_empresa);
$empresa= $line['nome_empresa'];



if (!$connection) 
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ");

if($empresa==0 && $tipo_destino!=0){
pg_query($connection,"INSERT INTO destinacao(
           residuo_classificado, peso, data, 
            tipo_destino)
    VALUES ('$residuo','$peso','$data','$tipo_destino')");

}else if($empresa!=0 && $tipo_destino==0){
pg_query($connection,"INSERT INTO destinacao(
           residuo_classificado, peso, data, nome_empresa)
    VALUES ('$residuo','$peso','$data','$empresa')");

}



print"cadastro feito com sucesso!";



?>