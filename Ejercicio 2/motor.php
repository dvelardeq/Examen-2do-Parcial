<?php
    session_start();
    $FF1 = 0;
    include "cabecera.inc.php";
    include "conexion.inc.php";
    $flujo = $_GET["flujo"];
    $proceso = $_GET["proceso"];
    $sql = "SELECT * FROM flujo_proceso WHERE flujo='$flujo' AND proceso='$proceso'";
    $resultado = mysqli_query($conn, $sql);
    $fila = mysqli_fetch_array($resultado);
    $formulario = $fila["formulario"];
    $ps = $fila["proceso_siguiente"];
    include $formulario.".cabecera.form.inc.php";
?>
<form method="GET" action="controlador.php" enctype="multipart/form-data">
    <?php
        include $formulario.".form.inc.php";
    ?>
    <br/>
    <input type="hidden" value="<?php echo $flujo; ?>" name="flujo"/>
    <input type="hidden" value="<?php echo $proceso; ?>" name="proceso"/>
    <input type="hidden" value="<?php echo $formulario; ?>" name="formulario"/>
    <center>
        <?php
            if(($_SESSION["Estado"] == 0 && $proceso == 'P6') || $ps == null || $FF1 == 1){
            }else{
                echo "<input type='submit' value='Siguiente' name='Siguiente' class='btn btn-success'/>";
            }
        ?>
        <input type="submit" value="Salir" name="Salir" class="btn btn-danger"/>
    </center>
</form>
<?php
    include "pie.inc.php";
?>