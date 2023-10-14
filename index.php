<?php 
    $sw = false;
    if(isset($_FILES['archivo']['name']))
    {
        $sw = true;
        //print_r($_FILES);
        $nombre = $_FILES['archivo']['name'];
        $guardado = $_FILES['archivo']['tmp_name'];
        if(file_exists($nombre))
        {
            unlink($nombre);
        }
        if(move_uploaded_file($guardado, $nombre))
        {
            $sw = true;
        }
        else
        {
            $sw = false;
        }

    }
    //echo $sw?"Verdad":"Falso";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/estilos.css">
        <title>Tarea semana 6</title>
    </head>
    <body>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/funciones.js"></script>
        
        <div class="row">
            <div class="col-sm-12  bg-dark text-white text-center">
                <h1>Tarea semana 8</h1> 
            </div>
        </div>
        <div class="row">
            <div class="col-sm-0 col-md-1 col-xl-1  bg-dark text-white"></div>
            <div class="col-sm-12 col-md-10 col-xl-10  bg-dark text-white text-center">
                &nbsp;
                <h2>Programación Orientada a Objetos con PHP</h2> 
            </div>
            <div class="col-sm-0 col-md-1 col-xl-1  bg-dark text-white"></div>
        </div>
        <div class="row align-items-center">
            &nbsp; 
        </div>

        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <div class="input-group">
                            <h2 class="pull-left">Arrendatarios</h2>
                            <form action="index.php" method="post" enctype="multipart/form-data" >
                                
                                    
                                    <button type="submit" class="btn btn-success pull-right">Leer datos de archivo</button>
                                    <input type="file" name="archivo" accept=".xml" class="btn btn-secondary pull-right">
                                
                                <!-- <a href="insertar.php" class="btn btn-success pull-right ">Cargar</a>-->
                            </form>
                        
                        </div>    
                    </div>
                    <?php
                        spl_autoload_register
                        ( function ($nombre_clase) 
                            {
                            include $nombre_clase . '.php';
                            }
                        );
                        
                        $campos = array('nombre', 'apellido','rut', 'tiempo', 'monto','direccion');
                        $cabecera = array('Nombre', 'Apellido', 'RUT', 'Tiempo de arriendo','Monto $','Dirección');
                        
                        
                        if($sw)
                            {
                            $personas=simplexml_load_file($nombre);
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            foreach ($cabecera as $key => $value) 
                            {
                                echo "<th>".$value."</th>"; 
                            }
                            echo "</tr>";
                            echo "</thead>";
                            
                            echo "<tbody>";
                            foreach ($personas as $fila)
                            {
                                $cadena = "<tr>";
                                $cadena .= "<td>".$fila->nombre."</td>";
                                $cadena .= "<td>".$fila->apellido."</td>";
                                $cadena .= "<td>".$fila->rut."</td>";
                                $cadena .= "<td>".$fila->tiempo."</td>";
                                $cadena .= "<td>".$fila->monto."</td>";
                                $cadena .= "<td>".$fila->direccion."</td>";
                                echo $cadena;
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo '<a href="vistaImprimir.php" target="_blank" class="btn btn-success pull-right ">Generar PDF (Escribir)</a>';
                            echo '<a href="index.php" target="_blank" class="btn btn-success pull-right ">Cerrar archivo</a>';
                        }
                        else
                            echo  "<p class='lead'><em>No existen registros para mostrar</em></p>";
                    ?>
                </div>
            </div>        
        </div>
        


        <div class="row align-items-center">
            &nbsp; 
        </div>
        <?php 
        if(isset($_GET["error"]))
        {
            if($_GET["error"] == 1)
            {
        ?>
                <div class="row bg-danger text-center" id="erro">
                    <label for="" id="error1">Error: El vehiculo NO existe</label>  
                </div>
        <?php 
            }
        }
        ?>
        <?php 
        if(isset($_GET["error"]))
        {
            if($_GET["error"] == 2)
            {
        ?>
                <div class="row bg-success text-center" id="erro">
                    <label for="" id="error1">Registro eliminado exitosamente</label>  
                </div>
        <?php 
            }
        }
        if(isset($_GET["error"]))
        {
            if($_GET["error"] == 3)
            {
        ?>
                <div class="row bg-danger text-center" id="erro">
                    <label for="" id="error1">Error de conexion</label>  
                </div>
        <?php 
            }
        }
        ?>
        
    </body>
</html> 