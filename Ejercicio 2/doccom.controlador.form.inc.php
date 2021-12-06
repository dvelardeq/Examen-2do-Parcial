<?php
	$sql = "SELECT documentos SET estado=1 WHERE ci=".$_SESSION["IdUser"];
    $res = mysqli_query($conn, $sql);
    $_SESSION["Estado"] == 1;
?>