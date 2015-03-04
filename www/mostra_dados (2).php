<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesproject",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from relatorio_entrada;") or die("Note: " . mysql_error());


  
if(mysql_num_rows($res)>0)
{
      print "<table width=1000 border=1px>" ;
      print " <tr>";
      print " <td width=100 height=40>municipio</td>";
     print "<td width=100>setor</td>";
     print "<td width=100>rota</td>";
      print "<td width=100 height=40>peso</td>";
     print "<td width=100>residuo</td>";
     print "<td width=100>caminhao</td>";
     print "<td width=100>coleta</td>";
     print "<td width=100>data</td>";
     print "</tr>";
          while ($info = mysql_fetch_array($res))
              {
         print "<tr><td>$info[MUNICIPIO]</td> ";
          print "<td>$info[SETOR]</td> ";
           print "<td>$info[ROTA]</td> ";
            print "<td>$info[PESO]</td> ";
             print "<td>$info[RESIDUO]</td> ";
              print "<td>$info[CAMINHAO]</td>"; 
              print "<td>$info[COLETA]</td>";
               print "<td>$info[DATA]</td></tr>";
       }
      print "</table>";
 }
?>
<h1>filtra por data (DD/MM/AAAA):</h1>
<form method="post" action="filtra_data.php">
<fieldset>
<label> Data: <input type="text" name="data" />
 </label> 
</fieldset>
<input id ="filtrardata" name = "Filtrardata" type="submit" value="Filtrar" />
</form>

<h1>filtra por residuo:</h1>
<form method="post" action="filtra_residuo.php">
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
<input id ="filtrarresiduo" name = "Filtrarresuduo" type="submit" value="Filtrar" />
</form>
<h1>filtra por municipio:</h1>
<form method="post" action="filtra_municipio.php">
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
<input id ="filtrarmunicipio" name = "Filtrarmunicipio" type="submit" value="Filtrar" />
</form>
</br>
<a href="principal.html">Menu Principal</a>

</body>
</html>

