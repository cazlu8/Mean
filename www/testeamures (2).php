<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Amures</title>
  <link href="style.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="shortcut icon" href="favicon.ico" />
  <script type="text/javascript" src="jquery.js"></script>
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
        <div class="clear"></div>
        <div class="logos"><a href="#"><img src="img/cisama.jpg" alt="Cisama" /></a><a href="http://www.cav.udesc.br/" target="_blank"><img src="img/udesc.jpg" alt="Udesc" /></a></div>
    </div>

<br/>
<br/>
<br/>


<h1>Cadastro de entrada</h1>
<form action="cadastra_entrada.php" method="post" id="entrada">
 <fieldset>
<label> Data: <input type="text" name="data" id ="data" />
 </label> 
 </fieldset>
<fieldset id="field">
  <select name="setor" id="mainselection">
    <option value="0">Escolher setor</option>
        <?php         
         $connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
        $result=pg_query($connection, "SELECT * FROM nome_setor;");
            while($line = pg_fetch_assoc($result)){

            echo '<option value="'.$line['id_setor'].'">'.$line['nome_setor'].'</option>';
             }
         ?>
  </select>
</fieldset>

  <fieldset id="field">
  <select name="municipio" id="mainselection">
    <option value="0" selected="selected">Aguardando setor...</option>
    </select>
     </fieldset>
     <fieldset id="field">
            <select name="rota" id="mainselection">
    <option value="0" selected="selected">Aguardando municipio...</option>
            </select>
     </fieldset>
<fieldset id="field">
  <select name="coleta" id="mainselection">
    <option value="0">Escolher coleta</option>
        <?php         
         $connection = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
        $result=pg_query($connection, "SELECT * FROM coleta;");
            while($line = pg_fetch_assoc($result)){

            echo '<option value="'.$line['id_coleta'].'">'.$line['tipo_coleta'].'</option>';
             }
         ?>
  </select>
</fieldset>
 <fieldset id="field">
  <select name="tipo_residuo" id="mainselection">
    <option value="0" selected="selected">Aguardando coleta...</option>
    </select>
     </fieldset>

<fieldset id="field">
  <select name="placa_caminhao" id="mainselection">
    <option value="0" selected="selected">Aguardando coleta...</option>
    </select>
     </fieldset>
 <fieldset>
<label> Peso (KG): <input type="text" name="peso" />
 </label> 
 </fieldset>
<script type="text/javascript" >
      $(document).ready(function(){
         $("select[name=setor]").change(function(){
             $("select[name=municipio]").html('<option>Carregando...</option>');
                $.post("Carrega_municipios.php",
                   {setor:$(this).val()},
                     function(valor){
                       $("select[name=municipio]").html(valor);
            } 
              )}
                )
           $("select[name=municipio]").change(function(){
             $("select[name=rota]").html('<option>Carregando...</option>');
                $.post("Carrega_rotas.php",
                   {municipio:$(this).val()},
                     function(valor){
                       $("select[name=rota]").html(valor);
            } 
              )}
                )
           $("select[name=coleta]").change(function(){
             $("select[name=tipo_residuo]").html('<option>Carregando...</option>');
                $.post("Carrega_residuo.php",
                   {coleta:$(this).val()},
                     function(valor){
                       $("select[name=tipo_residuo]").html(valor);
            } 
              )}
                )
            $("select[name=coleta]").change(function(){
             $("select[name=placa_caminhao]").html('<option>Carregando...</option>');
                $.post("Carrega_placa_caminhao.php",
                   {coleta:$(this).val()},
                     function(valor){
                       $("select[name=placa_caminhao]").html(valor);
            } 
              )}
                )

                   }
                   )


jQuery(function($){

       $("#data").mask("99/99/9999");
});


</script>

   <input type="submit" value="Cadastrar">

</form>



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
