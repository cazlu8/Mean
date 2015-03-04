<!doctype html>
<html>
  <head>
    <title>Cadastro de Entrada</title>
    
<script type="text/javascript" src="jquery.js"></script>

    <meta charset="UTF8">
  </head>
  <body>
<form action="testa.php" method="post" id="auto">
  <select name="setor">
    <option value="0">Escolher setor</option>
        <?php
         $d = pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
        $result=pg_query($d, "SELECT * FROM nome_setor;");

         

         while($ln = pg_fetch_assoc($result)){

            echo '<option value="'.$ln['id_setor'].'">'.$ln['nome_setor'].'</option>';

         }

      ?>

        

  </select>

    

  <select name="municipio">

     <option value="0" selected="selected">Aguardando setor...</option>

  </select>
<script type="text/javascript" >

    

      $(document).ready(function(){

        // Evento change no campo tipo 

         $("select[name=setor]").change(function(){

            // Exibimos no <span class="w3958bu5xn7b" id="w3958bu5xn7b_8" style="height: 12px;">campo marca</span> antes de concluirmos

            $("select[name=municipio]").html('<option>Carregando...</option>');

            // Exibimos no campo marca antes de selecionamos a marca, serve também em caso

            // do usuario ja ter selecionado o tipo e resolveu trocar, com isso limpamos a

            // seleção antiga caso tenha feito.

           

            // Passando tipo por parametro para a pagina ajax-marca.php

            $.post("municipio.php",

                  {setor:$(this).val()},

                  // Carregamos o resultado acima para o campo marca

                  function(valor){


                     $("select[name=municipio]").html(valor);

                  }

                  )

         })

        // Evento change no campo marca

       

      


      })

       

</script>

   <input type="submit" value="pa">

</form>

  
  </body>
</html>
