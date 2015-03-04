var users=[];
function userCreate() {

    var user = new Object();



    user.nome = document.getElementById('nome').value;
    user.sobreNome = document.getElementById('sobreNome').value;
    user.idade = document.getElementById('idade').value;
    user.cpf = document.getElementById('cpf').value;
    user.data = new Date();

    if (localStorage.getItem('users') != null) {
        users = JSON.parse(localStorage.getItem('users'));
    }

    users.push(user);

    localStorage.setItem('users', JSON.stringify(users));
}

function showUsers() {
    var usersTable = document.getElementById('usersTable');

    usersTable.innerHTML += '<tr><th> Nome </th><th> Sobrenome </th><th> Idade </th>  <th> Cpf </th> <th> Data de inserção </th></tr> ';

    if (localStorage.getItem('users') != null) {
        users = JSON.parse(localStorage.getItem('users'));


    }

    users.forEach(function (user) {
        usersTable.innerHTML+= '<tr><td> ' + user.nome + '</td>' + '<td> ' + user.sobreNome + '</td>' + '<td> ' + user.idade + '</td>' +'<td> ' + user.cpf + '</td>'  +'<td> ' + user.data + '</td>' +' </tr>';
    });

    
}