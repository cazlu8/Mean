var tbTarefas=[];
function criarTarefa() {

    var tarefa = new Object();



    tarefa.numero = document.getElementById('numero').value;
    tarefa.assunto = document.getElementById('assunto').value;
    tarefa.dataInicio = document.getElementById('dataInicio').value;
    tarefa.dataConclusao = document.getElementById('dataConclusao').value;
    tarefa.prctConclusao = document.getElementById('prctConclusao').value;

    if (localStorage.getItem('tbTarefas') != null) {
        tbTarefas = JSON.parse(localStorage.getItem('tbTarefas'));
    }

    tbTarefas.push(tarefa);

    localStorage.setItem('tbTarefas', JSON.stringify(tbTarefas));
}

function exibirTarefas() {
    var table = document.getElementById('tabelaTarefas');

    table.innerHTML += '<tr><th> Numero </th><th> Assunto </th><th> Data Início </th>  <th> Data Conclusão </th> <th> Porcentagem de Conclusão </th></tr> ';

    if (localStorage.getItem('tbTarefas') != null) {
        tbTarefas = JSON.parse(localStorage.getItem('tbTarefas'));


    }

    for (var i in tbTarefas) {
        table.innerHTML += '<tr><td> ' + tbTarefas[i].numero + '</td>' + '<td> ' + tbTarefas[i].assunto + '</td>' + '<td> ' + tbTarefas[i].dataInicio + '</td>' +'<td> ' + tbTarefas[i].dataConclusao + '</td>'  +'<td> ' + tbTarefas[i].prctConclusao + '</td>' +' </tr>';
    }
}