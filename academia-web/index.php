<!DOCTYPE html>
<html>
	<head>
		<title>Academia - Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
	
		<header>
		  <h2>Academia - Login</h2>
		</header>
		
		<div>
			<p style="text-align:center">Por favor, realize o login para acessar a área restrita.</p>

            <?php
    if(isset($_GET['erro'])) {
        echo '<p style="text-align:center;color:red">Usuário e/ou senha incorreto(s).</p>';
    }
    if(isset($_GET['autentica'])) {
        echo '<p style="text-align:center;color:red">Você não tem permissão de acesso.</p>';
    }
?>

			<form action="login.php" method="post">
			
				<label for="email">E-mail</label> 
				<input type="text" name="email" id="email"/>
				
				<label for="senha">Senha</label> 
				<input type="password" name="senha" id="senha" /><br/><br/>
				
				<input type="submit" value="Autenticar">
			
			</form>
		</div>
		
		

		<footer>
		  <p>&copy; 2023 Todos os direitos reservados</p>
		</footer>
	</body>
</html>