
<?php



$data= $_POST["data"];



$conexao = mysql_connect('localhost', 'root');

if (!$conexao) 
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
$res=mysql_select_db("georesproject",$conexao);
$res=mysql_query("SELECT * from relatorio_entrada where data=STR_TO_DATE('$data', '%d/%m/%Y');")or die("Note: " . mysql_error());


  
if(mysql_num_rows($res)>0)
{
      print "<table width=1000 border=1px>" ;
      print " <tr>";
      print " <td width=100 height=40>municipio</td>";
     print "<td width=100>setor</td>";
     print "<td width=100>rota</td>";
      print "<td width=100 height=40>peso</td>";
     print "<td width=100>residuo</td>";
     print "<td width=100>caminhao</td>";
     print "<td width=100>coleta</td>";
     print "<td width=100>data</td>";
     print "</tr>";
          while ($info = mysql_fetch_array($res))
              {
         print "<tr><td>$info[MUNICIPIO]</td> ";
          print "<td>$info[SETOR]</td> ";
           print "<td>$info[ROTA]</td> ";
            print "<td>$info[PESO]</td> ";
             print "<td>$info[RESIDUO]</td> ";
              print "<td>$info[CAMINHAO]</td>"; 
              print "<td>$info[COLETA]</td>";
               print "<td>$info[DATA]</td></tr>";
       }
      print "</table>";
       print "</br><a href=mostra_dados.php>voltar</a>";
}
mysql_close($conexao);
?>