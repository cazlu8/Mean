<html> 
<head> 
<title>Formulario</title> 
</head> 
<body>
 <h1>Cadastro de Residuos</h1> 
 <form action = "cadastroDeResiduos.php" method="post">
<fieldset> 
 	<legend>Area:</legend> 
 	<label> Urbana<input type="radio" name="area" value="urbana" />

Rural <input type="radio" name="area" value="rural" /> 
</label> 
</fieldset> 
<fieldset> 
 	<legend>Tipo:</legend> 
 	<label> Reciclavel<input type="radio" name="tipo" value="reciclavel" />
Organico <input type="radio" name="tipo" value="organico" /> 
Rejeito <input type="radio" name="tipo" value="rejeito" /> 
</label> 
</fieldset> 
<fieldset> 
 	<legend>SubTipo:</legend> 
 	<label> Papel<input type="radio" name="subtipo" value="papel" />
Plastico <input type="radio" name="subtipo" value="plastico" /> 
Vidro<input type="radio" name="subtipo" value="vidro" /> 
</label> 
</fieldset> 
<fieldset>
<label> Destino: <input type="text" name="destino" />
 </label> 
</fieldset>
<fieldset>
<label> Peso: <input type="text" name="peso" />
 </label> 
 </fieldset>
 <fieldset>
<label> Data: <input type="text" name="data" id = "campoData" />
</label>
<script>

jQuery(function($){

       $("#campoData").mask("99/99/9999");
});
</script>

</fieldset>
<fieldset>
<label> Municipio:
 </label> 
 <?

$cn=mysql_connect("localhost",'root') or die("Note: " . mysql_error());
$res=mysql_select_db("georesprojeto",$cn) or die("Note: " . mysql_error());
$res=mysql_query("select * from municipio;") or die("Note: " . mysql_error());

?>
<select name="municipios" size=1>
<?
while($ri = mysql_fetch_array($res))
{
echo "<option value=" .$ri['id'] . ">" . $ri['nome'] . "</option>";
}
echo "</select> "

?>
</fieldset>
<input id ="cadastrar" name = "cadastrar" type="submit" value="Cadastrar" />
 	</form>


</body> 
</html>
