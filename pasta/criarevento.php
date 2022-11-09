<?php
    include("verifica_login.php");
    include("banco.php"); // caminho do seu arquivo de conexão ao banco de dados 
    $host = "127.0.0.1";  
    $db   = "qualeaboa";     
    $user = "root";       
    $pass = "";           

    $conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
    $consulta = "SELECT * FROM usuario"; 
    $con = $conn->query($consulta) or die($conn->error);


?>

    <html>
		<head>
			<meta charset='utf-8'>
		</head>
		<body>
		<h1>CRIAÇÃO DE EVENTOS</h1>
		<HR>
			<form action='evento.php' method='GET'>
				PREENCHA OS DADOS: <BR>
				<br>NOME: <input type='text' name='nome_evento'> <br>
				<br>ENDEREÇO: <input type='text' name='local_evento'> <br>			
				<br>CIDADE: <input type='text' name='cidade'> <br>
				<br>DATA:<input type='date' name='data_evento'> <br>
				<br>HORA:<input type='time' name='hora'> <br>
				<br>PREÇO:<input type='text' name='preco'> <br>
				<br>CLASSIFICAÇÃO INDICATIVA:<input type='int' name='classificacao_indicativa'> <br>			
				<br>ASSUNTO:<input type='text' name='assunto'> <br>
				<br>DESCRIÇÃO:<input type='textarea' name='descricao'> <br>
				<br>AUTOR:<input name='autor' value='<?php echo $_SESSION['login']?>'><br><br>
				<input type='hidden' name='op' value='1'>
				<input type='submit' name='entrada' value='CRIAR'>
				<input type='reset' name='limpar' value='LIMPAR'>
			</form>
		</body>
		</html>	