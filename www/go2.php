<?php
$d= pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
$municipio = $_POST['municipio'];
$result = pg_query($d,"SELECT * FROM rota WHERE id_municipio = '$municipio';");
if(pg_num_rows($result) == 0){

   echo  '<option value="0">'.htmlentities('Aguardando coleta...').'</option>';

}
else
{
   echo '<option value="">Selecione a rota...</option>';

   while($ln = pg_fetch_assoc($result)){

      echo '<option value="'.$ln['id_rota'].'">'.$ln['nome_rota'].'</option>';

   }

}

 

?>
