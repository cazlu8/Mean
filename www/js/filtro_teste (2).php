<?php  

$connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
$id=$_REQUEST['pr'];


pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,s.nome_setor,m.nome_municipio,r.origem_coleta,
    r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
  s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio where r.id_residuo =22 order by r.id_residuo");



echo 'Registro Excluido<script type="text/javascript"> location.reload(); </script>';
?>





