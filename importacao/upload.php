<!DOCTYPE html>
<html lang="en">




<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cardápio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="../assets/fontawesome-free-5.15.1/css/all.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp - v2.2.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


  <style type="text/css">
    td {
      font-size: 16px;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="../index.php">Cardápio<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../inc/admin.php">Admin</a></li>
            <li>Upload</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


    <section id="return" class="return">
      <div class="container aos-init aos-animate" data-aos="zoom-in">
        <div id="retorno" class="text-center">


<?php

/* Seta configuração para não dar timeout */
ini_set('max_execution_time','-1');
error_reporting(E_ALL);
ini_set("display_errors", 1);

/* Require com a classe de importação construída */
require 'ImportaPlanilha.php';
require_once('../config/conexao.php');

$filiaisPr = array();
$filiaisDc = array();


$target_dirPr = "filiais/principal/";
$target_dirDc = "filiais/duchef/";


if (empty($_FILES["sm"]["name"]) && empty($_FILES["sscu"]["name"]) && empty($_FILES["ssca"]["name"]) && empty($_FILES["smDc"]["name"]) && empty($_FILES["sscuDc"]["name"]) && empty($_FILES["sscaDc"]["name"])) {
    echo 'Nenhum arquivo selecionado!';
}








///CARDÁPIOS PRINCIPAIS
$extension  = pathinfo($_FILES["sm"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dirPr . basename("1.".$extension);

if(isset($_POST["submit"])) {
	if($_FILES["sm"]["name"] != ''){
		if ($extension == "xlsx") {
			if (move_uploaded_file($_FILES["sm"]["tmp_name"], $target_file)) {
			    echo "O arquivo ". htmlspecialchars( basename( $_FILES["sm"]["name"])). " foi carregado com sucesso!<br>";
			    array_push($filiaisPr,"1");
			} else {
				echo "Ocorreu um erro ao carregar o arquivo.<br>";
			}
		}else{
			echo "Arquivo possui extensão inválida.<br>";
		}
	}
}



$extension  = pathinfo($_FILES["sscu"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dirPr . basename("12.".$extension);

if(isset($_POST["submit"])) {
	if($_FILES["sscu"]["name"] != ''){
		if ($extension == "xlsx") {
			if (move_uploaded_file($_FILES["sscu"]["tmp_name"], $target_file)) {
			    echo "O arquivo ". htmlspecialchars( basename( $_FILES["sscu"]["name"])). " foi carregado com sucesso!<br>";
			    array_push($filiaisPr,"12");
			} else {
				echo "Ocorreu um erro ao carregar o arquivo.<br>";
			}
		}else{
			echo "Arquivo possui extensão inválida.<br>";
		}
	}
}


$extension  = pathinfo($_FILES["ssca"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dirPr . basename("13.".$extension);

if(isset($_POST["submit"])) {
	if($_FILES["ssca"]["name"] != ''){
		if ($extension == "xlsx") {
			if (move_uploaded_file($_FILES["ssca"]["tmp_name"], $target_file)) {
			    echo "O arquivo ". htmlspecialchars( basename( $_FILES["ssca"]["name"])). " foi carregado com sucesso!<br>";
			    array_push($filiaisPr,"13");
			} else {
				echo "Ocorreu um erro ao carregar o arquivo.<br>";
			}
		}else{
			echo "Arquivo possui extensão inválida.<br>";
		}
	}
}








///CARDÁPIOS DUCHEF
$extension  = pathinfo($_FILES["smDc"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dirDc . basename("1.".$extension);

if(isset($_POST["submit"])) {
  if($_FILES["smDc"]["name"] != ''){
    if ($extension == "xlsx") {
      if (move_uploaded_file($_FILES["smDc"]["tmp_name"], $target_file)) {
          echo "O arquivo ". htmlspecialchars( basename( $_FILES["smDc"]["name"])). " foi carregado com sucesso!<br>";
          array_push($filiaisDc,"1");
      } else {
        echo "Ocorreu um erro ao carregar o arquivo.<br>";
      }
    }else{
      echo "Arquivo possui extensão inválida.<br>";
    }
  }
}



$extension  = pathinfo($_FILES["sscuDc"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dirDc . basename("12.".$extension);

if(isset($_POST["submit"])) {
  if($_FILES["sscuDc"]["name"] != ''){
    if ($extension == "xlsx") {
      if (move_uploaded_file($_FILES["sscuDc"]["tmp_name"], $target_file)) {
          echo "O arquivo ". htmlspecialchars( basename( $_FILES["sscuDc"]["name"])). " foi carregado com sucesso!<br>";
          array_push($filiaisDc,"12");
      } else {
        echo "Ocorreu um erro ao carregar o arquivo.<br>";
      }
    }else{
      echo "Arquivo possui extensão inválida.<br>";
    }
  }
}


$extension  = pathinfo($_FILES["sscaDc"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dirDc . basename("13.".$extension);

if(isset($_POST["submit"])) {
  if($_FILES["sscaDc"]["name"] != ''){
    if ($extension == "xlsx") {
      if (move_uploaded_file($_FILES["sscaDc"]["tmp_name"], $target_file)) {
          echo "O arquivo ". htmlspecialchars( basename( $_FILES["sscaDc"]["name"])). " foi carregado com sucesso!<br>";
          array_push($filiaisDc,"13");
      } else {
        echo "Ocorreu um erro ao carregar o arquivo.<br>";
      }
    }else{
      echo "Arquivo possui extensão inválida.<br>";
    }
  }
}









//PRINCIPAL
$x = 0;

while($x < count($filiaisPr)) {

	$path = "./filiais/principal/".$filiaisPr[$x].".xlsx";

	if ($filiaisPr[$x] == '1') {
		$filial = "Servopa Matriz";
	}elseif ($filiaisPr[$x] == '12') {
		$filial = "Servopa Caminhões Curitiba";
	}elseif ($filiaisPr[$x] == '13') {
		$filial = "Servopa Caminhões Cambé";
	}
	/* Instância o objeto importação e passa como parâmetro o caminho da planilha e a conexão PDO */
	$obj = new ImportaPlanilha($path, $conn);

	echo 'Cardápio na filial '.$filial.' atualizado com sucesso!<br><br>';

	/* Chama o método que inseri os dados e captura a quantidade linhas importadas */
	$linhasImportadas = $obj->insertDados($filiaisPr[$x]);

	/* Imprime a quantidade de linhas importadas */
	echo 'Foram importadas ', $linhasImportadas, ' linhas.<br><br><br>';

	$x++;
}




//DUCHEF
$y = 0;

while($y < count($filiaisDc)) {

  $path = "./filiais/duchef/".$filiaisDc[$y].".xlsx";

  if ($filiaisDc[$y] == '1') {
    $filial = "Servopa Matriz";
  }elseif ($filiaisDc[$y] == '12') {
    $filial = "Servopa Caminhões Curitiba";
  }elseif ($filiaisDc[$y] == '13') {
    $filial = "Servopa Caminhões Cambé";
  }
  /* Instância o objeto importação e passa como parâmetro o caminho da planilha e a conexão PDO */
  $obj = new ImportaPlanilha($path, $conn);

  echo 'Cardápio duChef na filial '.$filial.' atualizado com sucesso!<br><br>';

  /* Chama o método que inseri os dados e captura a quantidade linhas importadas */
  $linhasImportadas = $obj->insertDadosDc($filiaisDc[$y]);

  /* Imprime a quantidade de linhas importadas */
  echo 'Foram importadas ', $linhasImportadas, ' linhas.<br><br><br>';

  $y++;
}





?>


          
        </div>
      </div>
    </section>

    <section id="options" >
      <div class="container aos-init aos-animate" data-aos="zoom-in">
        <div class="text-center">
            <a href="../inc/admin.php" class="get-started-btn scrollto" style="color: black;">Voltar</a>
            <a id="logout" onclick="logout()" href="#logout" class="get-started-btn scrollto" style="color: black;">Logout</a>
        </div>
      </div>
    </section>


  </main><!-- End #main -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>



  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

  <script type="text/javascript">
    function logout() {
      $.post("../importacao/validacao.php",{
        function: "logout"
      }, function($result){
        if ($result == 1) {
          window.location.href = "../index.php";
        }else{
          alert("Logout efetuado com sucesso!");
        }
      });
    }

  </script>


</body>

</html>