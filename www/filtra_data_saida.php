
<?php



$data= $_POST["data"];



$conexao = mysql_connect('localhost', 'root');

if (!$conexao) 
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
$res=mysql_select_db("georesproject",$conexao);
$res=mysql_query("SELECT * from relatorio_saida where data=STR_TO_DATE('$data', '%d/%m/%Y');")or die("Note: " . mysql_error());


  
if(mysql_num_rows($res)>0)
{
      print "<table width=1000 border=1px>" ;
      print " <tr>";
      print " <td width=100 height=40>residuo</td>";
     print "<td width=100>destino</td>";
     print "<td width=100>peso</td>";
      print "<td width=100 height=40>empresa</td>";
         print "<td width=100 height=40>data</td>";
    
     print "</tr>";
          while ($info = mysql_fetch_array($res))
              {
         print "<tr><td>$info[RESIDUO]</td> ";
          print "<td>$info[DESTINO]</td> ";
           print "<td>$info[PESO]</td> ";
            print "<td>$info[EMPRESA]</td> ";
               print "<td>$info[DATA]</td></tr>";
       }
      print "</table>";
        print "</br><a href=mostra_dados_saida.php>voltar</a>";
 }
mysql_close($conexao);
?>