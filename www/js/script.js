$(document).ready(function() {
	function pickerDate(id) {

		$(id).datepicker({
			dateFormat: 'dd/mm/yy',
			dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
			dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
			dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
			monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
		});

	}
	pickerDate('#calendario');
	pickerDate('#calendario2');
	pickerDate('#calendario3');
	pickerDate('#calendario4');
	pickerDate('#iniciofs');
	pickerDate('#fimfs');
	$("#empresas").slideUp();
	$("#nomediv").slideUp();
	$("#tara1").slideUp();
	$("#btntara").slideUp();

	$("select[name=residuo_classificado]").change(function() {
		$("select[name=destino]").html('<option>Carregando...</option>');
		$.post("Carrega_destino.php", {
				residuo_classificado: $(this).val()
			},
			function(valor) {
				if ($("select[name=residuo_classificado]").val() == 7 || $("select[name=residuo_classificado]").val() == 8 || $("select[name=residuo_classificado]").val() == 10) {
					$("select[name=destino]").slideDown();
					$("select[name=destino]").html(valor);
					$("#empresas").slideUp();
				} else {
					$("select[name=destino]").html('<option>Carregando...</option>');
					$("select[name=destino]").slideUp();
					$("#empresas").slideDown();
				}

			}
		);
	});

	$("select[name=setor]").change(function() {
		$("select[name=municipio]").html('<option>Carregando...</option>');
		$.post("Carrega_municipios.php", {
				setor: $(this).val()
			},
			function(valor) {
				$("select[name=municipio]").html(valor);
			}
		);
	});

	$("select[name=placas_vazias]").change(function() {
		$.post("testejson1.php", {
				id: $(this).val()
			},
			function(valor) {
				if ($("select[name=placas_vazias]").val() != 0) {
					var nome = JSON.parse(valor);
					$('select[name=municipio]').slideUp();
					$('select[name=coleta]').slideUp();
					$('select[name=rota]').slideUp();
					$('select[name=residuo_entrada]').slideUp();
					$('select[name=placa_caminhao]').slideUp();
					$('#btncadastra').slideUp();
					$('#peso').slideUp();
					$('#data').slideUp();
					$('select[name=setor]').slideUp();
					$('#tara1').slideDown();
					$('#btntara').slideDown();
					$('#nomediv').slideDown();
					$('#nomediv').html('<label>Tipo de residuo:</label>' + nome.tipo_residuo + '<label>Peso:</label>' + nome.peso_residuo + '<label>Data:</label>' + nome.data + '<label>Motorista:</label>' + nome.nome_motorista + '<label>Municipio:</label>' + nome.nome_municipio);
				} else {
					$('select[name=municipio]').slideDown();
					$('select[name=coleta]').slideDown();
					$('select[name=rota]').slideDown();
					$('select[name=residuo_entrada]').slideDown();
					$('select[name=placa_caminhao]').slideDown();
					$('#btncadastra').slideDown();
					$('#peso').slideDown();
					$('#data').slideDown();
					$('select[name=setor]').slideDown();
					$('#tara1').slideUp();
					$('#btntara').slideUp();
					$('#nomediv').slideUp();
				}
			}
		);
	});

	$('a[name=deletarS]').click(function(e) {
		e.preventDefault();

		$('#mensagem').load('deleta_residuo_saida.php?pr=' + $('#id_residuosS').val());
	});

	$('a[name=deletar]').click(function(e) {
		e.preventDefault();

		$('#mensagem').load('deleta_residuo.php?pr=' + $('#id_residuos').val());
	});

	$('a[name=delet]').click(function(e) {
		e.preventDefault();

		$('#mensagem2').load('deleta_residuo.php?pr=' + $('#id_residuos1').val());

	});

	$("#filtro1").click(function(e) {
		e.preventDefault();

		$('#mensagem1').load('filtro_teste.php');


	});

	$("#filtro").click(function(e) {
		e.preventDefault();
		var dateValid = true;
		if ($('#calendario4').val() == '') {
			$('#calendario4').datepicker('setDate', '10/10/2016');

		};
		if ($('#calendario3').datepicker('getDate') > $('#calendario4').datepicker('getDate')) {
			dateValid = false;
			alert('Data de fim anterior que a de inicio! por favor digite uma data posterior.');
			console.log('errado!');
		};
		$.post("filtra_entrada.php", {
				setor: $('#setorf').val(),
				municipio: $('#municipiof').val(),
				coleta: $('#coletaf').val(),
				inicio: $('#calendario3').val(),
				fim: $('#calendario4').val(),
				residuo: $('#residuof').val()
			},
			function(valor) {
				if (dateValid) {
					$("#tfhover").html(valor);
					$('#calendario4').val('');
				} else {
					$("#tfhover").html('<h1> Data de fim anterior que a data de inicio!</h1>');
				}
			})
	}); 
	$("#filtroS").click(function(e) {
		e.preventDefault();
		var dateValid = true;
		if ($('#fimfs').val() == '') {
			$('#fimfs').datepicker('setDate', '10/10/2016');

		};

		if ($('#iniciofs').datepicker('getDate') > $('#fimfs').datepicker('getDate')) {
			dateValid = false;
			alert('Data de fim anterior que a de inicio! por favor digite uma data posterior.');
			console.log('errado!');
		};
		$.post("filtra_saida.php", {
				residuo: $('#residuofs').val(),
				empresa: $('#empresafs').val(),
				destino: $('#destinofs').val(),
				inicio: $('#iniciofs').val(),
				fim: $('#fimfs').val()
			},

			function(valor) {
				if (dateValid) {
					$("#tfhover").html(valor);
					$('#fimfs').val('');
				} else {
					$("#tfhover").html('<h1> Data de fim anterior que a data de inicio!</h1>');
				}

			});
	});

	function delreg(vRg) {
		var id = vRg;
		document.getElementById('id_residuos').value = id;
	}

	function delrege(vRg) {
		var id = vRg;
		document.getElementById('id_residuos1').value = id;
	}
	var table_config = {
		"bDestroy": true,
		"paging": false,
		"language": {
			"zeroRecords": "No results found"
		}
	};

	$("#filtro2").submit(function(e) {

		e.preventDefault();

		var form_data = JSON.stringify($(this).serializeArray());

		$.ajax({
			type: "POST",
			url: "filtra_entrada.php",
			data: form_data,
			dataType: 'json',
			success: function(response) {

				table_config.data = response.data;
				table_config.columns = response.columns;

				$('#tfhover').dataTable(table_config);
				table.clear();
				table.rows.add(response.data);
				table.draw();

			}
		});
	});



	jQuery('#entrada').submit(function() {
		var dados = jQuery(this).serialize();

		jQuery.ajax({
			type: "POST",
			url: "cadastra_entrada.php",
			data: dados,
			success: function(data) {
				alert(data);
				location.reload();
			}
		});

		return false;
	});

	jQuery('#formtara').submit(function() {
		var dados = jQuery(this).serialize();
		jQuery.ajax({
			type: "POST",
			url: "cadastra_tara.php",
			data: dados,
			success: function(data) {
				$('#tara').slideUp();
				$('#btntara').slideUp();
				$('select[name=municipio]').slideDown();
				$('select[name=coleta]').slideDown();
				$('select[name=rota]').slideDown();
				$('select[name=residuo_entrada]').slideDown();
				$('select[name=placa_caminhao]').slideDown();
				$('#btncadastra').slideDown();
				$('#peso').slideDown();
				$('#data').slideDown();
				$('select[name=setor]').slideDown();
				$("#tara1").slideUp();
				$("#tara").slideUp();
				$('#nomediv').slideUp();
				alert('Cadastro feito com sucesso!');
				location.reload();
			}
		});

		return false;
	});
	$('#tfhover').on('click', 'a[name=deletar1]', function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "deleta_residuo.php",
			data: {
				"pr": $('#id_residuos1').val()
			},
			success: function(result) {

				alert(result);
				location.reload();
			}
		});

		return false;
	});

	jQuery('#saida').submit(function() {
		var dados = jQuery(this).serialize();

		jQuery.ajax({
			type: "POST",
			url: "cadastra_saida.php",
			data: dados,
			success: function(data) {
				alert(data);
				location.reload();
				
			}
		});

		return false;
	});


	$("select[name=municipio]").change(function() {
		$("select[name=rota]").html('<option>Carregando...</option>');
		$.post("Carrega_rotas.php", {
				municipio: $(this).val()
			},
			function(valor) {
				if ($("select[name=coleta]").val() != 2) {
					$("select[name=rota]").html(' <option value="0">0</option>');
					$("select[name=rota]").slideUp();
				} else {
					$("select[name=rota]").slideDown();
					$("select[name=rota]").html(valor);
				}
			}

		);
	});

	$("select[name=coleta]").change(function() {
		$("select[name=rota]").html('<option>Carregando...</option>');
		if ($("select[name=coleta]").val() != 2) {
			$("select[name=rota]").html('<option>0</option>');
			$("select[name=rota]").slideUp();
		} else {
			$("select[name=rota]").slideDown();
			$.post("Carrega_rotas.php", {
					municipio: $("select[name=municipio]").val()
				},
				function(valor) {
					$("select[name=rota]").html(valor);
				}
			);

		}
	});

	$("select[name=coleta]").change(function() {
		$("select[name=residuo_entrada]").html('<option>Carregando...</option>');
		$.post("Carrega_residuo.php", {
				coleta: $(this).val()
			},
			function(valor) {
				$("select[name=residuo_entrada]").html(valor);
			}
		);
	});
	$("select[name=coleta]").change(function() {
		$("select[name=placa_caminhao]").html('<option>Carregando...</option>');
		$.post("Carrega_placa_caminhao.php", {
				coleta: $(this).val()
			},
			function(valor) {
				if ($("select[name=coleta]").val() != 3) {
					$("select[name=placa_caminhao]").slideDown();
					$("select[name=placa_caminhao]").html(valor);
				} else {
					$("select[name=placa_caminhao]").html('<option value="0">0</option>');
					$("select[name=placa_caminhao]").slideUp();
				}

			}
		);
	});
});