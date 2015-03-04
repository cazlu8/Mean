<?php
$d= pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$coleta = $_POST['coleta'];


$result = pg_query($d,"SELECT * FROM residuo_entrada WHERE id_coleta = '$coleta';");
if(pg_num_rows($result) == 0){

   echo  '<option value="0">'.htmlentities('Aguardando coleta...').'</option>';

}
else
{
   echo '<option value="">Selecione o tipo de residuo...</option>';

   while($ln = pg_fetch_assoc($result)){

      echo '<option value="'.$ln['id_residuo'].'">'.$ln['tipo_residuo'].'</option>';

   }

}

 

?>