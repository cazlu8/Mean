<?php

$setor=$_POST['municipio'];


         $d = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");


        $result=pg_query($d, "SELECT nome_municipio FROM municipio where id_municipio='$setor';");

  while($ln = pg_fetch_assoc($result)){

            echo $ln['nome_municipio'];

         }

?>