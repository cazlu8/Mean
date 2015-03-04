
<!DOCTYPE html>
<html>
<head>
	<title>pa</title>
</head>
<body>
<form method="post" action="cadastro_relatorio_entrada.php">
<fieldset>
<label> Data: <input type="text" name="data" />
 </label> 
</fieldset>
<fieldset>
<label> Municipio:
 </label> 
 <?

$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesproject",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from municipio;") or die("Note: " . mysql_error());

?>
<select name="municipios" size=1>
<?
while($ri = mysql_fetch_array($res))
{
echo "<option value=" .$ri['NOME'] . ">" . $ri['NOME'] . "</option>";
}
echo "</select> "

?>
</fieldset>
<fieldset>
<label> Setor:
 </label> 
 <?

$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesproject",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from setor;") or die("Note: " . mysql_error());

?>
<select name="setores" size=1>
<?
while($ri = mysql_fetch_array($res))
{
echo "<option value=" .$ri['NOME'] . ">" . $ri['NOME'] . "</option>";
}
echo "</select> "

?>
</fieldset>
<fieldset>
<label> Rota:
 </label> 
 <?

$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesproject",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from rota;") or die("Note: " . mysql_error());

?>
<select name="rotas" size=1>
<?
while($ri = mysql_fetch_array($res))
{
echo "<option value=" .$ri['NOME'] . ">" . $ri['NOME'] . "</option>";
}
echo "</select> "

?>
</fieldset>
<fieldset>
<label> Coleta:
 </label> 
 <?

$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesproject",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from coleta;") or die("Note: " . mysql_error());

?>
<select name="coletas" size=1>
<?
while($ri = mysql_fetch_array($res))
{
echo "<option value=" .$ri['NOME'] . ">" . $ri['NOME'] . "</option>";
}
echo "</select> "

?>
</fieldset>
<fieldset>
<label> Residuo:
 </label> 
 <?

$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesproject",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from Residuo;") or die("Note: " . mysql_error());

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
<label> Caminhao:
 </label> 
 <?

$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesproject",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from caminhao;") or die("Note: " . mysql_error());

?>
<select name="caminhoes" size=1>
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
</body>
</html>

