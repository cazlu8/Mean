var tbPizza = [];

function criarPizza() {
    var pizza = new Object();

    pizza.nome = document.getElementById('nome').value;
    pizza.borda = document.getElementById('borda').value;
    pizza.acompanhamento = document.getElementById('acompanhamento').value;
    pizza.tamanho = document.getElementById('tamanho').value;
    pizza.preço = document.getElementById('preço').value;
    pizza.cliente = document.getElementById('cliente').value;
   



    if (localStorage.getItem('tbPizza') != null) {
        tbPizza = JSON.parse(localStorage.getItem('tbPizza'));
    }

    tbPizza.push(pizza);

    localStorage.setItem('tbPizza', JSON.stringify(tbPizza));
}

function exibirPizza() {
    var table = document.getElementById('tabelaPizza');

    table.innerHTML += '<tr><th>Nome</th><th>Borda</th><th>Acompanhamento</th><th>Tamanho</th><th>Preço</th><th>Cliente</th></tr>';

    if (localStorage.getItem('tbPizza') != null) {
        tbPizza = localStorage.getItem('tbPizza');

        tbPizza = JSON.parse(localStorage.getItem('tbPizza'));
        for (var i in tbPizza) {
            table.innerHTML += '<tr><td>' + tbPizza[i].nome + '</td><td>' + tbPizza[i].borda + '</td><td>' + tbPizza[i].acompanhamento + '</td> <td>' + tbPizza[i].tamanho + '</td> <td>' + tbPizza[i].preço + '</td><td>' +tbPizza[i].cliente+ '</td>'+'</td><td>' +new Date()+ '</td><tr>';
        }
    }
}