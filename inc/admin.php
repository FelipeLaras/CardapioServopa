<!DOCTYPE html>
<html lang="en">
<?php

session_start();
//session_destroy();


//Dia de Hoje
$dia = date('d');

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$mesatual = ucfirst(utf8_encode(strftime('%B', strtotime('today'))));

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
            <li>Admin</li>
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
              <h2>Integração dos Cardápios</h2>
              <br />
            </div>
          </div>
            <a id="gerarInt" data-toggle="modal" href="#sscu" class="get-started-btn scrollto" style="color: black;">Gerar Integração dos Cardápios</a>
        </div>
      </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            Login
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <form>
                <div class="form-group">
                  
                  <input type="text" class="form-control" id="user" placeholder="Usuário:">
                </div>
                <div class="form-group">
                  
                  <input type="password" class="form-control" id="pwd" placeholder="Senha:">
                </div>
                <a onclick="validar()" style="background-color: lightblue;" type="button" class="btn btn-default">Autenticar</button>
              </a>
          </div>
          
        </div>
        
      </div>
    </div>


    <section class="buttons" style="padding: 40px 0;">
      <div class="container aos-init aos-animate" data-aos="zoom-in">
        <div id="buttons" class="text-center" style="display: none;">

        </div>
      </div>
    </section>


    <section id="return" class="return" style="padding: 40px 0;">
      <div class="container aos-init aos-animate" data-aos="zoom-in">
        <div id="retorno" class="text-center">
          
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
    var w = $(window);
    var row = table.find('tr')
      .eq(<?php echo $dia; ?>)
      .attr('id', 'hoje');
    
    if (row.length){
      window.location.href = "#hoje";
    }

    $('.principal tr:eq('+<?php echo $dia; ?>+')').css({ 'background-color': '#ccc' } );
    $('.duChef tr:eq('+<?php echo $dia; ?>+')').css({ 'background-color': '#ccc' } );

    function validar() {
      var user = $('#user').val();
      var pass = $('#pwd').val();
      $.post("../importacao/validacao.php",{
        function: "validacaoPadrao",
        user: user,
        pass: pass
      }, function($result){
        if($result[0] == true){

          $("#buttons").html($result.substring(1));
          $(".close").click();
          document.getElementById("buttons").style.display = "block";
          document.getElementById("gerarInt").style.display = "none";

        }else{
          alert("Usuário não validado!");
        }
      });
    }

    $(document).ready(function(){

      $.post("../importacao/validacao.php",{
        function: "validacaoSessao"
      }, function($result){
        if ($result[0] == true) {

          $("#buttons").html($result.substring(1));
          $(".close").click();
          document.getElementById("buttons").style.display = "block";
          document.getElementById("gerarInt").style.display = "none";
        
        }else{

          $("#gerarInt").attr("data-target","#myModal");

        }
      });
    
    });

  </script>

</body>

</html>