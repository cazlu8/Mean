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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.1.9.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/jquery-1.8.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/script.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#myModal').modal('hide');
}); 
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
            <h1>Cadastro de entrada</h1>
            <br/>
            <br/>
            <h1>Cadastro da tara</h1>

 <form id="formtara" method="post">

                       <select name="placas_vazias" class="mainselection">
                    <option value="0">Escolher placa</option>
                    <?php
                        $result = pg_query($connection, "SELECT id_residuo,placa_caminhao from residuo where tara is null");
                        while($line = pg_fetch_assoc($result))
                        {
                            echo "<option value=\"$line[id_residuo]\">$line[placa_caminhao]</option>";
                        }
                    ?>
                </select>

                <p name="tara1" id="tara1">Tara: <input type="text" name="tara" id="tara" /></p>
                   <input type="submit" class="btn btn-primary" id="btntara"value="Cadastrar Tara">             
            </form>

            <form action="" method="post" id="entrada">
           
    
                          <p name="data" id="data">Data: <input type="text" name="calendario" id="calendario" /></p>

                 <p name="nometara" id="nomediv"></p>



                <select name="setor" class="mainselection">
                    <option value="0">Escolher setor</option>
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
                </select>
            
                <select name="coleta" class="mainselection">
                    <option value="0">Escolher coleta</option>
                    <?php
                        $result = pg_query($connection, "SELECT * FROM coleta");
                        while($line = pg_fetch_assoc($result))
                        {
                            echo "<option value=\"$line[id_coleta]\">$line[tipo_coleta]</option>";
                        }
                    ?>
                </select>

                
                <select name="rota" class="mainselection">
                    <option value="0">Aguardando municipio...</option>
                </select>

            
                <select name="residuo_entrada" class="mainselection">
                    <option value="0">Aguardando coleta...</option>
                </select>

            
                <select name="placa_caminhao" class="mainselection">
                    <option value="0">Aguardando coleta...</option>
                </select>

                 <p name="peso" id="peso">Peso(KG): <input type="text" name="peso1" id="peso1" /></p>
                      

                

                <input type="submit" class="btn btn-primary" value="Cadastrar" id="btncadastra">
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