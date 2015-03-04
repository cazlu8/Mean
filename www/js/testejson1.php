<?php
$d= pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$residuo =2

$result = pg_query($d,"SELECT * FROM residuo WHERE id_residuo = '$residuo';");
echo json_encode(pg_fetch_assoc($result)); 