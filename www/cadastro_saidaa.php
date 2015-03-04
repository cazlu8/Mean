<?php
$d= pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");


$residuo_classificado=$_POST['residuo_classificado'];
$result= pg_query($d,"SELECT nome_residuo FROM residuo_classificado where id_residuo = '$residuo_classificado' ;");
$_residuo_classificado = pg_fetch_assoc($result);
$residuo_classificado=$_residuo_classificado['nome_residuo'];


$destino=$_POST['destino'];
$result = pg_query($d,"SELECT nome_destino FROM destino_saida where id_destino = '$destino' ;");
$_destino = pg_fetch_assoc($result);
$destino=$_destino['nome_destino'];
 
$empresa=$_POST['empresa'];
$result= pg_query($d,"SELECT nome_empresa FROM empresa where id_empresa = '$empresa' ;");
$_empresa = pg_fetch_assoc($result);
$empresa=$_empresa['nome_empresa'];
 

$data=$_POST['data'];
$peso=$_POST['peso'];


pg_query($d,"INSERT INTO relatorio_saida (residuo_classificado,destino,empresa,peso,data) VALUES ('$residuo_classificado','$destino', '$empresa','$peso','$data')");

echo "Seu cadastro foi realizado com sucesso!Agradecemos a atenção."; 

?>