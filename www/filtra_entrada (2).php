

<?php  

$connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");

$result=pg_query($connection,"SELECT r.id_residuo,TO_CHAR(r.data, 'DD-MM-YYYY') as data,s.nome_setor,m.nome_municipio,r.origem_coleta,
    r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
  s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio where r.id_residuo =32 order by r.id_residuo");



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





