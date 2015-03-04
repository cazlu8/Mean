<html>
	<head>
	<title>Exemplo</title>
</head>
<body>
<fieldset>
<label> Dia: <input type="text" name="dia" />
 </label> 
</fieldset>
<fieldset>
<label> Mes: <input type="text" name="mes" />
 </label> 
</fieldset>
<fieldset>
<label> Ano: <input type="text" name="ano" />
 </label> 
</fieldset>
</body>
</html>
<?php

$host = "localhost";
$db   = "georesprojeto";
$user = "root";
$pass = "";
$con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db($db, $con);

$query = sprintf("SELECT * FROM residuo where data ='2014-03-10'");

$dados = mysql_query($query, $con) or die(mysql_error());

$linha = mysql_fetch_assoc($dados);

$total = mysql_num_rows($dados);
?>

<html>
	<head>
	<title>Exemplo</title>
</head>
<body>
<?php
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		
		do {
?>
			<p><?=$linha['area']?> / <?=$linha['tipo']?></p>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysql_fetch_assoc($dados));
	// fim do if 
	}
?>
</body>
</html>
