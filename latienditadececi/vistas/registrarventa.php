<?php

    include "conexion.php";

    if(isset($_POST['boton_nc']))
    {
        $nombre=$_POST['nuevo_cliente'];
        $aux="";
        $sql="SELECT * FROM cliente WHERE nombre_cliente='$nombre'";
        $result=mysqli_query($conexion,$sql);
        while($mostrar=mysqli_fetch_array($result))
        {
            $aux=$mostrar['nombre_cliente'];
        }

        if($nombre != $aux){
            $sql="INSERT INTO cliente(nombre_cliente) VALUE ('$nombre')";
            $conexion->query($sql);
        }else{


            echo "<script>
            
                window.alert('El usuario ya existe, por favor eliga otro nombre');
                window.location='panel.php?pagina=registrarventa';
            
            </script>";
        }

    }


    if(isset($_POST['boton_add']))
    {

        $idprod=$_POST['codigoproducto'];
        $cantidad=$_POST['cantidad'];
        $sql="SELECT * FROM producto WHERE id_producto='$idprod' ";
        $result=mysqli_query($conexion,$sql);
        while($mostrar=mysqli_fetch_array($result))
        {
            $nombre=$mostrar['nombre_producto'];
            $precioventa=$mostrar['precio'];
        }
        $sql="INSERT INTO carrito(id_producto,nombre_producto,cantidad,precio) VALUE('$idprod','$nombre','$cantidad','$precioventa')";
        $conexion->query($sql);
        echo $conexion->error;
    }



    if(isset($_POST['boton_venta']))
    {
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d");
        $nombrec=$_POST['nombre_cliente'];
        
        $detalle=$_POST['detallev'];
        
            $idventa=1;
            $s="SELECT * from venta where id_rventa = (select MAX(id_rventa) from venta)";
            $result2=mysqli_query($conexion,$s);
            while($mostrar2=mysqli_fetch_array($result2))
            {
                $idventa=$mostrar2['id_rventa']+1;
            }

        
        $sqlcarrito="SELECT * FROM carrito";
        $result=mysqli_query($conexion,$sqlcarrito);
        $total=0;
        while($mostrar=mysqli_fetch_array($result))
        {
            $idprod=$mostrar['id_producto'];
            $cantidad=$mostrar['cantidad'];
            $valorventa=$mostrar['precio']*$cantidad;
            $total=$total+$mostrar['precio']*$cantidad;

            $sqlstock="UPDATE producto set stock=stock-$cantidad WHERE id_producto = '$idprod'";
            $conexion->query($sqlstock);
            echo $conexion->error;

            $idcliente;
            $sqlID="SELECT * FROM cliente WHERE id_cliente='$nombrec' ";
            $result3=mysqli_query($conexion,$sqlID);
            while($mostrar3=mysqli_fetch_array($result3))
            {
                $idcliente=$mostrar3['id_cliente'];
            }

            $sqlventa="INSERT INTO venta(id_producto1,id_rventa,cantidad_p,valor_venta,
            id_cliente1, fecha_venta, detalle_venta) VALUE ('$idprod','$idventa','$cantidad','$valorventa',
            '$idcliente','$fecha','$detalle') ";

            $conexion->query($sqlventa);
        }
        
        $sql="INSERT INTO registroventa(id_venta,total_venta,fecha) VALUE('$idventa','$total','$fecha')";
        $conexion->query($sql);
        echo $conexion->error;

        $sql="TRUNCATE TABLE carrito";
        $conexion->query($sql);



    }
    if(isset($_POST['boton_menos']))
    {
        $cod_prod=$_POST['cod_prod'];
        echo $cod_prod;
        $sql="UPDATE carrito SET cantidad=cantidad-1 WHERE id_producto='$cod_prod'";
        $conexion->query($sql);
        echo $conexion->error;
    }
    if(isset($_POST['boton_mas']))
    {
        $cod_prod=$_POST['cod_prod'];
        $sql="UPDATE carrito SET cantidad=cantidad+1 WHERE id_producto='$cod_prod'";
        $conexion->query($sql);
    }
    if(isset($_POST['boton_eliminar']))
    {
        $cod_prod=$_POST['cod_prod'];
        $sql="DELETE FROM carrito WHERE id_producto='$cod_prod' ";
        $conexion->query($sql);

    }

    if(isset($_POST['Limpiar']))
    {
        $sql="TRUNCATE TABLE carrito";
        $conexion->query($sql);
    }

?>


<div class="container row">
    <div class="container col lg-12 md-12 mb-5">
        <br><br>
        <h2 class="text-center">Realizar Venta</h2><br>


                <form action="panel.php?pagina=registrarventa"  autocomplete="off" method="POST">
                        
                       <label>Buscar Producto: </label>
                        <input list="productos" name="codigoproducto">
                        <datalist id="productos">
                        <?php
                            $sql="SELECT * FROM producto";
                            $result=mysqli_query($conexion,$sql);
                            while($mostrar=mysqli_fetch_array($result))
                            {
                                echo '<option value=" '.$mostrar['id_producto'].'">'.$mostrar['nombre_producto'].'</option>';
                            }

                        ?>
                        </datalist>

                        <label>Ingresar cantidad: </label>
                        <input type="number"  name="cantidad" style="width: 8em;" min="0" max="1000"  placeholder="Cantidad..." required>

                        <button  type="submit" name="boton_add" >Agregar al carrito</button>
                        
                </form>


                 <center></center>               
                <table style="width:600px; height:100px;">
                    <thead>
                        <tr>
                            
                            <th>ID Producto</th>
                            <th>Nombre Producto</th>
                            <th>Cantidad</th>
                            <th>Precio $</th>
                            <th>Cantidad </th>
                            <th>Borrar Producto </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $sql="SELECT * FROM carrito ";
                                $precio=0;

                                $result=mysqli_query($conexion,$sql);
                                while($mostrar=mysqli_fetch_array($result))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $mostrar['id_producto']?></td>
                                        <td><?php echo $mostrar['nombre_producto']?></td>
                                        <td><?php echo $mostrar['cantidad']?></td>
                                        <td><?php echo $mostrar['precio'];
                                        
                                        
                                        $precio=$precio+$mostrar['precio']*$mostrar['cantidad'];

                                        ?></td>
                                        <td>
                                        
                                        <form action="panel.php?pagina=registrarventa" method="POST">
                                            <input type="hidden" name="cod_prod" value="<?php echo $mostrar['id_producto']?>">
                                            <input type="submit" name="boton_menos" value="-">
                                            <input type="submit" name="boton_mas" value="+">

                                        </td>
                                        <td> 
                                            <input type="submit" name="boton_eliminar" value="Borrar">
                                            </form>
                                        </td>

                                    </tr> 
                            <?php
                                
                                }
                                
                            ?>
                    </tbody>
                   
                </table>
                <br>
                <?php
                
                echo "<b>PRECIO TOTAL: $".$precio.'</b>';
                
                ?>

            
                <form action="panel.php?pagina=registrarventa" method="POST">
                    <br>
                    <label>Seleccionar nombre de cliente registrado </label><br>
                    
                    <select name="nombre_cliente" >
                        <?php
                            $sql="SELECT * FROM cliente";
                            $result=mysqli_query($conexion,$sql);
                            while($mostrar=mysqli_fetch_array($result))
                            {
                                echo '<option value=" '.$mostrar['id_cliente'].'">'.$mostrar['nombre_cliente'].'</option>';
                            }
                        ?>
                    </select>
                    <br>

                    <br>
                <label>Si desea ingresar el NOMBRE de un NUEVO cliente, puede hacerlo aquí.</label><br>
                <label>Debe ingresar el nombre del cliente con el siguiente formato:</label><br>
                <label>Nombre, Apellido Paterno, Apellido Materno</label><br>
                <form action="panel.php?pagina=registrarventa" method="POST">
                    <input type="text" name="nuevo_cliente" placeholder="Nuevo cliente...">
                    <input type="submit" name="boton_nc" value="Agregar">
                </form>
                        
                    <br>
                    <br>
                    <label>Si desea escribir algún detalle en particular sobre la venta, puede hacerlo aquí </label><br>
                    <textarea placeholder="Detalle venta" name='detallev' rows="5" cols="50" style="resize: none;"></textarea><br>
                    <input type="submit" name="boton_venta" value="Vender">
                    <input type="submit" id="form1" name="Limpiar" value="Limpiar Carrito">

                </form>
                
                <br> 
                
    </div>
   
    