
<?php

$area= $_POST["area"];

$tipo= $_POST["tipo"];

$subtipo= $_POST["subtipo"];

$destino= $_POST["destino"];

$peso= $_POST["peso"];

$id_municipio= $_POST["municipios"];

$data= $_POST["data"];

$conexao = mysql_connect('localhost', 'root');

if (!$conexao) 
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
mysql_select_db("georesprojeto",$conexao);
mysql_query("INSERT INTO residuo (municipio_id, area, tipo,subtipo,destino,peso,data) VALUES ('$id_municipio','$area', '$tipo', '$subtipo','$destino','$peso',STR_TO_DATE('$data', '%d/%m/%Y'))");
mysql_close($conexao);
echo "Seu cadastro foi realizado com sucesso!Agradecemos a atenção."; 




?>