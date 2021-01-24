  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../login/vista/index.php">HOME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php if (!isset($_SESSION["usuario"])){?>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="registro.php">Registrate</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log In</a>
          </li>
        </ul>
      </div>
    <?php } else { ?>
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <?php if ($_SESSION["usuario"]["privilegio"] == 1){?>
              <li class="nav-item">
              <a class="nav-link" href="../login/vista/Admin.php">Admin</a>
              <li class="nav-item">
              <a class="nav-link" href="../Menu/Vista/Menu.php">PANEL-CONTROL</a>
            <?php } else { ?>
              <li class="nav-item">
              <a class="nav-link" href="user.php">Usuario</a>
            <?php }?>
          </li>
        </ul>
      </div>
    <?php } ?>
    </div>
  </nav>