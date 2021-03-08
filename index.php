<!doctype html>
<html lang="pt-br">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<title>Votação</title>
</head>
<body>

	<div class="container">



		<div class="row">



			<div class="col-md-6">	
				<h1>Votação</h1>
				<hr>
				<h4>Escolha uma opção?</h4>


				<div class="form-check">
					<input class="form-check-input" type="radio" name="alternativa" id="opcao1" value="1">
					<label class="form-check-label" for="opcao1">
						Primeira Opção
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="alternativa" id="opcao2" value="2">
					<label class="form-check-label" for="opcao2">
						Segunta Opção
					</label>
				</div>

				<div class="form-check">
					<input class="form-check-input" type="radio" name="alternativa" id="opcao3" value="3">
					<label class="form-check-label" for="opcao3">
						Terceira Opção
					</label>
				</div>

				<button type="button" class="btn btn-success" onclick="execVoto()">Votar</button>

			</div>

			<div class="col-md-6">

			    <h1>Resultado</h1>
				<hr>
				<h4>Clique para ver o resultado</h4>	
                
                <button type="button" class="btn btn-success" onclick="execResultado()">Ver resultado</button>


                <br>

                <div id="resultadoVotacao"></div>
			</div>



		</div>


		<div id="resultado"></div>

	</div>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>


function execVoto(){  


	var alternativaVoto = $("input[name='alternativa']:radio:checked").val();




    	$("#opcao1").prop("checked", false);
        $("#opcao2").prop("checked", false);
        $("#opcao3").prop("checked", false);



	$.ajax({
	     url : "http://localhost:8000/api/app.php",
	     type : 'post',
	     dataType: "json",
	     data : {
	          alternativa : alternativaVoto,
	          acao: 'adicionar'
	     },
	     beforeSend : function(){
	          $("#resultado").html("ENVIANDO...");
	     }
	})
	.done(function(msg){
	     $("#resultado").html(msg);
	})
	.fail(function(jqXHR, textStatus, msg){
	     $("#resultado").html(msg);
	});




}



function execResultado(){  


	


	$.ajax({
	     url : "http://localhost:8000/api/app.php",
	     type : 'post',
	     dataType: "json",
	     data : {
	          acao: 'resultado'
	     },
	     beforeSend : function(){
	          // $("#resultado").html("ENVIANDO...");
	     }
	})
	.done(function(msg){

		 var html = '<div style="margin-top: 10px;">Opção Vencedora: ' + msg.vencedor + ' </div><div>Quantidade de Votos: ' + msg.quantidade_votos + '</div>';

	     $("#resultadoVotacao").html(html);
     

	})
	.fail(function(jqXHR, textStatus, msg){
	     $("#resultado").html(msg);
	});




}






</script>



</body>
</html>

