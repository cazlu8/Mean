<?php
$d= pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$residuo =$_POST['id'];

$result = pg_query($d,"SELECT r.id_residuo,r.peso_residuo,r.tipo_residuo,r.data,m.nome_motorista,c.nome_municipio
 FROM residuo as r inner join motorista as m on m.id_motorista=r.id_motorista 
 inner join municipio as c on c.id_municipio=r.id_municipio WHERE id_residuo = '$residuo';");
echo json_encode(pg_fetch_assoc($result)); 