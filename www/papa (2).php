<html>
<title>pa </title>
<body>
<?
// Load field datas into List box
$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
echo "Conn ok<br>";
$res=mysql_select_db("georesprojeto",$cn) or die("Note: " . mysql_error());
echo " Database opened<br>";

$res=mysql_query("select * from municipio;") or die("Note: " . mysql_error());
echo " qry executed<br>";
?>
<select name="pno" size=1>
<?
while($ri = mysql_fetch_array($res))
{
echo "<option value=" .$ri['id'] . ">" . $ri['nome'] . "</option>";
}
echo "</select> "
?>
</body>
</html>