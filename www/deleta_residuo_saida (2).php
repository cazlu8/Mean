<?php  

$connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
$id=$_REQUEST['pr'];


pg_query($connection,"DELETE FROM destinacao WHERE id_destinacao = '$id'");



echo 'Registro Excluido<script type="text/javascript"> location.reload(); </script>';
?>





