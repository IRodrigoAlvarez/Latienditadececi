<html>
<body>
<?php
    include "conexion.php";
  
?>
<br> <br> <br>
<div class="container row">
    <div class="container col lg-12 md-12 mb-5">
        <br><br>
        <h2 class="text-center">INFORME DE VENTAS</h2><br>
        <!-- Formulario de filtro numero de boleta. -->
        <form action="panel.php?pagina=informes" method="POST">

            <label>Buscar Numero de Boleta: </label>
            <input list="ventas" name="venta">
            <datalist id="ventas">
            <?php
                $sql="SELECT * FROM registroventa";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result))
                {
                echo '<option value='.$mostrar['id_venta1'].'>'.$mostrar['id_venta1'].'</option>';
                }

            ?>
            </datalist>
            <input type="submit" name="buscar_v" value="Buscar">
        </form>
        <!-- Formulario de filtro nombre de cliente. -->
        <form action="panel.php?pagina=informes" method="POST">

            <label>Buscar por Nombre de cliente: </label>
            <input list="nombres" name="nombres" autocomplete="off">
            <datalist id="nombres">
            <?php
                $sql="SELECT * FROM cliente";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result))
                {
                echo '<option value='.$mostrar['id_cliente'].'>'.$mostrar['nombre_cliente'].'</option>';
                }

            ?>
            </datalist>
            <input type="submit" name="buscar_vn" value="Buscar">
        </form>
    
    <?php
        
        if(isset($_POST['buscar_v']))
        {
            $codigo_venta=$_POST['venta'];
            ?>

            <table class="container text-center table table-bordered">
                <thead class="container table-primary">
                    <tr>
                        
                        <th>id Producto</th>
                        <th>Nombre Producto</th>
                        <th>Cantidad</th>
                        <th>Valor Venta $</th>
                        <th>Fecha venta</th>
                        <th>Detalles</th>
                            
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT * FROM venta WHERE id_rventa='$codigo_venta'";
                        $result= mysqli_query($conexion,$sql);
                        $mostrar=mysqli_fetch_array($result);

                        echo 'El numero de boleta es el siguiente: <h2>'.$mostrar['id_rventa'].'</h2>';
                        echo 'El nombre del cliente es el siguiente:';

                        $idc=$mostrar['id_cliente1'];
                        $sql="SELECT * FROM cliente WHERE id_cliente='$idc'";
                        $result= mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result))
                        { 
                            echo '<h2>'.$mostrar['nombre_cliente'].'</h2>';
                        }   

                        $sql="SELECT * FROM venta WHERE id_rventa='$codigo_venta'";
                        $result= mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result))
                        {       
                        ?>
                            <tr> 
                            
                                <td><center><?php echo $mostrar['id_producto1']?></center></td>
                                <td><center><?php 
                                
                                $nombre = $mostrar['id_producto1'];
                                $sql="SELECT * FROM producto WHERE id_producto='$nombre'";
                                $result2= mysqli_query($conexion,$sql);
                                while($mostrar2=mysqli_fetch_array($result2))
                                {
                                    echo $mostrar2['nombre_producto'];
                                }
                                
                                ?></center></td>
                                <td><center><?php echo $mostrar['cantidad_p']?></center></td>
                                <td><center><?php echo $mostrar['valor_venta']?></center></td>
                                <td><center><?php echo $mostrar['fecha_venta']?></center></td>
                                <td><center><?php echo $mostrar['detalle_venta']?></center></td>
                            
                            </tr>
                                <?php
                        }
                                    
                            ?>
                </tbody>
            </table>
            <form action="panel.php?pagina=informes" method="POST">
                                <input type="submit" value="atras">
                            </form>

            <?php
        }else{

            if(isset($_POST['boton_detalles']))
            {

                $idRV=$_POST['idventa'];
                ?>
                <table class="container text-center table table-bordered">
                <thead class="container table-primary">
                    <tr>
                        
                        <th>id Producto</th>
                        <th>Nombre Producto</th>
                        <th>Cantidad</th>
                        <th>Valor Venta $</th>
                        <th>Fecha venta</th>
                        <th>Detalles</th>
                            
                    </tr>
                </thead>
                <br>

                <tbody>
                    <?php
                        $sql="SELECT * FROM venta WHERE id_rventa='$idRV'";
                        $result= mysqli_query($conexion,$sql);
                        $mostrar=mysqli_fetch_array($result);

                        echo 'El numero de boleta es el siguiente: <h2>'.$mostrar['id_rventa'].'</h2>';
                        echo 'El nombre del cliente es el siguiente:';
                        
                        $idc=$mostrar['id_cliente1'];
                        
                        $sql="SELECT * FROM cliente WHERE id_cliente='$idc'";
                        $result= mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result))
                        { 
                            echo '<h2>'.$mostrar['nombre_cliente'].'</h2>';
                        }   
                        echo"Se ha llevado los siguientes productos: ";
                        $sql="SELECT * FROM venta WHERE id_rventa='$idRV'";
                        $result= mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result))
                        {       
                        ?>
                            <tr> 
                                <td><center><?php echo $mostrar['id_producto1']?></center></td>
                                <td><center><?php 
                                
                                $nombre = $mostrar['id_producto1'];
                                $sql="SELECT * FROM producto WHERE id_producto='$nombre'";
                                $result2= mysqli_query($conexion,$sql);
                                while($mostrar2=mysqli_fetch_array($result2))
                                {
                                    echo $mostrar2['nombre_producto'];
                                }
                                
                                ?></center></td>
                                <td><center><?php echo $mostrar['cantidad_p']?></center></td>
                                <td><center><?php echo $mostrar['valor_venta']?></center></td>
                                <td><center><?php echo $mostrar['fecha_venta']?></center></td>
                                <td><center><?php echo $mostrar['detalle_venta']?></center></td>
                            
                            </tr>

                                <?php
                        }
                             ?>
                        
                </tbody>
            </table> 
            <form action="panel.php?pagina=informes" method="POST">
                                <input type="submit" value="atras">
                            </form>
    
            <?php            
        }else{
                if(isset($_POST['buscar_vn']))
                {
                    $idcliente=$_POST['nombres'];
                
                    ?>
                    
                    <table class="container text-center table table-bordered">
                        <thead class="container table-primary">
                            <tr>
                                <th>Boleta</th>
                                <th>id Producto</th>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th>Valor Venta $</th>
                                <th>Fecha venta</th>
                                <th>Detalles</th>
                                    
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql="SELECT * FROM venta WHERE id_cliente1='$idcliente'";
                                $result= mysqli_query($conexion,$sql);
                                $mostrar=mysqli_fetch_array($result);
        
                                
                                echo 'El nombre del cliente es el siguiente:';
        
                                $idc=$mostrar['id_cliente1'];
                                
                                
                                $sql="SELECT * FROM cliente WHERE id_cliente='$idc'";
                                $result= mysqli_query($conexion,$sql);
                                while($mostrar=mysqli_fetch_array($result))
                                { 
                                    echo '<h2>'.$mostrar['nombre_cliente'].'</h2>';
                                }   
                                echo"Se ha llevado los siguientes productos: ";
                                $sql="SELECT * FROM venta WHERE id_cliente1='$idcliente'";
                                $result= mysqli_query($conexion,$sql);
                                while($mostrar=mysqli_fetch_array($result))
                                {       
                                ?>
                                    <tr> 
                                        <td><center><?php echo $mostrar['id_rventa']?></center></td>
                                        <td><center><?php echo $mostrar['id_producto1']?></center></td>
                                        <td><center><?php 
                                        
                                        $nombre = $mostrar['id_producto1'];
                                        $sql="SELECT * FROM producto WHERE id_producto='$nombre'";
                                        $result2= mysqli_query($conexion,$sql);
                                        while($mostrar2=mysqli_fetch_array($result2))
                                        {
                                            echo $mostrar2['nombre_producto'];
                                        }
                                        
                                        ?></center></td>
                                        <td><center><?php echo $mostrar['cantidad_p']?></center></td>
                                        
                                        <td><center><?php echo $mostrar['valor_venta']?></center></td>
                                        <td><center><?php echo $mostrar['fecha_venta']?></center></td>
                                        <td><center><?php echo $mostrar['detalle_venta']?></center></td>
                                    
                                    </tr>
                                        <?php
                                }
                                            
                                    ?>
                        </tbody>
                    </table>
                    <form action="panel.php?pagina=informes" method="POST">
                                        <input type="submit" value="atras">
                                    </form>
        
                    <?php
                }else{   
                        ?>
                            <br>
                            <h2>LISTA DE VENTAS REALIZADAS</h2>
                            <table class="container text-center table table-bordered">
                                    <thead class="container table-primary">
                                            <tr>
                                                <th>id Registro Venta</th>
                                                <th>Boleta </th>
                                                <th>Total Venta $</th>
                                                <th>Fecha</th>
                                                <th>Detalle Venta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql="SELECT * FROM registroventa";
                                                $result= mysqli_query($conexion,$sql);
                                                while($mostrar=mysqli_fetch_array($result))
                                                {       
                                            ?>
                                                <tr>
                                                    
                                                    <td><center><?php echo $mostrar['id_registro']?></center></td>
                                                    <td><center><?php echo $mostrar['id_venta']?></center></td>
                                                    <td><center><?php echo $mostrar['total_venta']?></center></td>
                                                    <td><center><?php echo $mostrar['fecha']?></center></td>
                                                    <td>

                                                        <form action="panel.php?pagina=informes" method="POST">
                                                            <input type="hidden" name="idventa" value="<?php echo $mostrar['id_venta']?>">
                                                            <input type="submit" name='boton_detalles' value='Mostrar Detalles'>
                                                        </form>

                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            
                                                ?>
                                        </tbody>
                            </table>



                        <?php   

                    }}
                }       
                            ?>
                </tbody>
            </table>
           
       

        