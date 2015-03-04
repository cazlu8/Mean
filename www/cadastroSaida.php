<!doctype html>
<html>
  <head>
    <title>Cadastro de saida</title>
   
    <meta charset="UTF8">
        <link href="style.css" rel="stylesheet" />
  </head>
  <body>
<form action="cadastro_saidaa.php" method="post" id="entrada">
 <fieldset>
<label> Data: <input type="text" name="data" />
 </label> 
 </fieldset>

<fieldset id="field">
  <select name="residuo_classificado" id="mainselection">
    <option value="0">Escolher residuo classificado</option>
        <?php         
         $connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
        $result=pg_query($connection, "SELECT * FROM residuo_classificado;");
            while($line = pg_fetch_assoc($result)){

            echo '<option value="'.$line['id_residuo'].'">'.$line['nome_residuo'].'</option>';
             }
         ?>
  </select>
</fieldset>
<fieldset id="field">
  <select name="destino" id="mainselection">
    <option value="0">Escolher destino</option>
        <?php         
         $connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
        $result=pg_query($connection, "SELECT * FROM destino_saida;");
            while($line = pg_fetch_assoc($result)){

            echo '<option value="'.$line['id_destino'].'">'.$line['nome_destino'].'</option>';
             }
         ?>
  </select>
</fieldset>
<fieldset id="field">
  <select name="empresa" id="mainselection">
    <option value="0">Escolher empresa</option>
        <?php         
         $connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
        $result=pg_query($connection, "SELECT * FROM empresa;");
            while($line = pg_fetch_assoc($result)){

            echo '<option value="'.$line['id_empresa'].'">'.$line['nome_empresa'].'</option>';
             }
         ?>
  </select>
</fieldset>

<fieldset>
<label> Peso (KG): <input type="text" name="peso" />
</label> 
</fieldset>

 


   <input type="submit" value="Cadastrar">

</form>

  
  </body>
</html>
