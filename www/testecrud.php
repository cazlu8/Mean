<?php

echo " <link rel='stylesheet' type='text/css' href='css/table.css'>";

$connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
 

$result = pg_query($connection, "SELECT TO_CHAR(r.data, 'DD-MM-YYYY') as data,s.nome_setor,m.nome_municipio,r.origem_coleta,
    r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
  s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio ");

 

 
if(pg_num_rows($result)>0) { 
    echo "<table id='tfhover' class='tftable' border='1'>";//start table
 
        //creating our table heading
        echo "<tr>";
            echo "<th>  Setor  </th>";
            echo "<th>  Municipio  </th>";
            echo "<th>  Coleta   </th>";
              echo "<th>  Residuo  </th>";
            echo "<th>  Caminhao   </th>";
            echo "<th>  Peso  </th>";
               echo "<th width=100>  Data</th>";
            echo "<th style='text-align:center;'>Action</th>";
        echo "</tr>";
 
        
        while ($info = pg_fetch_array($result)){
           
            
          
            echo "<tr>";
                echo "<td>$info[nome_setor]</td>";
                echo "<td>$info[nome_municipio]</td>";
                echo "<td>$info[origem_coleta]</td>";
                 echo "<td>$info[tipo_residuo]</td>";
                echo "<td>$info[placa_caminhao]</td>";
                echo "<td>$info[peso_residuo]</td>";
                 echo "<td width=100>$info[data]</td>";
                echo "<td style='text-align:center;'>";
                    
              
 
                    echo "<div class='deleteBtn customBtn'>Delete</div>";
                echo "</td>";
            echo "</tr>";
        }
 
    echo "</table>";
 
}
 
// tell the user if no records found
else{
    echo "<div class='noneFound'>No records found.</div>";
}
 
?>