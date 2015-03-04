<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript" src="jquery.js"></script>

<form method="POST" action="resposta2.php">
	<select name="passaValor" id="passaValor" onchange="getValor(this.value, 0)">
   <option value="0">Selecione algo</option>
   <option value="1">Primeiro Valor</option>
   <option value="2">Segundo Valor</option>
  <option value="3">Terceiro Valor</option>
</select>

<select name="recebeValor" id="recebeValor" >
    <option value="0">Selecione algo acima primeiro</option>
</select>
<script type="text/javascript">
   function getValor(valor){
     $("#recebeValor").html("<option value='0'>Carregando...</option>");
     setTimeout(function(){
          $("#recebeValor").load("resposta2.php",{id:valor})
   }, 2000)
};
</script>
</form>

</body>
</html>


