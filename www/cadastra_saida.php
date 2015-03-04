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




if (!$connection) 
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ");
pg_query($connection,"INSERT INTO destinacao(
           residuo_classificado, peso, data, id_empresa, 
            tipo_destino)
    VALUES ('$residuo','$peso','$data',2, '$tipo_destino')");


print"cadastro feito com sucesso!";



?>