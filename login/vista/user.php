<?php include "Parciales/head.php";?>
<?php

 if(isset($_SESSION["usuario"])){
     if($_SESSION["usuario"]["privilegio"]==1){
        header("location:admin.php");
     }
 }else{
    header("location:login.php"); 
 }
 
?>
<?php include "Parciales/menu.php";?>


  <header class="masthead text-center text-white">
    <div class="masthead-content">
      <div class="container text-center">
        <h3 class="masthead-subheading mb-0"><strong>Bienvenido</strong> <?php  echo $_SESSION["usuario"]["nombre"]; ?></h3>
        <p>Panel de Control | <span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Admin' : 'Cliente'; ?></span></p>
        <a href="cerrar-sesion.php" class="btn btn-primary btn-xl rounded-pill mt-5">Cerrar sesión</a>
      </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="img/Estilo.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Mas estilo...</h2>
            <p>Siente la genialidad de mejorar tú estilo, el estar a la moda y ademas de cuidar tu salud visual.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="img/Ayuda.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="p-5">
            <h2 class="display-4">Te ayudamos a mejorar tu Visión!</h2>
            <p>Examina tu vista y consulta las soluciones que tenemos a tus necesidades, vista cansada y borrosa.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="img/Lentes.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Armazones y lentes!</h2>
            <p>Aquí tenemos la mejor calidad y mejores precios, pregunta por nuestros modelos de Armazones.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

   <?php include "Parciales/footer.php";?>