<?php
//Aqui colocamos o servidor em que está o nosso banco de dados, no nosso exemplo é a conexão com um servidor local, portanto localhost
$servidor = "localhost";
//Aqui é o nome de usuário do seu banco de dados, root é o servidor inicial e básico de todo servidor, mas recomenda-se não usar o usuario root e sim criar um novo usuário
$usuario = "";
//Aqui colocamos a senha do usuário, por padrão o usuário root vem sem senha, mas é altamente recomenável criar uma senha para o usuário root, visto que ele é o que tem mais privilégios no servidor
$senha ="root";

//Aqui criamos a conexão utilizando o servidor, usuario e senha, caso dê erro, retorna um erro ao usuário.
$d= pg_connect("host=localhost port=5432 dbname=Geores user=postgres password=root");
//caso a conexão seja efetuada com sucesso, exibe uma mensagem ao usuário
if ($d) {
	echo "deu certo";
}else
{
	echo "nao deu";
}
  $result=pg_query($d, "SELECT * FROM municipio where id_setor=2;");
  if  (!$result) {
   echo "query did not execute";
  }
  if ($line = pg_fetch_assoc($result)) {
   echo $line['nome_municipio'];
    }
  

?>