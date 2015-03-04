$(document).ready(function() {
		alert('bem-vindo!');

		$('#forms').slideUp();

		$('#btnForm').click(function(event) {
			$('#forms').slideDown();

		});


		$('#btnCriar').click(function(event) {
				var tbPizza = [];
				var pizza = new Object();

				pizza.nome = document.getElementById('nome').value;
				pizza.borda = document.getElementById('borda').value;
				pizza.acompanhamento = document.getElementById('acompanhamento').value;
				pizza.tamanho = document.getElementById('tamanho').value;
				pizza.preco = document.getElementById('preco').value;
				pizza.cliente = document.getElementById('cliente').value;



				if (localStorage.getItem('tbPizza') != null) {
					tbPizza = JSON.parse(localStorage.getItem('tbPizza'));
				}

				tbPizza.push(pizza);

				localStorage.setItem('tbPizza', JSON.stringify(tbPizza));
			$('#forms').slideUp();





		
		});



});

function exibirPizza() {
    var table = document.getElementById('tabelaPizza');

    table.innerHTML += '<tr><th>Nome</th><th>Borda</th><th>Acompanhamento</th><th>Tamanho</th><th>Preço</th><th>Cliente</th></tr>';

    if (localStorage.getItem('tbPizza') != null) {
        tbPizza = localStorage.getItem('tbPizza');

        tbPizza = JSON.parse(localStorage.getItem('tbPizza'));
        for (var i in tbPizza) {
            table.innerHTML += '<tr><td>' + tbPizza[i].nome + '</td><td>' + tbPizza[i].borda + '</td><td>' + tbPizza[i].acompanhamento + '</td> <td>' + tbPizza[i].tamanho + '</td> <td>' + tbPizza[i].preco + '</td><td>' +tbPizza[i].cliente+ '</td>'+'</td><tr>';
        }
    }
}

