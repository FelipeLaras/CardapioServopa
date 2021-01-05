<?php
require_once('header.php');

require_once('config/conexao.php');

require_once('inc/query.php');

?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <!-- The video -->
    <video autoplay muted loop id="myVideo">
      <source src="assets/videos/background.mp4" type="video/mp4">
    </video>
    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">

      <div class="container" data-aos="fade-up">
        <div class="col-xl-6 col-lg-8">
          <h1>Escolha sua Filial<span>.</span></h1>
        </div>
      </div>

      <div class="row mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <?php

        while ($home = $resultHome->fetch_assoc()) {
          echo '
          <div class="col-xl-2 col-md-4 col-6">
            <div class="icon-box">
              <h3><a href="front/tabela.php?filial='.$home['id_empresa'].'">'.$home['nome'].'</a></h3>
            </div>
          </div>';
        }?>

      </div>

    </div>
  </section>

</body>

</html>