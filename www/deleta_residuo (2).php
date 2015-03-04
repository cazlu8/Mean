<?php  

$connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
$id=$_REQUEST['pr'];


pg_query($connection,"DELETE FROM residuo WHERE id_residuo = '$id'");



?>





