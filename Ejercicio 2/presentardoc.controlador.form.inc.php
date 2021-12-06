<?php
    $documento = $_FILES["Documento"];
    if(!empty($documento)){
        $sql = "INSERT INTO documentos VALUES (".$_SESSION["IdUser"].",'', 0, 0, 0, 0, 0, 0, 0, 1)";
        $res = mysqli_query($conn, $sql);
    }
?>