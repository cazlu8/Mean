
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro saida</title>
</head>
<body>
<form method="post" action="cadastro_relatorio_saida.php">
<fieldset>
<label> Data (DD/MM/AAAA): <input type="text" name="data" />
 </label> 
</fieldset>
<fieldset>
<label> Destino:
 </label> 
 <?

$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesproject",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from destino;") or die("Note: " . mysql_error());

?>
<select name="destinos" size=1>
<?
while($ri = mysql_fetch_array($res))
{
echo "<option value=" .$ri['NOME'] . ">" . $ri['NOME'] . "</option>";
}
echo "</select> "

?>
</fieldset>
<fieldset>
<label> Empresa:
 </label> 
 <?

$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesproject",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from empresa;") or die("Note: " . mysql_error());

?>
<select name="empresas" size=1>
<?
while($ri = mysql_fetch_array($res))
{
echo "<option value=" .$ri['NOME'] . ">" . $ri['NOME'] . "</option>";
}
echo "</select> "

?>
</fieldset>
<fieldset>
<label> Residuo classificado:
 </label> 
 <?

$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesproject",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from residuo;") or die("Note: " . mysql_error());

?>
<select name="residuos" size=1>
<?
while($ri = mysql_fetch_array($res))
{
echo "<option value=" .$ri['NOME'] . ">" . $ri['NOME'] . "</option>";
}
echo "</select> "

?>
</fieldset>
<fieldset>
<label> Peso (KG): <input type="text" name="peso" />
 </label> 
</fieldset>
<input id ="cadastrar" name = "cadastrar" type="submit" value="Cadastrar" />
</form>
</br>
<a href="principal.html">Menu Principal</a>
</body>
</html>

