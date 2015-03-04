var tbUsuarios = [];

function criarUsuario() {
    var usuario = new Object();

    usuario.nome = document.getElementById('nome').value;
    usuario.sobrenome = document.getElementById('sobrenome').value;
    usuario.endereço = document.getElementById('endereço').value;
    usuario.telefone = document.getElementById('telefone').value;
    


    if (localStorage.getItem('tbUsuarios') != null) {
        tbUsuarios = JSON.parse(localStorage.getItem('tbUsuarios'));
    }

    tbUsuarios.push(usuario);

    localStorage.setItem('tbUsuarios', JSON.stringify(tbUsuarios));
}

function exibirUsuarios() {
    var table = document.getElementById('tabelaUsuarios');

    table.innerHTML += '<tr><th>Nome</th><th>Sobrenome</th><th>Endereço<th>Telefone</th></tr>';

    if (localStorage.getItem('tbUsuarios') != null) {
        tbUsuarios = localStorage.getItem('tbUsuarios');

        tbUsuarios = JSON.parse(localStorage.getItem('tbUsuarios'));

        for (var i in tbUsuarios) {

           
    

            table.innerHTML += '<tr><td>' + tbUsuarios[i].nome + '</td><td>' + tbUsuarios[i].sobrenome + '</td><td>' + tbUsuarios[i].endereço + '</td><td>' + tbUsuarios[i].telefone + '</td></tr>';
        }
    }
}