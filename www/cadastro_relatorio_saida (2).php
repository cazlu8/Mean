
<?php

$destinos= $_POST["destinos"];

$residuos= $_POST["residuos"];

$empresas= $_POST["empresas"];

$peso= $_POST["peso"];

$data= $_POST["data"];

$conexao = mysql_connect('localhost', 'root');

if (!$conexao) 
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
mysql_select_db("georesproject",$conexao);
mysql_query("INSERT INTO relatorio_saida (RESIDUO,DESTINO,PESO,EMPRESA,DATA) VALUES ('$residuos','$destinos', '$peso', '$empresas',STR_TO_DATE('$data', '%d/%m/%Y'))");
mysql_close($conexao);
print"cadastro feito com sucesso!";
print"</br>";
print "<a href=principal.html>voltar</a>"






?>