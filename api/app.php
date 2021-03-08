<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');




session_start();

$arrayPost = $_POST;




if($arrayPost['acao'] == "adicionar"){


	if($arrayPost['alternativa'] == 1){

		$_SESSION['opcao1'] = $_SESSION['opcao1'] + 1;

	}


	if($arrayPost['alternativa'] == 2){

		$_SESSION['opcao2'] = $_SESSION['opcao2'] + 1;

	}



	if($arrayPost['alternativa'] == 3){

		$_SESSION['opcao3'] = $_SESSION['opcao3'] + 1;

	}


  echo json_encode('Voto realizado com sucesso!');

}






if($arrayPost['acao'] == "resultado"){


	$arraTotais = array();

	$arraTotais[] = $_SESSION['opcao1'];
	$arraTotais[] = $_SESSION['opcao2'];
	$arraTotais[] = $_SESSION['opcao3'];



	if(max($arraTotais) == $_SESSION['opcao1']){
     
      $msgQtdVotos = $_SESSION['opcao1'];
      $msgOpcaoVencedora = "Opção 1";
	}

    if(max($arraTotais) == $_SESSION['opcao2']){

      $msgQtdVotos = $_SESSION['opcao2'];
      $msgOpcaoVencedora = "Opção 2";

	}

    if(max($arraTotais) == $_SESSION['opcao3']){

      $msgQtdVotos = $_SESSION['opcao3'];
      $msgOpcaoVencedora = "Opção 3";

	}



     unset($_SESSION['opcao1']);
     unset($_SESSION['opcao2']);
     unset($_SESSION['opcao3']);

   

  echo json_encode($dados = array('quantidade_votos' => $msgQtdVotos, 'vencedor' => $msgOpcaoVencedora));
  


}






?>