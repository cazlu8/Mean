$(document).ready(function(){$("#calendario").datepicker({dateFormat:"dd/mm/yy",dayNames:["Domingo","Segunda","Ter\xe7a","Quarta","Quinta","Sexta","S\xe1bado","Domingo"],dayNamesMin:["D","S","T","Q","Q","S","S","D"],dayNamesShort:["Dom","Seg","Ter","Qua","Qui","Sex","S\xe1b","Dom"],monthNames:["Janeiro","Fevereiro","Mar\xe7o","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],monthNamesShort:["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"]}),$("#calendario3").datepicker({dateFormat:"dd/mm/yy",dayNames:["Domingo","Segunda","Ter\xe7a","Quarta","Quinta","Sexta","S\xe1bado","Domingo"],dayNamesMin:["D","S","T","Q","Q","S","S","D"],dayNamesShort:["Dom","Seg","Ter","Qua","Qui","Sex","S\xe1b","Dom"],monthNames:["Janeiro","Fevereiro","Mar\xe7o","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],monthNamesShort:["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"]}),$("#calendario4").datepicker({dateFormat:"dd/mm/yy",dayNames:["Domingo","Segunda","Ter\xe7a","Quarta","Quinta","Sexta","S\xe1bado","Domingo"],dayNamesMin:["D","S","T","Q","Q","S","S","D"],dayNamesShort:["Dom","Seg","Ter","Qua","Qui","Sex","S\xe1b","Dom"],monthNames:["Janeiro","Fevereiro","Mar\xe7o","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],monthNamesShort:["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"]}),$("#calendario2").datepicker({dateFormat:"dd/mm/yy",dayNames:["Domingo","Segunda","Ter\xe7a","Quarta","Quinta","Sexta","S\xe1bado","Domingo"],dayNamesMin:["D","S","T","Q","Q","S","S","D"],dayNamesShort:["Dom","Seg","Ter","Qua","Qui","Sex","S\xe1b","Dom"],monthNames:["Janeiro","Fevereiro","Mar\xe7o","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],monthNamesShort:["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"]}),$("#empresa").slideUp(),$("select[name=residuo_classificado]").change(function(){$("select[name=destino]").html("<option>Carregando...</option>"),$.post("Carrega_destino.php",{residuo_classificado:$(this).val()},function(a){7==$("select[name=residuo_classificado]").val()||8==$("select[name=residuo_classificado]").val()||10==$("select[name=residuo_classificado]").val()?($("select[name=destino]").slideDown(),$("select[name=destino]").html(a),$("#empresa").slideUp()):($("select[name=destino]").html("<option>Carregando...</option>"),$("select[name=destino]").slideUp(),$("#empresa").slideDown())})}),$("select[name=setor]").change(function(){$("select[name=municipio]").html("<option>Carregando...</option>"),$.post("Carrega_municipios.php",{setor:$(this).val()},function(a){$("select[name=municipio]").html(a)})}),$("a[name=deletar]").click(function(a){a.preventDefault(),$("#mensagem").load("deleta_residuo.php?pr="+$("#id_residuos").val())}),$("a[name=delet]").click(function(a){a.preventDefault(),$("#mensagem2").load("deleta_residuo.php?pr="+$("#id_residuos1").val())}),$("#filtro1").click(function(a){a.preventDefault(),$("#mensagem1").load("filtro_teste.php")}),$("#filtro").click(function(a){a.preventDefault(),$.post("filtra_entrada.php",{},function(a){$("#tfhover").html(a)})});var c={bDestroy:!0,paging:!1,language:{zeroRecords:"No results found"}};$("#filtro2").submit(function(a){a.preventDefault();var b=JSON.stringify($(this).serializeArray());$.ajax({type:"POST",url:"filtra_entrada.php",data:b,dataType:"json",success:function(a){c.data=a.data,c.columns=a.columns,$("#tfhover").dataTable(c),table.clear(),table.rows.add(a.data),table.draw()}})}),$("a[name=deleta]").click(function(a){a.preventDefault(),$("#mensagem").load("deleta_residuo_saida.php?pr="+$("#id_destinacao").val())}),jQuery("#entrada").submit(function(){var a=jQuery(this).serialize();return jQuery.ajax({type:"POST",url:"cadastra_entrada.php",data:a,success:function(a){alert(a)}}),!1}),$("#tfhover").on("click","a[name=deletar1]",function(a){return a.preventDefault(),$.ajax({type:"POST",url:"deleta_residuo.php",data:{pr:$("#id_residuos1").val()},success:function(a){alert(a),location.reload()}}),!1}),jQuery("#saida").submit(function(){var a=jQuery(this).serialize();return jQuery.ajax({type:"POST",url:"cadastra_saida.php",data:a,success:function(a){alert(a)}}),!1}),$("select[name=municipio]").change(function(){$("select[name=rota]").html("<option>Carregando...</option>"),$.post("Carrega_rotas.php",{municipio:$(this).val()},function(a){2!=$("select[name=coleta]").val()?($("select[name=rota]").html(' <option value="0">0</option>'),$("select[name=rota]").slideUp()):($("select[name=rota]").slideDown(),$("select[name=rota]").html(a))})}),$("select[name=coleta]").change(function(){$("select[name=rota]").html("<option>Carregando...</option>"),2!=$("select[name=coleta]").val()?($("select[name=rota]").html("<option>0</option>"),$("select[name=rota]").slideUp()):($("select[name=rota]").slideDown(),$.post("Carrega_rotas.php",{municipio:$("select[name=municipio]").val()},function(a){$("select[name=rota]").html(a)}))}),$("select[name=coleta]").change(function(){$("select[name=residuo_entrada]").html("<option>Carregando...</option>"),$.post("Carrega_residuo.php",{coleta:$(this).val()},function(a){$("select[name=residuo_entrada]").html(a)})}),$("select[name=coleta]").change(function(){$("select[name=placa_caminhao]").html("<option>Carregando...</option>"),$.post("Carrega_placa_caminhao.php",{coleta:$(this).val()},function(a){3!=$("select[name=coleta]").val()?($("select[name=placa_caminhao]").slideDown(),$("select[name=placa_caminhao]").html(a)):($("select[name=placa_caminhao]").html('<option value="0">0</option>'),$("select[name=placa_caminhao]").slideUp())})})});