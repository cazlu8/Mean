<?php

$conexao = mysqli_connect('localhost', 'root','','georesprojeto');


if (mysqli_connect_errno($conexao)) { 
	echo "Problemas para conectar no banco. Verifique os dados!"; 
	 }else{
          echo "pa";
}
function buscar_tarefas($conexao) { 
	$sqlBusca = 'SELECT * FROM municipio'; 
	$resultado = mysqli_query($conexao, $sqlBusca);
 $tarefas = array();
while ($tarefa = mysqli_fetch_assoc($resultado))
 { 
 	$tarefas[] = $tarefa; 
}
return $tarefas;
}
$lista_tarefas = buscar_tarefas($conexao);
<?php foreach ($lista_tarefas as $tarefa) : ?> <tr> <td><?php echo $tarefa; ?></td> </tr> <?php endforeach; ?> 

?>