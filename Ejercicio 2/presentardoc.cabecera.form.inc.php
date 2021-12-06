<?php
    $sw = 0;
    $sql = "SELECT * FROM documentos WHERE ci=".$_SESSION["IdUser"];
    $resCab = mysqli_query($conn, $sql);
    $filCab = mysqli_fetch_array($resCab);
    if(isset($filCab)){
        $sw = 1;
    }
?>