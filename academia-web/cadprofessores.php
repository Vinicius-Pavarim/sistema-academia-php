<?php
    
include "includes/autentica.php";

	 //Abre conexão com o MySQL
	 $conn = mysqli_connect("localhost", "root", "", "academia");

	 if($conn == false){
		 die("ERRO: Não conectou com o BD!");
	 }

	 $id = "";
	 $nome = "";
	 $cpf = "";
	 $telefone = "";

	 //Se existir GET de ID
	 //Se a tela esta sendo aberta para edição
	 if(isset($_GET['id'])){

		//Obtém o parametro ID que foi enviado via GET
		$id = $_GET['id'];

		//Monta o comando SQL para buscar as informações cadastradas
		$sql = "SELECT * FROM professores WHERE id = $id";

		//Envio da consulta ao MySQL
		$res = mysqli_query($conn, $sql);
		//Armazena o registro encontrado
		$row = mysqli_fetch_assoc($res);

		//Guarda os valores nas variáveis
		$nome = $row['nome'];
		$cpf = $row['cpf'];
		$telefone = $row['telefone'];

	 }

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Academia - Área restrita - Cadastro de professores</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
	
		<header>
		  <h2>Cadastro de Professores</h2>
		</header>
		
		<section>
		  <nav>
			<ul id="menu">
				<li><a href="inicio.php">Inicio</a></li>
				<li><a href="cadusuarios.php">Cad. usuários</a></li>
				<li><a href="cadalunos.php">Cad. alunos</a></li>
				<li><a href="cadprofessores.php" class="active">Cad. professores</a></li>
			</ul>
		  </nav>
		  
		  <article>
		
		  <form action="recebeprofessor.php" method="post">
			
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
		
			<label for="nome">Nome</label> 
			<input type="text" name="nome" value="<?php echo $nome; ?>" />
			

			<label for="cpf">CPF</label>
			<input type="text" name="cpf" value="<?php echo $cpf; ?>"  />


			<label for="telefone">Telefone/celular</label>
			<input type="text" name="telefone"  value="<?php echo $telefone; ?>"  />

			<input type="submit">
			
			</form>
			<a href="inicio.html">Voltar</a>
		</article>
		</section>

		<footer>
		  <p>&copy; 2023 Todos os direitos reservados</p>
		</footer>
	</body>
</html>