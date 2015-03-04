<?php
$d= pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$residuo_classificado = $_POST['residuo_classificado'];
$result = pg_query($d,"SELECT * FROM destino_saida WHERE id_residuo = '$residuo_classificado';");
if(pg_num_rows($result) == 0){

   echo  '<option value="0">'.htmlentities('Aguardando residuo classificado...').'</option>';

}
else
{
  

   while($ln = pg_fetch_assoc($result)){

      echo '<option value="'.$ln['id_destino'].'">'.$ln['nome_destino'].'</option>';

   }

}

 

?>
