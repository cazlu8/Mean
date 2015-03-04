<?php
$d= pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$coleta =1;

$result = pg_query($d,"SELECT * FROM residuo_entrada WHERE id_coleta = '$coleta';");
echo json_encode(pg_fetch_assoc($result));