<html> 
<head> 
<title>Formulario</title> 
<script src="js/jquery-1.2.6.pack.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput-1.1.4.pack.js" type="text/javascript" /></script>


<script type="text/javascript">$(document).ready(function(){	$("#cnpj").mask("99.999.999/9999-99");});</script>




</head> 
<body>

 <h1>Cadastro de Empresas</h1> 
 <form action = "cadastroDeEmpresas.php" method="post">

<fieldset>
<label> Nome: <input type="text" name="nome" />
 </label> 
</fieldset>
<fieldset>
<label> CPNJ: <input type="text" name="cnpj" id="cnpj"/> 
 </label>
 <script type="text/javascript">$(document).ready(function(){	
 $("#cnpj").mask("99.999.999/9999-99");});
 	</script> 
 </fieldset>

<input id ="cadastrar" name = "cadastrar" type="submit" value="Cadastrar" />
 	</form>


</body> 
</html>

