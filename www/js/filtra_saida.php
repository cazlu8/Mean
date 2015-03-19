<?php
$connection = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$result = pg_query($connection, "SELECT d.id_destinacao, d.residuo_classificado, d.peso,
TO_CHAR(d.data, 'DD/MM/YYYY') as data, d.tipo_destino,
e.nome_empresa FROM destinacao as d
inner join empresa as e on e.id_empresa = d.id_empresa");
$residuo=$_POST['residuo'];
$empresa=$_POST['empresa'];
$destino=$_POST['destino'];
$inicio=$_POST['inicio'];
$fim=$_POST['fim'];
if ($residuo != 0 ) {
$residuo=pg_query($connection,'SELECT tipo_residuo from residuo_classificado where id_residuo_classificado = $residuo');
$line = pg_fetch_assoc($residuo);
$residuo=$line['tipo_residuo'];

}
if ($empresa != 0) {
$empresa=pg_query($connection,'SELECT nome_empresa from empresa where id_empresa = $empresa');
$line = pg_fetch_assoc($empresa);
$empresa=$line['nome_empresa'];
}
if ($destino != 0) {
$destino=pg_query($connection,'SELECT tipo_destino from destino where id_destino = $destino');
$line = pg_fetch_assoc($destino);
$destino=$line['tipo_destino'];
}
if ($empresa==0 && $destino==0 && $residuo==0 && $inicio == '' && $fim=='') {
$result = pg_query($connection, "SELECT d.id_destinacao, d.residuo_classificado, d.peso,
TO_CHAR(d.data, 'DD/MM/YYYY') as data, d.tipo_destino,
e.nome_empresa FROM destinacao as d
inner join empresa as e on e.id_empresa = d.id_empresa"); 
} else if ($empresa!=0 && $destino==0 && $residuo==0 && $inicio == '' && $fim=='') {
$result = pg_query($connection, "SELECT d.id_destinacao, d.residuo_classificado, d.peso,
TO_CHAR(d.data, 'DD/MM/YYYY') as data, d.tipo_destino,
e.nome_empresa FROM destinacao as d
inner join empresa as e on e.id_empresa = d.id_empresa where e.nome_empresa = '$empresa'");

}else if ($empresa!=0 && $destino!=0 && $residuo==0 && $inicio == '' && $fim=='') {
$result = pg_query($connection, "SELECT d.id_destinacao, d.residuo_classificado, d.peso,
TO_CHAR(d.data, 'DD/MM/YYYY') as data, d.tipo_destino,
e.nome_empresa FROM destinacao as d
inner join empresa as e on e.id_empresa = d.id_empresa where e.nome_empresa= '$empresa' and d.tipo_destino = '$destino'");

}else if ($empresa!=0 && $destino!=0 && $residuo!=0 && $inicio == '' && $fim=='') {
$result = pg_query($connection, "SELECT d.id_destinacao, d.residuo_classificado, d.peso,
TO_CHAR(d.data, 'DD/MM/YYYY') as data, d.tipo_destino,
e.nome_empresa FROM destinacao as d
inner join empresa as e on e.id_empresa = d.id_empresa where e.nome_empresa= '$empresa' and d.tipo_destino = '$destino' 
and d.residuo_classificado = '$residuo'");

} else if ($empresa!=0 && $destino!=0 && $residuo!=0 && $inicio != '' && $fim=='') {
$result = pg_query($connection, "SELECT d.id_destinacao, d.residuo_classificado, d.peso,
TO_CHAR(d.data, 'DD/MM/YYYY') as data, d.tipo_destino,
e.nome_empresa FROM destinacao as d
inner join empresa as e on e.id_empresa = d.id_empresa  where e.nome_empresa= '$empresa' and d.tipo_destino = '$destino' 
and d.residuo_classificado = '$residuo' and data >= '$inicio' " );

}else if ($empresa!=0 && $destino!=0 && $residuo!=0 && $inicio != '' && $fim!='') {
$result = pg_query($connection, "SELECT d.id_destinacao, d.residuo_classificado, d.peso,
TO_CHAR(d.data, 'DD/MM/YYYY') as data, d.tipo_destino,
e.nome_empresa FROM destinacao as d
inner join empresa as e on e.id_empresa = d.id_empresa  
where e.nome_empresa= '$empresa' and d.tipo_destino = '$destino' 
and d.residuo_classificado = '$residuo' data between '$inicio' and '$fim'");

}else if ($empresa==0 && $destino==0 && $residuo==0 && $inicio == '' && $fim=='') {
$result = pg_query($connection, "SELECT d.id_destinacao, d.residuo_classificado, d.peso,
TO_CHAR(d.data, 'DD/MM/YYYY') as data, d.tipo_destino,
e.nome_empresa FROM destinacao as d
inner join empresa as e on e.id_empresa = d.id_empresa");

}

if(pg_num_rows($result) == 0){
}
else
{
echo "<tr>";
  echo "<th>  Setor  </th>";
  echo "<th>  Municipio  </th>";
  echo "<th>  Coleta   </th>";
  echo "<th>  Residuo  </th>";
  echo "<th>  Caminhao   </th>";
  echo "<th>  Peso  </th>";
  echo "<th >  Data</th>";
  echo "<th style='text-align:center;'>Action</th>";
echo "</tr>";
while($info = pg_fetch_assoc($result)){
echo "<tr>";
  echo "<td>$info[nome_setor]</td>";
  echo "<td>$info[nome_municipio]</td>";
  echo "<td>$info[origem_coleta]</td>";
  echo "<td>$info[tipo_residuo]</td>";
  echo "<td>$info[placa_caminhao]</td>";
  echo "<td>$info[peso_residuo] KG</td>";
  echo "<td width=100>$info[data]</td>";
  echo "<td style='text-align:center;'>";
    echo "<input name='id_residuos1' type='hidden' value='0' id='id_residuos1'>";
    echo "<a class='btn btn-primary' href='#' name='deletar1' onClick='delrege($info[id_residuo]);'>Deletar</a></td>";
    echo"<div id='mensagem2'></div>";
    echo"<div id='mensagem3'></div>";
  echo "</td>";
echo "</tr>";
}
}
?>