var tbContatos = [];

function criarContato() {

    var contato = new Object();

    contato.numero = document.getElementById('numero').value;
    contato.nome = document.getElementById('nome').value;
    contato.email = document.getElementById('email').value;

    if (localStorage.getItem('tbContatos') != null)
        tbContatos = JSON.parse(localStorage.getItem('tbContatos'));

    tbContatos.push(contato);

    localStorage.setItem('tbContatos', JSON.stringify(tbContatos));
}

function exibirContatos() {

    var table = document.getElementById('tabelaContatos');

    table.innerHTML += '<tr><th>Número</th><th>Nome</th><th>Email</th></tr>';

    if (localStorage.getItem('tbContatos') != null) {

        tbContatos = JSON.parse(localStorage.getItem('tbContatos'));

        for (var i in tbContatos) {

            table.innerHTML += '<tr><td>' + tbContatos[i].numero + '</td><td>' + tbContatos[i].nome + '</td><td>' + tbContatos[i].email + '</td></tr>';
        }
    }
}