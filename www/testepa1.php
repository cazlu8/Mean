<?php
$connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");

 $result = pg_query($connection, "SELECT s.nome_setor,m.nome_municipio,r.origem_coleta,r.tipo_residuo,r.placa_caminhao,r.peso_residuo,r.data from residuo as r inner join setor as s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio ");
  
if(pg_num_rows($result)>0)
{     
    print "<table width=1000 border=1px>" ;
      print " <tr>";
      print " <td width=100 height=40>Setor</td>";
     print "<td width=100>Municipio</td>";
     print "<td width=100>Coleta</td>";
      print "<td width=100 height=40>Residuo</td>";
     print "<td width=100>Caminhao</td>";
     print "<td width=100>Peso</td>";
     print "<td width=100>Data</td>";
     
     print "</tr>";
     
        while ($info = pg_fetch_array($result))
              {
         print "<tr><td>$info[nome_setor]</td> ";
          print "<td>$info[nome_municipio]</td> ";
           print "<td>$info[origem_coleta]</td> ";
            print "<td>$info[tipo_residuo]</td> ";
             print "<td>$info[placa_caminhao]</td> ";
              print "<td>$info[peso_residuo]</td>"; 
              print "<td>$info[data]</td>";
               print "</tr>";
            }
      print "</table>";
 }
?>