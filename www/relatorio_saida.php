<?php
$connection = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Amures</title>
        <meta charset="UTF8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/table.css">
        <script src="js/jquery.js"></script>
        <script src="js/jquery.1.9.js"></script>
        <script src="js/bootstrap-modal.js"></script>
        <script src="js/jquery-1.8.2.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/script.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
        $('#myModal').modal('hide');
        $('a[name=deletar1]').click(function(e) {
        e.preventDefault();
        
        $('#mensagem').load('deleta_residuo_saida.php?pr='+$('#id_destinacao').val());
        
        
        });
        });
        function delreg(vRg){
        var id = vRg ;
        document.getElementById('id_destinacao').value = id;
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
                    <li><a href="#"><p class="noticias">RELATORIO</p></a></li>
                    <li><a href="#"><p class="noticias">CADASTROS</p></a></li>
                    <li><a href="#myModal" data-toggle="modal"><p>CONTATO</p></a></li>
                </ul>
            </div>
            <div class="container">
                <h1>Relatorio de Saida</h1>
                <br/>
                <br/>
                <br/>
                <form action="" method="post" id="entrada">
                    <label for="calendario3">Inicio:</label> <input type="text" name="calendario3" id="iniciofs">
                    <label for="calendario4">Fim:</label> <input type="text" name="calendario4" id="fimfs">
                    <label>Residuo Classificado:</label>
                    <select name="residuo_classificado" class="mainselection" id="residuofs">
                        <option value="0">Todos</option>
                        <?php
                        $result = pg_query($connection, "SELECT * FROM residuo_classificado");
                        while($line = pg_fetch_assoc($result))
                        {
                        echo "<option value=\"$line[id_residuo]\">$line[nome_residuo]</option>";
                        }
                        ?>
                    </select>
                    <label>Destino:</label>
                    <select name="destino" class="mainselection" id="destinofs" >
                         <option value="0">Todos</option>
                    </select>
                    <label>Empresa:</label>
                    <select name="empresa" class="mainselection" id="empresafs">
                        <option value="0">Todos</option>
                        <?php
                        $result = pg_query($connection, "SELECT * FROM empresa");
                        while($line = pg_fetch_assoc($result))
                        {
                        echo "<option value=\"$line[id_empresa]\">$line[nome_empresa]</option>";
                        }
                        ?>
                    </select>
                    
                    
                    <input type="submit" class="btn btn-primary" value="Filtrar" id="filtroS">
                    <br/>
                    <br/>
                    <br/>
                    <?php
                    $result = pg_query($connection, "SELECT d.id_destinacao, d.residuo_classificado, d.peso,TO_CHAR(d.data, 'DD/MM/YYYY') as data, d.tipo_destino,
                    e.nome_empresa FROM destinacao as d inner join empresa as e on e.id_empresa = d.id_empresa");
                    
                    if(pg_num_rows($result)>0)
                    {
                    echo "<table id='tfhover' class='tftable' border='1'>";
                        
                        
                        echo "<tr>";
                            echo "<th>  Residuo </th>";
                            echo "<th>  Peso  </th>";
                            echo "<th>  Destino   </th>";
                            echo "<th>  Empresa  </th>";
                            echo "<th>  Data  </th>";
                            
                            echo "<th style='text-align:center;'>Action</th>";
                        echo "</tr>";
                        
                        while ($info = pg_fetch_array($result))
                        {
                        echo "<tr>";
                            echo "<td>$info[residuo_classificado]</td>";
                            echo "<td>$info[peso]</td>";
                            echo "<td>$info[tipo_destino]</td>";
                            echo "<td>$info[nome_empresa]</td>";
                            echo "<td>$info[data]</td>";
                            echo "<td style='text-align:center;'>";
                                
                                echo "<input name='id_destinacao' type='hidden' value='0' id='id_destinacao'>";
                                
                                echo "<a class='btn btn-primary' href='#' name='deletar1' onClick='delreg($info[id_destinacao]);'>Deletar</a></td>";
                                echo"<div id='mensagem'></div>";
                            echo "</td>";
                        echo "</tr>";
                        }
                    print "</table>";
                    }
                    ?>
                    
                </form>
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