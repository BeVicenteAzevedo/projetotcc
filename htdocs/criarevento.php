<?php
    include("verifica_login.php");
    include_once("banco.php"); // caminho do seu arquivo de conexão ao banco de dados 
    $host = "127.0.0.1";  
    $db   = "qualeaboa";     
    $user = "root";       
    $pass = "";       

    $conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
    $consulta = "SELECT * FROM usuario"; 
  
    $con = $conn->query($consulta) or die($conn->error);

	if(!isset($_SESSION))
		{	
			header('Location: index.php');
			exit();
		}


	
      
    
?>

<html>
  <head>
    <title>Qual é a boa?</title>
    <link REL="SHORTCUT ICON" HREF="assets/favicon.ico">
    <script src= "https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      /* background-image: linear-gradient(to right, #a619b3, #4796a8, #bbff9c);; */
      background-color: rgb(255, 255, 255);
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: rgb(0, 0, 0);
      }
      body {
      background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;
      background-size: cover;
      }
      h1, h2 {
      text-transform: uppercase;
      font-weight: 400;
      }
      h2 {
      margin: 0 0 0 8px;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
      padding: 25px;
      background: rgba(0, 0, 0, 0.5); 
      }
      .left-part, form {
      padding: 25px;
      }
      .left-part {
      text-align: center;
      }
      .fa-graduation-cap {
      font-size: 72px;
      }
      /* form {
       background: rgba(0, 0, 0, 0.7);  
      } */
      .lab {
      padding: 8px 10px;
      height: 20px;
      width: 180px;
      background-color: #ffffff;
      /* background-color: #333; */
      color: rgb(0, 0, 0);
      font-family: 'Josefin Sans', sans-serif;
      text-transform: uppercase;
      text-align: center;
      display: block;
      margin-top: 5px;
      cursor: pointer;
      border-radius: 25px;
}
      
      .title {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      }
      .info {
      display: flex;
      flex-direction: column;
      }
      input, select {
      padding: 5px;
      margin-bottom: 30px;
      background: transparent;
      border: none;
      border-bottom: 1px solid rgb(136, 116, 116);
      }
      input::placeholder {
      color: #cfbebe;
      }
      option:focus {
      border: none;
      }
      option {
      background: white; 
      border: none;
      }
      #assunto, .espec {
        color: #363636;
      }
      .checkbox input {
      margin: 0 10px 0 0;
      vertical-align: middle;
      }
      .checkbox a {
      color: #26a9e0;
      }
      .checkbox a:hover {
      color: #85d6de;
      }
      .btn-item, button {
      padding: 10px 5px;
      margin-top: 20px;
      border-radius: 5px; 
      border: none;
      /* background: #26a9e0;  */
      background: black;
      text-decoration: none;
      font-size: 15px;
      font-weight: 400;
      color: #fff;
      }
      .btn-item {
      display: inline-block;
      margin: 20px 5px 0;
      }
      button {
      width: 100%;
      }
      /* button:hover, .btn-item:hover {
      background: #85d6de;
      } */
      @media (min-width: 568px) {
      html, body {
      height: 100%;
      }
      .main-block {
      flex-direction: row;
      height: calc(100% - 50px);
      }
      .left-part, form {
      flex: 1;
      height: auto;
      }
      }
    </style>
  </head>
  <body>
      <form action="evento.php" method="get" enctype="multipart/form-data">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h1>  Criar Evento</h1>
          
        </div>
        
        
        
        <div class="info">
            <label>Nome do evento:</label>
                <input class="fname" type="text" name="nome_evento" placeholder="Nome do Evento" required maxlength="22">
            <label>Endereço: </label> 
                <input type="text" name="local_evento" placeholder="Avenida John Textor, xxx" required>
            <label>Cidade: </label>
				      <select id='cidade' name='cidade'>                 	
                	<option value='Niterói'>Niterói</option>
                	<option value='Itaboraí'>Itaboraí</option>
                	<option value='São Gonçalo'>São Gonçalo</option>
                	<option value='Maricá'>Maricá</option>
                	<option value='Rio de Janeiro'>Rio de Janeiro</option>
            	</select>
            <label>Data: </label>
                <input type="date" name="data_evento" placeholder="" class="espec" required min="2023-01-09">
            <label>Hora: </label>
                <input type="time" name="hora" placeholder="" class="espec" required>
            <label>Preço: </label>
                <input type="number" name="preco" placeholder="90,00" required>
            <label>Classificação Indicativa: </label>
                <input type="int" name="classificacao_indicativa" placeholder="14" maxlength="2">
            <label>Assunto: </label>
            <select id="assunto" name="assunto">              	
                <option value="Acadêmico">Acadêmico</option>
                <option value="Nerd/Geek">Nerd/Geek</option>
                <option value="Artesanato">Artesanato</option>
                <option value="Cinema/Teatro">Cinema/Teatro</option>
                <option value="Show">Show</option>
                <option value="Esportes">Esportes</option>
                <option value="Gastronomia">Gastronomia</option>
                <option value="Política">Política</option>
                <option value="Saúde">Saúde</option>
                <option value="Festa">Festa</option>
                <option value="Tecnologia">Tecnologia</option>
                <option value="Religião">Religião</option>
                <option value="Comédia">Comédia</option>
                <option value="Passeio">Passeio</option>
                <option value="Infantil">Infantil</option>
              </select>

              <label>Região: </label>
            <select id="regiao" name="regiao">
              	
                <option value="Região dos Lagos">Região dos Lagos</option>
                <option value="Niterói">Niterói</option>
            </select>
              <label>Coloque um arquivo de foto do seu evento:</label>
            <!-- <label class="lab" for="arquivo">Enviar arquivo</label> -->
            <input type="file" name="arquivo" accept="image/*">
            <h4><!-- Selected file will get here --></h4>
            <script>
                $(document).ready(function() {
                $('input[type="file"]').change(function(e) {
                var arquivo = e.target.files[0].name; 
                $("h4").text('O arquivo ' + ( arquivo ) + ' foi selecionado');
            });
            });
            </script>
            <label>Descrição: </label>
                <br>
                <textarea class="descricao" cols="35" rows="8" name='descricao'></textarea><br>
            <label>Autor: </label>
                <input readonly required name='autor' value='<?php echo $_SESSION['login']?>'><br><br>
			    <input type='hidden' name='op' value='1'>
        </div>
        <button type="submit" data-toggle="modal" data-target="#modalEvento" name="entrada" value="CRIAR">Criar</button>
        <button type='reset' name='limpar' value='Limpar'>Limpar</button>
      </form>
    </div>
  </body>
</html>