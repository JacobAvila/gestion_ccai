<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/gestionccai">CCAI - TESE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          
        </li>
        <li class="nav-item">
          
        </li>
        <li class="nav-item dropdown">
          
        </li>
        <li class="nav-item">
          
        </li>
        <li class="nav-item">
          
        </li>
      </ul>
      <div class="d-flex align-middle">
        <ul class="navbar-nav me-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user-o fa-lg"></i> <?php echo $user->nombres." ".$user->apellido_1." ".$user->apellido_2; ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $home.'app/investigadores/perfil'; ?>"><div class="fa fa-user-o left"></div> Mi Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $home.'ingreso/logout.php'; ?>"><i class="fa fa-power-off left"></i> Salir</a>
                </div>
            </li>
        </ul>
    </div>
    </div>
  </div>
</nav>


