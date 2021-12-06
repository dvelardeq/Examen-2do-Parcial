<?php
    $ci = "";
    $nombre = "";
    $apellidos = "";
    $fechaNac = "";
    $sql = "SELECT * FROM estudiante WHERE ci=".$_SESSION["IdUser"];
    $resCab = mysqli_query($conn, $sql);
    $filCab = mysqli_fetch_array($resCab);
    if(isset($filCab)){
        $ci = $filCab["ci"];
        $nombre = $filCab["nombre"];
        $apellidos = $filCab["apellidos"];
        $ci = $filCab["ci"];
        $fechaNac = $filCab["fecha_nac"];
    }
?>