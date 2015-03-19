<?php
$d= pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$coleta = $_POST['coleta'];

if ($coleta==9) {
 echo  '<option value="10">'.htmlentities('entraga voluntaria').'</option>';
}
else
{
  $result = pg_query($d,"SELECT * FROM placa_caminhao");
  echo  '<option value="0">'.htmlentities('Aguardando coleta...').'</option>';

          while($ln = pg_fetch_assoc($result)){

      echo '<option value="'.$ln['id_placa'].'">'.$ln['placa'].'</option>';

   

}
}



 

 

?>