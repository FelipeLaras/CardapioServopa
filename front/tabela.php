<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();

require_once('../config/conexao.php');
require_once('../inc/query.php');

//Tabela
$queryTabela .= $_GET['filial'];
$resultTabela = $conn->query($queryTabela);
$tabela = $resultTabela->fetch_assoc();

//Refeição Principal
$queryRefeicaoPrincipal .= $_GET['filial'];
$resultRefeicaoPrincipal = $conn->query($queryRefeicaoPrincipal);

//Refeicao Chef
$queryRefeicaoChef .= $_GET['filial'];
$resultRefeicaoChef = $conn->query($queryRefeicaoChef);

//Dia de Hoje
$dia = date('d');

$mes = date('M');

//ID para enviar por e-mail
$_SESSION['id_filial'] = $_GET['filial'];

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cardápio <?= $tabela['nome'] ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.ico" rel="icon">
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
            <li>Cardápio <?= $mes ?></li>
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
          <a href="#principal" class="get-started-btn scrollto" style="color: black;">Principal</a>
          <a href="#duChef" class="get-started-btn scrollto" style="color: black;">Du Chef</a>
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
          <table class="table table-bordered">
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
                echo (empty($refeicaoPrincipal['salada_two'])) ? '------' : $refeicaoPrincipal['prato_one'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['salada_three'])) ? '------' : $refeicaoPrincipal['salada_three'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['salada_four'])) ? '------' : $refeicaoPrincipal['salada_four'];
                echo '</td>
                        <td>';
                echo (empty($refeicaoPrincipal['sobremesa'])) ? '------' : $refeicaoPrincipal['sobremesa'];
                echo '</td>
                      </tr>';
              }

              ?>

            </tbody>
          </table>
        </section>

        <section id="duChef" class="duChef">
          <div class="section-title" id="duChef">
            <h2>refeição</h2>
            <p>refeição du chef</p>
          </div>
          <table class="table table-bordered table-sm">
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
                  <option>Deparmanto...</option>
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
              <div class="error-message" style="display: <?= ($_GET['erro'] == 1) ? 'block' : 'none' ?>;">Sua mensagem possui palavras não autorizadas!</div>
              <div class="sent-message" style="display: <?= ($_GET['msn'] == 1) ? 'block' : 'none' ?>;">Sua mensagem foi enviada. Obrigado!</div>
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

</body>

</html>