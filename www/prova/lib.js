var libs=[];
function libCreate() {

    var lib = new Object();



    lib.nome = document.getElementById('nome').value;
    lib.isbn = document.getElementById('isbn').value;
    lib.autor = document.getElementById('autor').value;
    lib.editora = document.getElementById('editora').value;
    lib.paginas = document.getElementById('paginas').value;
    lib.user=document.getElementById('user').value;


    if (localStorage.getItem('libs') != null) {
        libs = JSON.parse(localStorage.getItem('libs'));
    }

    libs.push(lib);

    localStorage.setItem('libs', JSON.stringify(libs));
}

function showLibs() {
    var libsTable = document.getElementById('libsTable');

    libsTable.innerHTML += '<tr><th> Nome </th><th> ISBN </th><th> Autor</th>  <th> Editora </th> <th> Numero de Páginas </th> <th> Usuário </th></tr> ';

    if (localStorage.getItem('libs') != null) {
        libs = JSON.parse(localStorage.getItem('libs'));


    }

    libs.forEach(function (lib) {
        libsTable.innerHTML+= '<tr><td> ' + lib.nome + '</td>' + '<td> ' + lib.isbn + '</td>' + '<td> ' + lib.autor + '</td>' +'<td> ' + lib.editora + '</td>'  +'<td> ' + lib.paginas + '</td>' +'<td> ' + lib.user + '</td>' +' </tr>';
    });

    
}