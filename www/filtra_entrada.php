<?php
$connection = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$setor=$_POST['setor'];
$municipio=$_POST['municipio'];
$coleta=$_POST['coleta'];
$residuo=$_POST['residuo'];
$inicio=$_POST['inicio'];
$fim=$_POST['fim'];

if ($setor != 0) {
$nome_setor=pg_query($connection,"SELECT nome_setor from setor where id_setor='$setor'");
$line = pg_fetch_assoc($nome_setor);
$nome_setor= $line['nome_setor'];
$nome_municipio =pg_query($connection,"SELECT nome_municipio from municipio where id_municipio='$municipio'");
$line = pg_fetch_assoc($nome_municipio);
$nome_municipio= $line['nome_municipio'];
}
if ($coleta != 0) {
$nome_coleta=pg_query($connection,"SELECT tipo_coleta from coleta where id_coleta='$coleta'");
$nome_residuo = pg_query($connection,"SELECT tipo_residuo from residuo_entrada where id_residuo='$residuo'");
}



if ($setor ==0 && $coleta ==0 && $municipio == 0 && $residuo == 0 && $inicio == '' && $fim=='10/10/2016') {
$result=pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,
s.nome_setor,m.nome_municipio,r.origem_coleta,
r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio order by r.id_residuo");

}

if ($setor == 0 && $coleta ==0 && $municipio == 0 && $residuo == 0 && $inicio != '' && $fim !='') {
$result=pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,
s.nome_setor,m.nome_municipio,r.origem_coleta,
r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio
where data >= '$inicio' and data <= '$fim' order by r.id_residuo");

}

if($setor !=0 && $coleta !=0 && $inicio !='' && $fim != ''){
$result=pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,
s.nome_setor,m.nome_municipio,r.origem_coleta,
r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio
where s.nome_setor = '$nome_setor' and m.nome_municipio = '$nome_municipio'
 and r.origem_coleta = '$nome_coleta' and r.tipo_residuo = '$nome_residuo' 
 and data >= '$inicio' and data <= '$fim' order by r.id_residuo");

}

if ($setor == 0 && $coleta != 0 && $inicio != '' && $fim != '') {
  $result=pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,
s.nome_setor,m.nome_municipio,r.origem_coleta,
r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio
where r.origem_coleta = '$nome_coleta' and r.tipo_residuo = '$nome_residuo' 
 and data >= '$inicio'  and data <= '$fim' order by r.id_residuo");

}

if ($setor != 0 && $coleta != 0 && $inicio == '' && $fim == '10/10/2016') {
  $result=pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,
s.nome_setor,m.nome_municipio,r.origem_coleta,
r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio
where s.nome_setor = '$nome_setor' and m.nome_municipio = '$nome_municipio'
and r.origem_coleta = '$nome_coleta' and r.tipo_residuo = '$nome_residuo' order by r.id_residuo");

}

if ($setor != 0 && $coleta != 0 && $inicio != '' && $fim == '10/10/2016') {
  $result=pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,
s.nome_setor,m.nome_municipio,r.origem_coleta,
r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio
where s.nome_setor = '$nome_setor' and m.nome_municipio = '$nome_municipio'
and r.origem_coleta = '$nome_coleta' and r.tipo_residuo = '$nome_residuo' 
and data >= '$inicio' order by r.id_residuo");

}

if ($setor == 0 && $coleta == 0 && $inicio != '' &&  $fim == '10/10/2016') {
$result=pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,
s.nome_setor,m.nome_municipio,r.origem_coleta,
r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio
where data >= '$inicio' order by r.id_residuo");
}

if ($setor == 0 && $coleta == 0 && $inicio == '' &&  $fim != '') {
$result=pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,
s.nome_setor,m.nome_municipio,r.origem_coleta,
r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio order by r.id_residuo");
}
if ($setor != 0 && $residuo == 0 && $municipio!=0 && $coleta == 0 && $inicio != '' &&  $fim == '10/10/2016') {
$result=pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,
s.nome_setor,m.nome_municipio,r.origem_coleta,
r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio
where s.nome_setor = '$nome_setor' and m.nome_municipio = '$nome_municipio'
and data >= '$inicio' order by r.id_residuo");
}

if(pg_num_rows($result) == 0){
  echo "<h1> Nemnhum registro com esses dados!</h1>";

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