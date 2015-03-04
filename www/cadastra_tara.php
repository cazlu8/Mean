<?php
$d= pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$id=$_POST['placas_vazias'];
$tara=$_POST['tara'];

$result = pg_query($d,"UPDATE residuo
   SET tara='$tara'
 WHERE id_residuo='$id';");
?>