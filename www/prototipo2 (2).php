<?php
    $connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
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


    <script src="js/jquery.js"></script>
    <script src="js/jquery.1.9.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/jquery-1.8.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/script.min.js"></script>
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
                <li><a href="#"><p class="noticias">RELATORIO</p></a></li>
                <li><a href="#"><p class="noticias">CADASTROS</p></a></li>
                <li><a href="#myModal" data-toggle="modal"><p>CONTATO</p></a></li>
            </ul>
        </div>

        <div class="container">
            <h1>Cadastro de Saida</h1>
            <form action="" method="post" id="saida">
                <label for="calendario2">Data:</label> <input type="text" name="calendario2" id="calendario2">

                <select name="residuo_classificado" class="mainselection">
                    <option value="0">Escolher classificão de residuo</option>
                    <?php
                        $result = pg_query($connection, "SELECT * FROM residuo_classificado");
                        while($line = pg_fetch_assoc($result))
                        {
                            echo "<option value=\"$line[id_residuo]\">$line[nome_residuo]</option>";
                        }
                    ?>
                </select>
            
                <select name="destino" class="mainselection">
                    <option value="0">Aguardando residuo...</option>
                </select>
            
             <select name="empresa" id="empresa" class="mainselection">
                    <option value="0">Escolher Empresa</option>
                    <?php
                        $result = pg_query($connection, "SELECT * FROM empresa");
                        while($line = pg_fetch_assoc($result))
                        {
                            echo "<option value=\"$line[id_empresa]\">$line[nome_empresa]</option>";
                        }
                    ?>
                </select>    
            
                 
                 
               
                <label for="peso_saida">Peso (KG):</label>
                <input type="text" name="peso_saida">

                <input type="submit" class="btn btn-primary" value="Cadastrar">
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