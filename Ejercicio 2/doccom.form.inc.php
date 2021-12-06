    <center>
        <div class="alert alert-success" role="alert" style="width: 40rem;">
            <h4 class="alert-heading">Bienvenido <?php echo $_SESSION['Nombre'];?></h4>
            <p>A continuación podrás ver si tienes todos los requisitos para proceder con tu inscripción del frente.</p>
            <p class="mb-0">Fecha de Ingreso: <?php echo date("Y-m-d");?></p>
            <hr>
            <div class="card">
                <div class="card-header">
                    ESTADO DE LA VERIFICACIÓN
                </div>
                <div class="card-body">
                     <?php
                        if($_SESSION["Estado"] == 1){

                            echo "Usted cumple con todos los requisitos para la postulacion, felicidades.";
                        }else{
                    ?>
                    <table class="table table-hover">
                        <caption>Documentos faltantes.</caption>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Documento</th>  
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                            if($sw1 == 0){
                                echo "<tr><td>Nombre del Frente</td></tr>";   
                            }
                            if($sw1 == 0){
                                echo "<tr><td>Primer Ejecutivo</td></tr>";   
                            }
                            if($sw2 == 0){
                                echo "<tr><td>Segundo Ejecutivo</td></tr>";   
                            }
                            if($sw3 == 0){
                                echo "<tr><td>Tercer Ejecutivo</td></tr>";   
                            }
                            if($sw4 == 0){
                                echo "<tr><td>Honorable Consejo Facultativo</td></tr>";   
                            }
                            if($sw5 == 0){
                                echo "<tr><td>Consejo Academico Facultativo</td></tr>";   
                            } 
                            if($sw6 == 0){
                                echo "<tr><td>Honorable Consejo de Carrera</td></tr>";   
                            } 
                            if($sw7 == 0){
                                echo "<tr><td>Consejo Academico de Carrera</td></tr>";   
                            }      
                        }
                    ?>
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </center>