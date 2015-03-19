<?php
$connection = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");
$setor=$_POST['setor'];
$municipio=$_POST['municipio'];
$rota=$_POST['rota'];
$coleta=$_POST['coleta'];
$peso=$_POST['peso1'];
$data=$_POST['calendario'];
$residuo=$_POST['residuo_entrada'];
$placa_caminhao=$_POST['placa_caminhao'];


$_coleta=pg_query($connection,"SELECT tipo_coleta from coleta where id_coleta='$coleta'");
$line = pg_fetch_assoc($_coleta);
$coleta= $line['tipo_coleta'];
$_residuo=pg_query($connection,"SELECT tipo_residuo from residuo_entrada where id_residuo='$residuo'");
$line = pg_fetch_assoc($_residuo);
$residuo= $line['tipo_residuo'];
$_placa=pg_query($connection,"SELECT placa from placa_caminhao where id_placa='$placa_caminhao'");
$line = pg_fetch_assoc($_placa);
$placa= $line['placa'];
$motorista=pg_query($connection,"SELECT m.id_motorista from motorista as m inner join placa_caminhao as p on p.id_motorista =m.id_motorista ");
$line = pg_fetch_assoc($motorista);
$motorista= $line['id_motorista'];


if ($rota==0 && $placa_caminhao!=0) {

	pg_query($connection,"INSERT INTO residuo (tipo_residuo, peso_residuo, placa_caminhao, origem_coleta, data, id_motorista, id_municipio, id_setor) 
		values ('$residuo','$peso','$placa','$coleta','$data','$motorista','$municipio','$setor')"); 
}
else if ($rota!=0 && $placa_caminhao!=0) {
	pg_query($connection,"INSERT INTO residuo(
            tipo_residuo, peso_residuo, placa_caminhao, origem_coleta, 
            data, id_motorista, id_rota, id_municipio, id_setor) values ('$residuo','$peso','$placa','$coleta','$data','$motorista','$rota','$municipio','$setor')"); 
}
else if ($rota!=0 && $placa_caminhao==0) {
	pg_query($connection,"INSERT INTO residuo(
            tipo_residuo, peso_residuo, origem_coleta, 
            data, id_rota, id_municipio, id_setor) values ('$residuo','$peso',$coleta','$data','$rota','$municipio','$setor')"); 
}else if ($rota==0 && $placa_caminhao==0) {
          pg_query($connection,"INSERT INTO residuo (tipo_residuo, peso_residuo, origem_coleta, data,id_municipio, id_setor)  values ('$residuo','$peso','$coleta','$data','$municipio','$setor')"); 


}

print"cadastro feito com sucesso!";





?>