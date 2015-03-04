<?php




$host = "localhost";
$db   = "georesprojeto";
$user = "root";
$pass = "";
$con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db($db, $con);

$query = sprintf("SELECT * FROM residuo ");

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
	
	if($total > 0) {
		
		do {
?>          
			<p><?=$linha['area']?> / <?=$linha['tipo']?></p>
			<p><?=$linha['subtipo']?> / <?=$linha['destino']?></p>
			<p><?=$linha['peso']?> / <?=$linha['data']?>/ <?=$linha['municipio_id']?></p>

<?php
		
		}while($linha = mysql_fetch_assoc($dados));

	}
?>
</body>
</html>