<?php
include "includes/autentica.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Academia - Área restrita - Tela inicial</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
	
		<header>
		  <h2>Academia - Painel inicial</h2>
		</header>

		<section>
		  <nav>
			<ul id="menu">
				<li><a href="inicio.php" class="active">Inicio</a></li>
				<li><a href="cadusuarios.php">Cad. usuários</a></li>
				<li><a href="cadalunos.php">Cad. alunos</a></li>
				<li><a href="cadprofessores.php">Cad. professores</a></li>
			</ul>
		  </nav>
		  
		  <article>
			Olá, seja bem-vindo <?php echo $_SESSION['nome']; ?>!<br/>
		
		
		
			<a href="logout.php">Sair</a>
		  </article>
		</section>

		<footer>
		  <p>&copy; 2023 Todos os direitos reservados</p>
		</footer>
	
		
	</body>
</html>