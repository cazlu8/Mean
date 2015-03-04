<?php
$d= pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$setor = $_POST['setor'];
$result = pg_query($d,"SELECT * FROM municipio WHERE id_setor = '$setor';");
if(pg_num_rows($result) == 0){

   echo  '<option value="0">'.htmlentities('Aguardando setor...').'</option>';

}
else
{
   echo '<option value="">Selecione o municipio...</option>';

   while($ln = pg_fetch_assoc($result)){

      echo '<option value="'.$ln['id_municipio'].'">'.$ln['nome_municipio'].'</option>';

   }

}

 

?>
