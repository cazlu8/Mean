<!doctype html>
<html>
  <head>
    <title>Cadastro de Entrada</title>
    <script type="text/javascript" src="jquery.js"></script>
    <meta charset="UTF8">
        <link href="style.css" rel="stylesheet" />
  </head>
  <body>
<form action="cadastra_entrada.php" method="post" id="entrada">
 <fieldset>
<label> Data: <input type="text" name="data" />
 </label> 
 </fieldset>
<fieldset id="field">
  <select name="setor" id="mainselection">
    <option value="0">Escolher setor</option>
        <?php         
         $connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
        $result=pg_query($connection, "SELECT * FROM nome_setor;");
            while($line = pg_fetch_assoc($result)){

            echo '<option value="'.$line['id_setor'].'">'.$line['nome_setor'].'</option>';
             }
         ?>
  </select>
</fieldset>

  <fieldset id="field">
  <select name="municipio" id="mainselection">
    <option value="0" selected="selected">Aguardando setor...</option>
    </select>
     </fieldset>
     <fieldset id="field">
            <select name="rota" id="mainselection">
    <option value="0" selected="selected">Aguardando municipio...</option>
            </select>
     </fieldset>
<fieldset id="field">
  <select name="coleta" id="mainselection">
    <option value="0">Escolher coleta</option>
        <?php         
         $connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
        $result=pg_query($connection, "SELECT * FROM coleta;");
            while($line = pg_fetch_assoc($result)){

            echo '<option value="'.$line['id_coleta'].'">'.$line['tipo_coleta'].'</option>';
             }
         ?>
  </select>
</fieldset>
 <fieldset id="field">
  <select name="tipo_residuo" id="mainselection">
    <option value="0" selected="selected">Aguardando coleta...</option>
    </select>
     </fieldset>

<fieldset id="field">
  <select name="placa_caminhao" id="mainselection">
    <option value="0" selected="selected">Aguardando coleta...</option>
    </select>
     </fieldset>
 <fieldset>
<label> Peso (KG): <input type="text" name="peso" />
 </label> 
 </fieldset>
<script type="text/javascript" >
      $(document).ready(function(){
         $("select[name=setor]").change(function(){
             $("select[name=municipio]").html('<option>Carregando...</option>');
                $.post("Carrega_municipios.php",
                   {setor:$(this).val()},
                     function(valor){
                       $("select[name=municipio]").html(valor);
            } 
              )}
                )
           $("select[name=municipio]").change(function(){
             $("select[name=rota]").html('<option>Carregando...</option>');
                $.post("Carrega_rotas.php",
                   {municipio:$(this).val()},
                     function(valor){
                       $("select[name=rota]").html(valor);
            } 
              )}
                )
           $("select[name=coleta]").change(function(){
             $("select[name=tipo_residuo]").html('<option>Carregando...</option>');
                $.post("Carrega_residuo.php",
                   {coleta:$(this).val()},
                     function(valor){
                       $("select[name=tipo_residuo]").html(valor);
            } 
              )}
                )
            $("select[name=coleta]").change(function(){
             $("select[name=placa_caminhao]").html('<option>Carregando...</option>');
                $.post("Carrega_placa_caminhao.php",
                   {coleta:$(this).val()},
                     function(valor){
                       $("select[name=placa_caminhao]").html(valor);
            } 
              )}
                )

                   }
                   )

</script>

   <input type="submit" value="Cadastrar">

</form>

  
  </body>
</html>
