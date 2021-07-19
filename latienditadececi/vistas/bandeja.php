<html>
<body>
<?php
    include "conexion.php";
  
?>
<br> <br> <br>
<div class="container row">
    <div class="container col lg-12 md-12 mb-5">
        <br><br>
        <h2 class="text-center">Bandeja de Entrada</h2><br>
        <form action="panel.php?pagina=bandeja" method="POST">

                 <p class="busqueda">Ingrese el filtro por Estado:
                        <select name="filtro">
                            <option value="Todos">Mostrar todos</option>
                            <option value="No Visto"> Mostrar No vistos</option>
                            <option value="Visto"> Mostrar Vistos</option>
                        </select>
                        <input type="submit" value="Filtrar" name="boton_filtrar">
                        </p>


                </form>
        <?php
        if(isset($_POST['boton_ver']))
        {
            
            $cod_men=$_POST['cod_mens'];

            $sqlv="UPDATE bandeja set estado='Visto' WHERE id_bandeja='$cod_men'";
            $conexion->query($sqlv);



            $sql="SELECT * FROM bandeja WHERE id_bandeja='$cod_men'";
            $result= mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result))
            {
                echo "
                
                <b>ID MENSAJE:</b> ".$mostrar['id_bandeja']." <br>
                <b>ASUNTO:</b> ".$mostrar['asunto']." <br>
                <b>ESTADO:</b> ".$mostrar['estado']." <br>
                <b>FECHA:</b> ".$mostrar['fecha']." <br>
                <b>MENSAJE:</b> <br><br>

                ".$mostrar['mensaje']."
                
                
                
                ";
            }


            ?>
            <br><br><br>
            <form action="panel.php?pagina=bandeja" method="POST">
                <input type="submit" value="Atras">
            </form>

            <?php

        }else{
            if(isset($_POST['boton_filtrar']))
            {
                $filtro=$_POST['filtro'];

                if($filtro == "No Visto")
                {
                   ?>
                   <caption>Lista de  mensajes recibidos</caption>
                    <table class="container text-center table table-bordered">
                        <thead class="container table-primary">
                            <tr>
                                <th>id Mensaje</th>
                                <th>ASUNTO</th>
                                <th>ESTADO</th>
                                <th>FECHA</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql="SELECT * FROM bandeja WHERE estado='No Visto'";
                                $result= mysqli_query($conexion,$sql);
                                while($mostrar=mysqli_fetch_array($result))
                                {       
                            ?>
                                <tr>
                                    <td><?php echo $mostrar['id_bandeja']?></td>
                                    <td><center><?php echo $mostrar['asunto']?></center></td>
                                    <td><center><?php echo $mostrar['estado']?></center></td>
                                    <td><center><?php echo $mostrar['fecha']?></center></td>
                                    <td><center>
                                        <form action="panel.php?pagina=bandeja" method="POST">
                                        <input type="hidden" name="cod_mens" value="<?php echo $mostrar['id_bandeja']?>">
                                        <input type="submit" value="Ver Mensaje" name="boton_ver"> 
                                        </form>
                                    </center></td>
                                </tr>
                                <?php
                                }

                                ?>
                        </tbody>
                    </table>

                   <?php 
                }else{
                    if($filtro == "Visto")
                    {
                        ?>
                        <caption>Lista de  mensajes recibidos</caption>
                            <table class="container text-center table table-bordered">
                                <thead class="container table-primary">
                                    <tr>
                                        <th>id Mensaje</th>
                                        <th>ASUNTO</th>
                                        <th>ESTADO</th>
                                        <th>FECHA</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql="SELECT * FROM bandeja WHERE estado='Visto'";
                                        $result= mysqli_query($conexion,$sql);
                                        while($mostrar=mysqli_fetch_array($result))
                                        {       
                                    ?>
                                        <tr>
                                            <td><?php echo $mostrar['id_bandeja']?></td>
                                            <td><center><?php echo $mostrar['asunto']?></center></td>
                                            <td><center><?php echo $mostrar['estado']?></center></td>
                                            <td><center><?php echo $mostrar['fecha']?></center></td>
                                            <td><center>
                                                <form action="panel.php?pagina=bandeja" method="POST">
                                                <input type="hidden" name="cod_mens" value="<?php echo $mostrar['id_bandeja']?>">
                                                <input type="submit" value="Ver Mensaje" name="boton_ver"> 
                                                </form>
                                            </center></td>
                                        </tr>
                                        <?php
                                        }

                                        ?>
                                </tbody>
                            </table>

                        <?php 
                    }
                    if($filtro == "Todos")
                    {
                        ?>
            <caption>Lista de  mensajes recibidos</caption>
            <table class="container text-center table table-bordered">
                <thead class="container table-primary">
                <tr>
                                    <th>id Mensaje</th>
                                    <th>ASUNTO</th>
                                    <th>ESTADO</th>
                                    <th>FECHA</th>
                                    <th>ACTION</th>
                                   
                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql="SELECT * FROM bandeja";
                                    $result= mysqli_query($conexion,$sql);
                                    while($mostrar=mysqli_fetch_array($result))
                                    {       
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $mostrar['id_bandeja']?></td>
                
                                        <td><center><?php echo $mostrar['asunto']?></center></td>
                                        <td><center><?php echo $mostrar['estado']?></center></td>
                                        <td><center><?php echo $mostrar['fecha']?></center></td>
                            
            
                                        <td><center>
                                            
                                            <form action="panel.php?pagina=bandeja" method="POST">
                                            <input type="hidden" name="cod_mens" value="<?php echo $mostrar['id_bandeja']?>">
                                            <input type="submit" value="Ver Mensaje" name="boton_ver"> 

                                            </form>
                        
                                        
                                        </center></td>
                                    </tr>
                                    <?php
                                    }
            }
                                    ?>
                            </tbody>
                </table>


                <?php
                    }
                }
                


            else{
                ?>
            <caption>Lista de  mensajes recibidos</caption>
            <table class="container text-center table table-bordered">
                <thead class="container table-primary">
                <tr>
                                    <th>id Mensaje</th>
                                    <th>ASUNTO</th>
                                    <th>ESTADO</th>
                                    <th>FECHA</th>
                                    <th>ACTION</th>
                                   
                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql="SELECT * FROM bandeja";
                                    $result= mysqli_query($conexion,$sql);
                                    while($mostrar=mysqli_fetch_array($result))
                                    {       
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $mostrar['id_bandeja']?></td>
                
                                        <td><center><?php echo $mostrar['asunto']?></center></td>
                                        <td><center><?php echo $mostrar['estado']?></center></td>
                                        <td><center><?php echo $mostrar['fecha']?></center></td>
                            
            
                                        <td><center>
                                            
                                            <form action="panel.php?pagina=bandeja" method="POST">
                                            <input type="hidden" name="cod_mens" value="<?php echo $mostrar['id_bandeja']?>">
                                            <input type="submit" value="Ver Mensaje" name="boton_ver"> 

                                            </form>
                        
                                        
                                        </center></td>
                                    </tr>
                                    <?php
                                    }
            }
                                    ?>
                            </tbody>
                </table>


                <?php
            
            
                
        }
        
              