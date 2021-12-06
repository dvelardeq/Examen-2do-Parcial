<?php
	$sql = "SELECT * FROM documentos WHERE pe=1 AND se=1 AND te=1 AND hcf=1 AND caf=1 AND hcc=1 AND cac=1 AND ci=".$_SESSION["IdUser"];
    $resCab = mysqli_query($conn, $sql);
    $filCab = mysqli_fetch_array($resCab);
    $sw1 = 0;
    $sw2 = 0;
    $sw3 = 0;
    $sw4 = 0;
    $sw5 = 0;
    $sw6 = 0;
    $sw7 = 0;
    if(isset($filCab)){
        $_SESSION["Estado"] = 1;
    }else{
        $sql1 = "SELECT * FROM documentos WHERE pe=1 AND ci=".$_SESSION["IdUser"];
        $resCab1 = mysqli_query($conn, $sql1);
        $filCab1 = mysqli_fetch_array($resCab1);

        $sql2 = "SELECT * FROM documentos WHERE se=1 AND ci=".$_SESSION["IdUser"];
        $resCab2 = mysqli_query($conn, $sql2);
        $filCab2 = mysqli_fetch_array($resCab2);

        $sql3 = "SELECT * FROM documentos WHERE te=1 AND ci=".$_SESSION["IdUser"];
        $resCab3 = mysqli_query($conn, $sql3);
        $filCab3 = mysqli_fetch_array($resCab3);

        $sql4 = "SELECT * FROM documentos WHERE hcf=1 AND ci=".$_SESSION["IdUser"];
        $resCab4 = mysqli_query($conn, $sql4);
        $filCab4 = mysqli_fetch_array($resCab4);

        $sql5 = "SELECT * FROM documentos WHERE caf=1 AND ci=".$_SESSION["IdUser"];
        $resCab5 = mysqli_query($conn, $sql5);
        $filCab5 = mysqli_fetch_array($resCab5);

        $sql6 = "SELECT * FROM documentos WHERE hcc=1 AND ci=".$_SESSION["IdUser"];
        $resCab6 = mysqli_query($conn, $sql6);
        $filCab6 = mysqli_fetch_array($resCab6);

        $sql7 = "SELECT * FROM documentos WHERE cac=1 AND ci=".$_SESSION["IdUser"];
        $resCab7 = mysqli_query($conn, $sql7);
        $filCab7 = mysqli_fetch_array($resCab7);
    }

    if(isset($filCab1)){
        $sw1 = 1;
    }
    if(isset($filCab2)){
        $sw2 = 1;
    }
    if(isset($filCab3)){
        $sw3 = 1;
    }
    if(isset($filCab4)){
        $sw4 = 1;
    }
    if(isset($filCab5)){
        $sw5 = 1;
    }
    if(isset($filCab6)){
        $sw6 = 1;
    }
    if(isset($filCab7)){
        $sw7 = 1;
    }
?>