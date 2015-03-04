<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Amures</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="shortcut icon" href="favicon.ico" />
<script type="text/javascript" src="js/jquery.1.9.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#myModal').modal('hide');
});	
</script>
</head>

<body>
<!-- Modal -->
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
            <input name="nome" type="text" id="nome"/>
            
            <label>E-mail*</label>
            <input name="email" type="text" id="email"/>
           
            
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
	<div class="container">
    	<ul>
        	<li><a href="http://www.amures.org.br/"><img src="img/amures.jpg" alt="Amures" /></a></li>
            <li><a href="index.html"><p>INÍCIO</p></a></li>
            <li><a href="#"><p>PROJETO</p></a></li>
            <li><a href="#"><p class="noticias">NOTÍCIAS</p></a></li>
            <li><a href="#myModal" data-toggle="modal" > <p>CONTATO</p></a></li>
        </ul>
        <div class="mapa"><img src="img/mapa.jpg" alt="Mapa" /></div>
        <div class="textos">
       	  <h1>PROJETOS RESÍDUOS SÓLIDOS</h1>
       	  <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.<br /><br />
        Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.<br /><br />
        Projeto Resíduos Sólidos
        </p>
        </div>
        <div class="clear"></div>
        <div class="logos"><a href="#"><img src="img/cisama.jpg" alt="Cisama" /></a><a href="http://www.cav.udesc.br/" target="_blank"><img src="img/udesc.jpg" alt="Udesc" /></a></div>
    </div>
</div>


<div id="rodape" class="navbar-inner">
  <div class="container">
    <h2>CONTATO</h2>
      <span></span>
      <p> Lorem Ipsum é simplesmente  <br />simulação de texto da indústria<br /> tipográfica e de impressos</p>
      <div class="clear"></div>
  	  <a href="#myModal" data-toggle="modal" > <img class="email" src="img/email.jpg" alt="Email" /></a>
      <a href="http://www.orbicomunicacao.com.br/" target="_blank"><img class="logo" src="img/orbi.jpg" alt="Orbi" /></a>
  </div>
</div>
<div id="traco-fim" class="navbar-inner"></div>
</body>
</html>
