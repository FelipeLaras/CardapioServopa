<!DOCTYPE html>
<html lang="en">
<?php
session_start();

require_once('../config/conexao.php');
require_once('query.php');

//Tabela
$queryTabela .= $_GET['filial'];
$resultTabela = $conn->query($queryTabela);
$tabela = $resultTabela->fetch_assoc();



//Refeição Principal
$queryRefeicaoPrincipalTeste = "SELECT * FROM refeicao_principal WHERE deletar = 0 AND mes = ".date("n")." AND filial = ".$_GET['filial'];
$resultRefeicaoPrincipal = $conn->query($queryRefeicaoPrincipalTeste);


//Refeição Principal Check
$resultRefeicaoPrincipalCheck = $conn->query($queryRefeicaoPrincipalTeste);
$refeicaoPrincipalCheck = $resultRefeicaoPrincipalCheck->fetch_assoc();



//Refeicao Chef
$queryRefeicaoChef = "SELECT * FROM refeicao_chef WHERE deletar = 0 AND mes = ".date("n")." AND filial = ".$_GET['filial'];
$resultRefeicaoChef = $conn->query($queryRefeicaoChef);

//Refeicao Chef Check
$resultRefeicaoChefCheck = $conn->query($queryRefeicaoChef);
$refeicaoChefCheck = $resultRefeicaoChefCheck->fetch_assoc();

if (empty($refeicaoPrincipalCheck['dia']) && !isset($_GET['cardP'])) {
  header('location: tabela.php?filial='.$_GET['filial'].'&cardP=1');
}elseif (empty($refeicaoChefCheck['prato_one']) && !isset($_GET['cardD'])) {
  header('location: tabela.php?filial='.$_GET['filial'].'&cardD=1');
}if ((empty($refeicaoChefCheck['prato_one']) && !isset($_GET['cardD'])) && (empty($refeicaoPrincipalCheck['dia']) && !isset($_GET['cardP']))) {
  header('location: tabela.php?filial='.$_GET['filial'].'&cardP=1&cardD=1');
}


//Dia de Hoje
$dia = date('d');

//ID para enviar por e-mail
$_SESSION['id_filial'] = $_GET['filial'];

$date = new DateTime();
$formatter = new IntlDateFormatter(
   'pt_BR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'America/Sao_Paulo',          
    IntlDateFormatter::GREGORIAN,
    'MMMM'
  );
$mesatual = ucfirst($formatter->format($date));


if(isset($_GET['erro'])){
  $erro = $_GET['erro'];
}else{
  $erro = 0;
}

if(isset($_GET['msn'])){
  $mensagem = $_GET['msn'];
}else{
  $mensagem = 0;
}

?>

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
            <li>Cardápio <?php echo $mesatual; ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="clients" class="clients">
      <div class="container aos-init aos-animate" data-aos="zoom-in">
        <div class="text-center">
          <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
              <br />
              <h2><?= $tabela['nome'] ?></h2>
              <br />
            </div>
          </div>
          <a href="#hojeP" class="get-started-btn scrollto" style="color: black;">Principal</a>
          <a href="#hojeD" class="get-started-btn scrollto" style="color: black;">Du Chef</a>
          <a href="#contact" class="get-started-btn scrollto" style="color: black;">Comentários</a>
        </div>
      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <section id="principal" class="principal">
          <div class="section-title">
            <h2>refeição</h2>
            <p>refeição principal</p>
          </div>

          <?php  if(isset($_GET['cardP'])){

            echo "Estamos atualizando, favor aguarde!";

          }else{ ?>

          <div id="reference" style="overflow-x: auto;">
          <table class="table table-bordered principal" id="tblPrincipal">
            <thead>
              <tr>
                <th scope="col">Dia</th>
                <th scope="col">Prato Principal</th>
                <th scope="col">Prato Principal</th>
                <th scope="col">Guarnição</th>
                <th scope="col">Guarnição</th>
                <th scope="col">Salada</th>
                <th scope="col">Salada</th>
                <th scope="col">Salada</th>
                <th scope="col">Salada</th>
                <th scope="col">Sobremesa</th>
                <th scope="col">Sobremesa</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($refeicaoPrincipal = $resultRefeicaoPrincipal->fetch_assoc()) {
                echo '<tr>
                        <th scope="row">' . $refeicaoPrincipal['dia'] . '</th>
                        <td>';
                echo (empty($refeicaoPrincipal['prato_one'])) ? '------' : $refeicaoPrincipal['prato_one'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['prato_two'])) ? '------' : $refeicaoPrincipal['prato_two'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['guarnicao_one'])) ? '------' : $refeicaoPrincipal['guarnicao_one'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['guarnicao_two'])) ? '------' : $refeicaoPrincipal['guarnicao_two'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['salada_one'])) ? '------' : $refeicaoPrincipal['salada_one'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['salada_two'])) ? '------' : $refeicaoPrincipal['salada_two'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['salada_three'])) ? '------' : $refeicaoPrincipal['salada_three'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['salada_four'])) ? '------' : $refeicaoPrincipal['salada_four'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['sobremesa_one'])) ? '------' : $refeicaoPrincipal['sobremesa_one'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['sobremesa_two'])) ? '------' : $refeicaoPrincipal['sobremesa_two'];
                echo '</td>
                      </tr>';
              }

              ?>

            </tbody>
          </table>
          </div>

        <?php } ?>
        </section>

        <section id="duChef" class="duChef">
          <div class="section-title" id="duChef">
            <h2>refeição</h2>
            <p>refeição du chef</p>
          </div>

          <?php  if(isset($_GET['cardD'])){

            echo "Estamos atualizando, favor aguarde!";

          }else{ ?>


          <table class="table table-bordered duChef">
            <thead>
              <tr>
                <th scope="col">Dia</th>
                <th scope="col">Prato Principal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($refeicaoChef = $resultRefeicaoChef->fetch_assoc()) {
                echo '
                <tr>
                  <th scope="row">' . $refeicaoChef['dia'] . '</th>
                  <td>';
                echo (empty($refeicaoChef['prato_one'])) ? '------' : $refeicaoChef['prato_one'];
                echo '</td>
                </tr>';
              }
              ?>
            </tbody>
          </table>

          <?php } ?>
        </section>
      </div>
    </section>

    <section id="contact" class="contact">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h2>comentário</h2>
          <p>deixe seu comentário</p>
        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
          <form method="post" Class="php-email-form" action="email.php">
            <div class="form-group">
              <input type="text" class="form-control" name="nome" id="subject" placeholder="Nome" required>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <select name="empresa" class="form-control" id="empresa" data-rule="required" data-msg="Selecione Empresa">
                  <option>Empresa...</option>
                  <?php

                  while ($empresa = $resultEmpresa->fetch_assoc()) {
                    echo '<option value="' . $empresa['nome'] . '">' . $empresa['nome'] . '</option>';
                  }

                  ?>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <select name="departamento" class="form-control" id="departamento" require>
                  <option>Departamento...</option>
                  <?php

                  while ($departamento = $resultDepart->fetch_assoc()) {
                    echo '<option value="' . $departamento['nome'] . '">' . $departamento['nome'] . '</option>';
                  }

                  ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <textarea class="form-control" name="comentario" rows="5" data-rule="required" data-msg="Insirá o seu comentário!" placeholder="Comentário"></textarea>
              <div class="validate"></div>
            </div>

            <div class="mb-3">
              <div class="error-message" style="display:<?php if($erro == 1){ echo 'block'; }else{echo 'none';}  ?>;">Sua mensagem possui palavras não autorizadas!</div>
              <div class="sent-message" style="display:<?php if($mensagem == 1){ echo 'block'; }else{echo 'none';} ?>;">Sua mensagem foi enviada. Obrigado!</div>
            </div>
            <div class="text-center"><button type="submit">Enviar</button></div>
          </form>

        </div>

      </div>

      </div>
    </section>


    </div>

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


    var table = $('#tblPrincipal');
    var row = table.find('tr')
        .eq(<?php echo $dia; ?>)
        .attr('id', 'hojeP');
    
    if (row.length){
       window.location.href = "#hojeP";
        //alert(row.offset().top - (w.height()/2));
    }

    $('.principal tr:eq('+<?php echo $dia; ?>+')').css({ 'background-color': '#ccc' } );

    $('.duChef tr:eq('+<?php echo $dia; ?>+')').css({ 'background-color': '#ccc' } );


    var table2 = $('.duChef');
    var row2 = table2.find('tr')
        .eq(<?php echo $dia; ?>)
        .attr('id', 'hojeD');
    
    $('.principal tr:eq('+<?php echo $dia; ?>+')').css({ 'background-color': '#ccc' } );

    $('.duChef tr:eq('+<?php echo $dia; ?>+')').css({ 'background-color': '#ccc' } );


  </script>

</body>

</html>