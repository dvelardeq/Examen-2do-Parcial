<?php
  include "cabecera.inc.php";
?>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">INICIO DE SESIÓN</h2>

  <form class="login-container" action="controlusuario.php" method="GET">
    <p><input type="text" name="usuario" placeholder="Usuario"></p>
    <p><input type="password" name="contrasena" placeholder="Contraseña"></p>
    <p><input type="submit" name="Ingresar" value="Ingresar"></p>
  </form>
</div>
<?php
  include "pie.inc.php";
?>