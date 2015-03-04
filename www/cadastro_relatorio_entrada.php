
<?php

$municipios= $_POST["municipios"];

$setores= $_POST["setores"];

$rotas= $_POST["rotas"];

$residuos= $_POST["residuos"];

$coletas= $_POST["coletas"];

$caminhoes= $_POST["caminhoes"];

$peso= $_POST["peso"];

$data= $_POST["data"];

$conexao = mysql_connect('localhost', 'root');

if (!$conexao) 
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
mysql_select_db("georesproject",$conexao);
mysql_query("INSERT INTO relatorio_entrada (MUNICIPIO,CAMINHAO,RESIDUO,SETOR,ROTA,COLETA,PESO,DATA) VALUES ('$municipios','$caminhoes', '$residuos', '$setores','$rotas','$coletas','$peso',STR_TO_DATE('$data', '%d/%m/%Y'))");
mysql_close($conexao);

print"cadastro feito com sucesso!";
print"</br>";
print "<a href=principal.html>voltar</a>"



?>