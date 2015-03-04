
<?php

$nome= $_POST["nome"];

$cnpj= $_POST["cnpj"];



$conexao = mysql_connect('localhost', 'root');

if (!$conexao) 
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
mysql_select_db("georesprojeto",$conexao);
mysql_query("INSERT INTO empresa (nome,cnpj) VALUES ('$nome','$cnpj')");
mysql_close($conexao);
echo "Seu cadastro foi realizado com sucesso!Agradecemos a atenção."; 




?>