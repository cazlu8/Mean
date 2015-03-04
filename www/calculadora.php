<?php header('Content-Type: text/html; charset=utf-8');
	
	error_reporting(false);

	$ip = "192.168.10.30";
	
	$mascara_cidr = "28";
	
	list($primeiro_ip, $segundo_ip, $terceiro_ip, $quarto_ip) = explode(".", $ip);
	
/*converte de decimal para binario*/
	$octeto_ip[1] = decbin($primeiro_ip);
	$octeto_ip[2] = decbin($segundo_ip);
	$octeto_ip[3] = decbin($terceiro_ip);
	$octeto_ip[4] = decbin($quarto_ip);
/*converte de decimal para binario*/


/*converte binario para decimal*/
	function BinarioDecimal($binario1, $binario2, $binario3, $binario4) {
		$decimal1 = bindec($binario1);
		$decimal2 = bindec($binario2);
		$decimal3 = bindec($binario3);
		$decimal4 = bindec($binario4);
		
		$convertido = $decimal1 . "." . $decimal2 . "." . $decimal3 . "." . $decimal4;
		
		return($convertido); 
	}
/*converte binario para decimal*/


/*função que completa o octeco do IP binario quando faltar 0's a esquerda*/	
	function CompletaBinario($a_completar) {
		
		if(strlen($a_completar) == 1){ $completo = "0000000" . "$a_completar"; }
		if(strlen($a_completar) == 2){ $completo = "000000" . "$a_completar"; }
		if(strlen($a_completar) == 3){ $completo = "00000" . "$a_completar"; }
		if(strlen($a_completar) == 4){ $completo = "0000" . "$a_completar"; }
		if(strlen($a_completar) == 5){ $completo = "000" . "$a_completar"; }
		if(strlen($a_completar) == 6){ $completo = "00" . "$a_completar"; }
		if(strlen($a_completar) == 7){ $completo = "0" . "$a_completar"; }
		if(strlen($a_completar) == 8){ $completo = "$a_completar"; }
		
		return($completo);
		
	}
/*função que completa o octeco do IP binario quando faltar 0's a esquerda*/
	
	
/*verifica qual é a máscara CIDR e retorna a mascara binária*/	
	function CIDR_Mascara($cidr){
		
		if($cidr == 1){ $mascara_binaria = "10000000.00000000.00000000.00000000";}
		if($cidr == 2){ $mascara_binaria = "11000000.00000000.00000000.00000000";}
		if($cidr == 3){ $mascara_binaria = "11100000.00000000.00000000.00000000";}
		if($cidr == 4){ $mascara_binaria = "11110000.00000000.00000000.00000000";}
		if($cidr == 5){ $mascara_binaria = "11111000.00000000.00000000.00000000";}
		if($cidr == 6){ $mascara_binaria = "11111100.00000000.00000000.00000000";}
		if($cidr == 7){ $mascara_binaria = "11111110.00000000.00000000.00000000";}
		if($cidr == 8){ $mascara_binaria = "11111111.00000000.00000000.00000000";}
		if($cidr == 9){ $mascara_binaria = "11111111.10000000.00000000.00000000";}
		if($cidr == 10){$mascara_binaria = "11111111.11000000.00000000.00000000";}
		if($cidr == 11){$mascara_binaria = "11111111.11100000.00000000.00000000";}
		if($cidr == 12){$mascara_binaria = "11111111.11110000.00000000.00000000";}
		if($cidr == 13){$mascara_binaria = "11111111.11111000.00000000.00000000";}
		if($cidr == 14){$mascara_binaria = "11111111.11111100.00000000.00000000";}
		if($cidr == 15){$mascara_binaria = "11111111.11111110.00000000.00000000";}
		if($cidr == 16){$mascara_binaria = "11111111.11111111.00000000.00000000";}
		if($cidr == 17){$mascara_binaria = "11111111.11111111.10000000.00000000";}
		if($cidr == 18){$mascara_binaria = "11111111.11111111.11000000.00000000";}
		if($cidr == 19){$mascara_binaria = "11111111.11111111.11100000.00000000";}
		if($cidr == 20){$mascara_binaria = "11111111.11111111.11110000.00000000";}
		if($cidr == 21){$mascara_binaria = "11111111.11111111.11111000.00000000";}
		if($cidr == 22){$mascara_binaria = "11111111.11111111.11111100.00000000";}
		if($cidr == 23){$mascara_binaria = "11111111.11111111.11111110.00000000";}
		if($cidr == 24){$mascara_binaria = "11111111.11111111.11111111.00000000";}
		if($cidr == 25){$mascara_binaria = "11111111.11111111.11111111.10000000";}
		if($cidr == 26){$mascara_binaria = "11111111.11111111.11111111.11000000";}
		if($cidr == 27){$mascara_binaria = "11111111.11111111.11111111.11100000";}
		if($cidr == 28){$mascara_binaria = "11111111.11111111.11111111.11110000";}
		if($cidr == 29){$mascara_binaria = "11111111.11111111.11111111.11111000";}
		if($cidr == 30){$mascara_binaria = "11111111.11111111.11111111.11111100";}
		if($cidr == 31){$mascara_binaria = "11111111.11111111.11111111.11111110";}
		if($cidr == 32){$mascara_binaria = "11111111.11111111.11111111.11111111";}
		
		return($mascara_binaria);
		
	}
/*verifica qual é a máscara CIDR e retorna a mascara binária*/


/*verifica qual é a classe da Mascara*/
	function VerificaClasseMascara($cird_classe){
		if($cird_classe >= 8 and $cird_classe <= 17){ $classe_mascara = "A"; } else {
			if($cird_classe >= 16 and $cird_classe <= 23){ $classe_mascara = "B"; } else {
				if($cird_classe >= 24 and $cird_classe <= 32){ $classe_mascara = "C"; }
			}
		}
		
		return($classe_mascara);		
	}
/*verifica qual é a classe da Mascara*/ 


/*inverte a máscara*/
	function InverteMascara($octeto_mascara){
		
		$bit_mascara = $octeto_mascara;
		
		for($i = 0; $i < 8; $i++){
			$bit_mascara[$i];
			
			if($bit_mascara[$i] == 1){ $bit_mascara_invertida[$i] = 0; }
			if($bit_mascara[$i] == 0){ $bit_mascara_invertida[$i] = 1; }
		}
		
		
		
		for($i = 0; $i < 8; $i++){
			$octeto_mascara_invertida .= "$bit_mascara_invertida[$i]";
		}
		
		return($octeto_mascara_invertida);
		
	}
/*inverte a máscara*/
	
	
/*realiza a comparação bit a bit pelo operador AND*/	
	function SubRede($octeto_ip, $octeto_mascara){
		for($i = 0; $i < 8; $i++){
			$octeto_ip[$i];
		}
		
		for($i = 0; $i < 8; $i++){
			$octeto_mascara[$i];
		}
	
		for($i = 0; $i < 8; $i++){
			
			if($octeto_ip[$i] == 1 and $octeto_mascara[$i] == 1){$octeto_s_r[$i] = 1;}
			if($octeto_ip[$i] == 1 and $octeto_mascara[$i] == 0){$octeto_s_r[$i] = 0;}
			if($octeto_ip[$i] == 0 and $octeto_mascara[$i] == 1){$octeto_s_r[$i] = 0;}
			if($octeto_ip[$i] == 0 and $octeto_mascara[$i] == 0){$octeto_s_r[$i] = 0;}
			
		}
		
		for($i = 0; $i < 8; $i++){
			$octeto_sub_rd .= "$octeto_s_r[$i]";
		}
		
		return($octeto_sub_rd);
	}
/*realiza a comparação bit a bit pelo operador AND*/	
	
	
/*realiza a comparação bit a bit pelo operador OR*/	
	function BroadCast($octeto_ip, $octeto_mascara_invertida){
		for($i = 0; $i < 8; $i++){
			$octeto_ip[$i];
		}
		
		for($i = 0; $i < 8; $i++){
			$octeto_mascara_invertida[$i];
		}
	
		for($i = 0; $i < 8; $i++){
			
			if($octeto_ip[$i] == 0 and $octeto_mascara_invertida[$i] == 0){
				$octeto_b_c[$i] = 0;
			}else{
				$octeto_b_c[$i] = 1;
			}
			
		}
		
		for($i = 0; $i < 8; $i++){
			$octeto_broadcast .= "$octeto_b_c[$i]";
		}
		
		return($octeto_broadcast);
	}
/*realiza a comparação bit a bit pelo operador OR*/
	
	

/*pega os resultados bínários e adiciona 0s à esquerda se necessário*/	
	for($i = 1; $i <= 4; $i++){		
		if($i == 1){ $a_completar = $octeto_ip[1]; }
		if($i == 2){ $a_completar = $octeto_ip[2]; }
		if($i == 3){ $a_completar = $octeto_ip[3]; }
		if($i == 4){ $a_completar = $octeto_ip[4]; }
	
		$ip_binario[$i] = CompletaBinario($a_completar);	
	}
/*pega os resultados bínários e adiciona 0s à esquerda se necessário*/
	
	echo "IP ------.- $ip_binario[1].$ip_binario[2].$ip_binario[3].$ip_binario[4]<br>";
	
/*pega a máscara CIDR e faz a conversao para binario em padrao normal*/	
	$mascara = CIDR_Mascara($mascara_cidr);	
	
	list($octeto_mascara[1], $octeto_mascara[2], $octeto_mascara[3], $octeto_mascara[4]) = explode(".", $mascara); //divide a mascara padrao em 4 octetos separando por . e armazena cada octeto em uma variavel
/*pega a máscara CIDR e faz a conversao para binario em padrao normal*/	
	
	
	echo "Máscara - $octeto_mascara[1].$octeto_mascara[2].$octeto_mascara[3].$octeto_mascara[4]<br><br>";
	
/*pega os octetos da máscara padrão e converte para decimal armazenando na variavel $mascara_decimal*/
	$mascara_decimal = BinarioDecimal($octeto_mascara[1], $octeto_mascara[2], $octeto_mascara[3], $octeto_mascara[4]);
	
echo "Máscara decimal - $mascara_decimal";	


	echo "<br>----------------------------------------------------------------------------<br>";

	
/*pega os 4 octetos do ip e da mascara e aplica a funcao que faz o calculo da subrede*/
	for($j = 1; $j <= 4; $j++){			
		$bit_a_bit_ip = $ip_binario[$j];
		$bit_a_bit_mascara = $octeto_mascara[$j];
			
		$octeto_sub_rede[$j] = SubRede($bit_a_bit_ip, $bit_a_bit_mascara);//função que realiza a verificação bit-a-bit pelo operador AND		
	}
/*pega os 4 octetos do ip e da mascara e aplica a funcao que faz o calculo da subrede*/
	
echo "sub-rede - $octeto_sub_rede[1].$octeto_sub_rede[2].$octeto_sub_rede[3].$octeto_sub_rede[4]<br><br>";

	$sub_rede_decimal = BinarioDecimal($octeto_sub_rede[1], $octeto_sub_rede[2], $octeto_sub_rede[3], $octeto_sub_rede[4]);
	
echo "sub-rede decimal - $sub_rede_decimal<br><br>";	

/*pega os 4 octetos da máscara e aplica em cada octeto a função que inverte os bits*/	
	for($i = 1; $i <= 4; $i++){			
		$mascara_inverter = $octeto_mascara[$i];
			
		$octeto_mascara_invertida[$i] = InverteMascara($mascara_inverter);//função que inverte a máscara fazendo com que onde é 1 vire 0 e onde é 0 vire 1		
	}
/*pega os 4 octetos da máscara e aplica em cada octeto a função que inverte os bits*/
	
echo "máscara invertida - $octeto_mascara_invertida[1].$octeto_mascara_invertida[2].$octeto_mascara_invertida[3].$octeto_mascara_invertida[4]<br><br>";	

/*faz um for que vai repetir 4 vezes e em cada vez pega um octeto do ip e outro da máscara invertida e realiza a funcao pra obter o BROADCAST*/
	for($j = 1; $j <= 4; $j++){				
		$broadcast_ip = $ip_binario[$j];
		$broadcast_mascara = $octeto_mascara_invertida[$j];
			
		$octeto_broadcast[$j] = BroadCast($broadcast_ip, $broadcast_mascara);//esta função faz a verificação bit-a-bit pelo operador OR	
	}
/*faz um for que vai repetir 4 vezes e em cada vez pega um octeto do ip e outro da máscara invertida e realiza a funcao pra obter o BROADCAST*/
	
echo "broadcast - $octeto_broadcast[1].$octeto_broadcast[2].$octeto_broadcast[3].$octeto_broadcast[4]<br><br>";

	$broad_decimal = BinarioDecimal($octeto_broadcast[1], $octeto_broadcast[2], $octeto_broadcast[3], $octeto_broadcast[4]);
	
echo "broadcast decimal - $broad_decimal<br><br>";

/*esta função pega a máscara no padrão CIDR e verifica a qual classe ela pertense retornando A, B ou C */
	$classe = VerificaClasseMascara($mascara_cidr);
/*esta função pega a máscara no padrão CIDR e verifica a qual classe ela pertense retornando A, B ou C */
	echo "Classe --- $classe<br>";
	
	
	
/*verifica qual é a classe da Mascara com a formula 2^n onde n é o numero de bits exedentes da mascara*/
	if($classe == "A"){ 
		$bits_sobrando = $mascara_cidr - 8; 
	}
	if($classe == "B"){ 
		$bits_sobrando = $mascara_cidr - 16; 
	}
	if($classe == "C"){ 
		$bits_sobrando = $mascara_cidr - 24; 
	}	
		
	$numero_sub_redes = pow(2, $bits_sobrando);//númenro de SUB-REDES
/*verifica qual é a classe da Mascara com a formula 2^n onde n é o numero de bits exedentes da mascara*/

echo "Número de sub-redes ---- $numero_sub_redes<br><br>";


/*calcula a quantidade de HOSTS com a formula 2^n-2 onde n é o numero de bits desocupados da mascara*/
	$n_dos_hosts = (32 - $mascara_cidr);
	$numero_hosts = pow(2, $n_dos_hosts) - 2;//número de HOSTS
/*calcula a quantidade de HOSTS com a formula 2^n-2 onde n é o numero de bits desocupados da mascara*/

echo "Número de HOSTS ---- $numero_hosts";

	//A variavel $ip tráz o IP ao qual serão realizadas todas as funçoes
	//A variavel $mascara_cidr tráz a máscara no padrão CIDR
	//IP esta dividido em 4 octetos binários = $octeto_ip[1] $octeto_ip[2] $octeto_ip[3] $octeto_ip[4]
	//Máscara está dividida em 4 octetoc binários = $octeto_mascara[1] $octeto_mascara[2] $octeto_mascara[3] $octeto_mascara[4]
	//Máscara convertida em decimal está na variavel = $mascara_decimal
	//Rede está dividida em 4 octetos binários = $octeto_sub_rede[1] $octeto_sub_rede[2] $octeto_sub_rede[3] $octeto_sub_rede[4]
	//Rede convertida em decimal está na variavel $sub_rede_decimal
	//Máscara invertida está dividida em 4 octetos binários = $octeto_mascara_invertida[1] $octeto_mascara_invertida[2] $octeto_mascara_invertida[3] $octeto_mascara_invertida[4]
	//Broadcast está dividido em 4 octetos binários = $octeto_broadcast[1] $octeto_broadcast[2] $octeto_broadcast[3] $octeto_broadcast[4]
	//Broadcast convertido em decimal está na variavel $broad_decimal
	//Classe da máscara está na variavel = $classe
	//Número de SUB-REDES está na variavel = $numero_sub_redes
	//Número de HOSTS está na variavel = $numero_hosts
	
	
echo "<br>----------------------------------------------------------------------------<br>";
	
	$resultado_divisao = 256/$numero_sub_redes;
	
	
/* Monta as sub redes com rede, host inicial, host final e broadcast da classe A*/
	if($classe == "A"){
		list($broa[1], $broa[2], $broa[3], $broa[4]) = explode(".", $broad_decimal);
		for($i = 1; $i <= $numero_sub_redes; $i++){
			
			  if($i == 1){
				  $oc_p = $resultado_divisao - 1;
				  
				  echo "
				  $broa[1].0.0.0<br>
				  $broa[1].0.0.1<br>
				  $broa[1].$oc_p.255.254<br>
				  $broa[1].$oc_p.255.255<br><br>
				  ";
			  }else{
				  
				  $oc_a = $oc_a + $resultado_divisao;
				  
				  
				  $oc_p = $oc_p + $resultado_divisao;
				  
				  echo "
				  $broa[1].$oc_a.0.0<br>
				  $broa[1].$oc_a.0.1<br>
				  $broa[1].$oc_p.255.254<br>
				  $broa[1].$oc_p.255.255<br><br>
				  ";
			  }
						
		}
	}
/* Monta as sub redes com rede, host inicial, host final e broadcast da classe A*/



/* Monta as sub redes com rede, host inicial, host final e broadcast da classe B*/
	if($classe == "B"){
		list($broa[1], $broa[2], $broa[3], $broa[4]) = explode(".", $broad_decimal);
		for($i = 1; $i <= $numero_sub_redes; $i++){
			
			  if($i == 1){
				  $oc_p = $resultado_divisao - 1;
				  
				  echo "
				  $broa[1].$broa[2].0.0<br>
				  $broa[1].$broa[2].0.1<br>
				  $broa[1].$broa[2].$oc_p.254<br>
				  $broa[1].$broa[2].$oc_p.255<br><br>
				  ";
			  }else{
				  
				  $oc_a = $oc_a + $resultado_divisao;
				  
				  
				  $oc_p = $oc_p + $resultado_divisao;
				  
				  echo "
				  $broa[1].$broa[2].$oc_a.0<br>
				  $broa[1].$broa[2].$oc_a.1<br>
				  $broa[1].$broa[2].$oc_p.254<br>
				  $broa[1].$broa[2].$oc_p.255<br><br>
				  ";
			  }
						
		}
	}
/* Monta as sub redes com rede, host inicial, host final e broadcast da classe B*/



/* Monta as sub redes com rede, host inicial, host final e broadcast da classe C*/
	if($classe == "C"){
		list($broa[1], $broa[2], $broa[3], $broa[4]) = explode(".", $broad_decimal);
		for($i = 1; $i <= $numero_sub_redes; $i++){
			
			  if($i == 1){
				  $oc_p = $resultado_divisao - 1;
				  
				  echo "
				  $broa[1].$broa[2].$broa[3].0<br>
				  $broa[1].$broa[2].$broa[3].1<br>
				  $broa[1].$broa[2].$broa[3].".($oc_p - 1)."<br>
				  $broa[1].$broa[2].$broa[3].$oc_p<br><br>
				  ";
			  }else{
				  
				  $oc_a = $oc_a + $resultado_divisao;
				  
				  
				  $oc_p = $oc_p + $resultado_divisao;
				  
				  echo "
				  $broa[1].$broa[2].$broa[3].$oc_a<br>
				  $broa[1].$broa[2].$broa[3].".($oc_a + 1)."<br>
				  $broa[1].$broa[2].$broa[3].".($oc_p - 1)."<br>
				  $broa[1].$broa[2].$broa[3].$oc_p<br><br>
				  ";
			  }
						
		}
	}
/* Monta as sub redes com rede, host inicial, host final e broadcast da classe C*/
	
?>