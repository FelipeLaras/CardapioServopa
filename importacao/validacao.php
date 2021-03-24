<?php

session_start();

require_once('../config/conexao.php');

switch ($_POST['function']) {
    case "validacaoPadrao":
        
		if(!empty($_POST['user'])){
			$usuario = $_POST['user'];
			$senha = $_POST['pass'];
		}

		$queryUsuarios = "SELECT * FROM users WHERE user_mail = '".$usuario ."' AND user_pass = '".$senha."'";
		$result = $conn->query($queryUsuarios);
		$row_user = $result->fetch_assoc();

		if(empty($row_user['user_mail'])){

			echo false;//usuário não encontrado

		}else{
			
			//USUÁRIO
			$_SESSION["mail"] = $row_user["user_mail"];
			$_SESSION["senha"] = $row_user["user_pass"];
			
			//ENTRA NO SISTEMAS
			echo true;

			?>

			<h5>Importar Planilhas</h5>
			<br>
			<form action="../importacao/upload.php" method="post" enctype="multipart/form-data">
				<table style="width: 100%;text-align: left;">
				<tr>
					<td></td>
					<td><label><b>Principal</b></label></td>
					<td><label><b>duChef</b></label></td>
				</tr>
				<tr>
					<td><label>Servopa Matriz</label></td>
					<td><input type="file" name="sm" id="sm" class="get-started-btn scrollto" style="color: black;"/></td>
					<td><input type="file" name="smDc" id="smDc" class="get-started-btn scrollto" style="color: black;"/></td>
				</tr>
				<tr>
					<td><label>Servopa Caminhões Curitiba</label></td>
					<td><input type="file" name="sscu" id="sscu" class="get-started-btn scrollto" style="color: black;"/></td>
					<td><input type="file" name="sscuDc" id="sscuDc" class="get-started-btn scrollto" style="color: black;"/></td>
				</tr>
				<tr>
					<td><label>Servopa Caminhões Cambé</label></td>
					<td><input type="file" name="ssca" id="ssca" class="get-started-btn scrollto" style="color: black;"/></td>
					<td><input type="file" name="sscaDc" id="sscaDc" class="get-started-btn scrollto" style="color: black;"/></td>
				</tr>
				</table>
				<br>
				<input type="submit" value="Upload Planilhas" class="get-started-btn" style="color: black;" name="submit">
			</form>

			<?php

		}

		//fecha o banco
		$conn->close();

        break;
    case "validacaoSessao":
        
		if(!empty($_SESSION['mail'])){
			$usuario = $_SESSION['mail'];
			$senha = $_SESSION['senha'];
		}else{
			echo false;
			break;
		}

		$queryUsuarios = "SELECT * FROM users WHERE user_mail = '".$usuario ."' AND user_pass = '".$senha."'";
		$result = $conn->query($queryUsuarios);
		$row_user = $result->fetch_assoc();

		if(empty($row_user['user_mail'])){

			echo false;//usuário não encontrado

		}else{
			
			//USUÁRIO
			$_SESSION["mail"] = $row_user["user_mail"];
			$_SESSION["senha"] = $row_user["user_pass"];
			
			//ENTRA NO SISTEMAS
			echo true;

			?>
			<h5>Importar Planilhas</h5>
			<br>
			<form action="../importacao/upload.php" method="post" enctype="multipart/form-data">
				<table style="width: 100%;text-align: left;">
				<tr>
					<td></td>
					<td><label><b>Principal</b></label></td>
					<td><label><b>duChef</b></label></td>
				</tr>
				<tr>
					<td><label>Servopa Matriz</label></td>
					<td><input type="file" name="sm" id="sm" class="get-started-btn scrollto" style="color: black;"/></td>
					<td><input type="file" name="smDc" id="smDc" class="get-started-btn scrollto" style="color: black;"/></td>
				</tr>
				<tr>
					<td><label>Servopa Caminhões Curitiba</label></td>
					<td><input type="file" name="sscu" id="sscu" class="get-started-btn scrollto" style="color: black;"/></td>
					<td><input type="file" name="sscuDc" id="sscuDc" class="get-started-btn scrollto" style="color: black;"/></td>
				</tr>
				<tr>
					<td><label>Servopa Caminhões Cambé</label></td>
					<td><input type="file" name="ssca" id="ssca" class="get-started-btn scrollto" style="color: black;"/></td>
					<td><input type="file" name="sscaDc" id="sscaDc" class="get-started-btn scrollto" style="color: black;"/></td>
				</tr>
				</table>
				<br>
				<input type="submit" value="Upload Planilhas" class="get-started-btn" style="color: black;" name="submit">
			</form>

			<?php

		}

		//fecha o banco
		$conn->close();

        break;

    case "logout":
        
		session_destroy();

		echo 1;

        break;
}

?>


