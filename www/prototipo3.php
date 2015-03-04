<?php
    $connection = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Amures</title>
    <meta charset="UTF8">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="shortcut icon" href="favicon.ico" />
<script type="text/javascript" src="js/jquery.ajax.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.1.9.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/jquery-1.8.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/script.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#myModal').modal('hide');
$('a[name=deletar]').click(function(e) {
        e.preventDefault();
        
        $('#mensagem').load('deleta_residuo.php?pr='+$('#id_residuos').val());

    
    });
$('a[name=deletar1]').click(function(e) {
        e.preventDefault();
        
        $('#mensagem2').load('deleta_residuo.php?pr='+$('#id_residuos1').val());
        
    
});

$("#filtro").click(function(e) {
        e.preventDefault();
        
       $.post("filtra_entrada.php",{},
        function(valor){
        $("#tfhover").html(valor);

        })
        
    
    });


});

function delrege(vRg){
var id = vRg ;
document.getElementById('id_residuos1').value = id;
} 


function delreg(vRg){
var id = vRg ;
document.getElementById('id_residuos').value = id;
}    


</script>

</head>
<body>
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:450px; background:#e4e7d0;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/fechar.jpg" alt="Fechar" /></button>
        </div>

        <div class="modal-body">
            <div id="fale-conosco">
                <div class="esp-fale-conosco" style="height:400px;">
                    <h1>ENVIAR MENSAGEM</h1>
                    <form method="post" action="" id="">
                        <label>Nome*</label>
                        <input name="nome" type="text" id="nome" />

                        <label>E-mail*</label>
                        <input name="email" type="text" id="email" />

                        <label>Mensagem*</label>
                        <textarea name="mensagem" cols="" rows="" style="margin-bottom:30px;"></textarea>
                        <div class="clear"></div>
                        <button type="submit" name="enviar" value="Enviar"><img src="img/enviar.jpg" alt="Enviar" /></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="traco" class="navbar-inner"></div>
    <div id="animacao" class="navbar-inner"></div>
    <div id="conteudo" class="navbar-inner">
        <div class="container clearfix">
            <ul>
                <li><a href="http://www.amures.org.br/"><img src="img/amures.jpg" alt="Amures"></a></li>
                <li><a href="index.html"><p>INÍCIO</p></a></li>
                <li><a href="#"><p>PROJETO</p></a></li>
                <li><a href="#"><p class="noticias">NOTÍCIAS</p></a></li>
                <li><a href="#"><p class="noticias">RELATÓRIO</p></a></li>
                <li><a href="#"><p class="noticias">CADASTROS</p></a></li>
                <li><a href="#myModal" data-toggle="modal"><p>CONTATO</p></a></li>
            </ul>
        </div>

        <div class="container">
            <h1>Relatorio de entrada</h1>
<br/>
<br/>
<br/>
            <form action="" method="post" id="relatorio_entrada">

 <label for="calendario3">Inicio:</label> <input type="text" name="calendario3" id="calendario3">
  <label for="calendario4">Fim:</label> <input type="text" name="calendario4" id="calendario4">


<select name="setor" class="mainselection">
                    <option value="0">Escolher setor</option>
                    <option value="0">Todos</option>
                    <?php
                        $result = pg_query($connection, "SELECT * FROM setor");
                        while($line = pg_fetch_assoc($result))
                        {
                            echo "<option value=\"$line[id_setor]\">$line[nome_setor]</option>";
                        }
                    ?>
                </select>
                     <select name="municipio" class="mainselection">
                    <option value="0">Aguardando setor...</option>
                    <option value="0">Todos</option>
                </select>
            
                <select name="coleta" class="mainselection">
                    <option value="0">Escolher coleta</option>
                    <option value="0">Todas</option>
                    <?php
                        $result = pg_query($connection, "SELECT * FROM coleta");
                        while($line = pg_fetch_assoc($result))
                        {
                            echo "<option value=\"$line[id_coleta]\">$line[tipo_coleta]</option>";
                        }
                    ?>
                </select>
                <select name="residuo_entrada" class="mainselection">
                    <option value="0">Aguardando coleta...</option>
                    <option value="0">Todas</option>
                </select>


<input type="submit" class="btn btn-primary" value="Filtrar" id="filtro">


  </form>
<?php 


 ?>
<br/>
<br/>
<br/>

        <?php

 $result = pg_query($connection, "SELECT r.id_residuo,TO_CHAR(r.data, 'DD/MM/YYYY') as data,s.nome_setor,m.nome_municipio,r.origem_coleta,
    r.tipo_residuo,r.placa_caminhao,r.peso_residuo from residuo as r inner join setor as
  s on s.id_setor=r.id_setor inner join municipio as m on m.id_municipio=r.id_municipio order by r.id_residuo");
  
if(pg_num_rows($result)>0)
{     
     echo "<table width=1000 id='tfhover' class='tftable' border='1'>";//start table
 
        //creating our table heading
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
     
        while ($info = pg_fetch_array($result))
              {
           echo "<tr>";
                echo "<td>$info[nome_setor]</td>";
                echo "<td>$info[nome_municipio]</td>";
                echo "<td>$info[origem_coleta]</td>";
                 echo "<td>$info[tipo_residuo]</td>";
                echo "<td>$info[placa_caminhao]</td>";
                echo "<td>$info[peso_residuo] KG</td>";
                 echo "<td width=100>$info[data]</td>";
                echo "<td style='text-align:center;'>";
                   
             echo "<input name='id_residuos' type='hidden' value='0' id='id_residuos'>";
 
            echo "<a class='btn btn-primary' href='#' name='deletar' onClick='delreg($info[id_residuo]);'>Deletar</a></td>";
               echo"<div id='mensagem'></div>";
                echo"<div id='mensagem1'></div>";
                echo "</td>";
            echo "</tr>";
            }
      print "</table>";
 }
?>


               
          
        </div>
        
        <div id="rodape" class="navbar-inner">
            <div class="container">
                <h2>CONTATO</h2>
                <span></span>
                <p> Lorem Ipsum é simplesmente  <br />simulação de texto da indústria<br /> tipográfica e de impressos</p>
                <div class="clear"></div>
                <a href="#myModal" data-toggle="modal"> <img class="email" src="img/email.jpg" alt="Email" /></a>
                <a href="http://www.orbicomunicacao.com.br/" target="_blank"><img class="logo" src="img/orbi.jpg" alt="Orbi" /></a>
           
            </div>
        </div>
        <div id="traco-fim" class="navbar-inner"></div>
    </div>
</body>
</html>