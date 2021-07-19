<html>
<body>
<?php
    include "conexion.php";
  


    if(isset($_POST["boton_reg"]))
    {
        $nombre=$_POST["nombreprod"];
        $cod_categoria=$_POST["categoria"];
        $talla=$_POST["tallaprod"];
        $stock=$_POST["stockprod"];
        $precio=$_POST["precioprod"];
        $detalle=$_POST["details"];
        $nom_imagen=$_POST["archivo"];

        $sql="INSERT INTO producto(id_categoria1,nombre_producto,talla,stock,precio,detalles,nombre_imagen)
        VALUES('$cod_categoria','$nombre','$talla','$stock','$precio','$detalle','$nom_imagen')";
        $conexion->query($sql);
        echo $conexion->error;

    }


?>
<br> <br> <br>
<div class="container row">
    <div class="container col lg-12 md-12 mb-5">
        <br><br>
        <h2 class="text-center">Eliminar Producto</h2><br>

        <?php
            if(isset($_POST["boton_el"]))
                {
                    $codprod=$_POST["cod_prod"];
                    $sql="DELETE FROM producto WHERE id_producto='$codprod'";
                    $conexion->query($sql);
                    echo $conexion->error;
                    
                    echo" <script>
        
        
                    window.alert('Se Elimino correctamente');
                
                        </script>";
                }
            if(isset($_POST["boton_eliminar"]))
        {
            $codprod=$_POST["cod_prod"];
        ?>
                <caption>Usted va a eliminar el siguiente producto: </caption>
                <table class="container text-center table table-bordered">
                            
                            <thead class="container table-primary">
                                <tr>
                                    <th>id Producto</th>
                                    <th>id Categoria</th>
                                    <th>Nombre Producto</th>
                                    <th>Talla</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Detalles</th>
                                    <th>Nombre Imagen</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql="SELECT * FROM producto WHERE id_producto='$codprod'";
                                    $result= mysqli_query($conexion,$sql);
                                    while($mostrar=mysqli_fetch_array($result))
                                    {       
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $mostrar['id_producto']?></td>
                                        <td><center><?php
                                            $categ=$mostrar['id_categoria1'];
                                            $cat="SELECT * FROM categoria WHERE id_categoria='$categ' ";
                                            $result_uni=mysqli_query($conexion,$cat);
                                            while($mostrar_uni=mysqli_fetch_array($result_uni))
                                            {
                                                echo $mostrar_uni['nombre_categoria'];
                                            }
                                        ?></center></td>
                                        <td><center><?php echo $mostrar['nombre_producto']?></center></td>
                                        <td><center><?php echo $mostrar['talla']?></center></td>
                                        <td><center><?php echo $mostrar['stock']?></center></td>
                                        <td><center><?php echo "$ ".$mostrar['precio']?></center></td>
                                        <td><center><?php echo $mostrar['detalles']?></center></td>
                                        <td><center>
                                            
                                            <?php echo $mostrar['nombre_imagen']?>
                
                                        </center></td>
                                    
                                    </tr>
                                    <?php
                                    }
                                
                                    ?>
                            </tbody>
                </table>
                                    

                <p>Confirmar para eliminar o cancelar para volver atras</p>
    
                <form action="panel.php?pagina=eliminarprod" method="POST">
                    <input type="hidden" name="cod_prod" value="<?php echo $codprod; ?>">
                    <input type="submit" name="boton_el" value="Confirmar">
                    </form>
                
                 <form action="panel.php?pagina=eliminarprod" method="POST">
                    <input type="submit" value="Cancelar">
                </form>
             
              
                            <?php
        }
        else{
                        ?>

                <form action="panel.php?pagina=eliminarprod" method="POST">

                 <p class="busqueda">Ingrese el filtro por Categoria:
                        <select name="categoria">
                            <option> Seleccione categoria </option>
                            <?php
                                $sql="SELECT * FROM categoria";
                                $cont=1;
                                $result_uni=mysqli_query($conexion,$sql);
                                while($mostrar=mysqli_fetch_array($result_uni))
                                {
                                echo " <option value=".$cont.">".$mostrar['nombre_categoria']."</option>";
                                $cont++;
                                }
                            ?>
                        </select>
                        <input type="submit" value="Filtrar" name="boton_filtrar">
                        </p>


                </form>

            <?php

                if(isset($_POST["boton_filtrar"]))
                {
                    $categoria=$_POST["categoria"];
                ?>
                <caption>Lista de productos</caption>
                <table class="container text-center table table-bordered">
                    
                    <thead class="container table-primary">
                    <tr>
                                    <th>id Producto</th>
                                    <th>id Categoria</th>
                                    <th>Nombre Producto</th>
                                    <th>Talla</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Detalles</th>
                                    <th>Nombre Imagen</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql="SELECT * FROM producto WHERE id_categoria1='$categoria'";
                                    $result= mysqli_query($conexion,$sql);
                                    while($mostrar=mysqli_fetch_array($result))
                                    {       
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $mostrar['id_producto']?></td>
                                        <td><center><?php
                                            $categ=$mostrar['id_categoria1'];
                                            $cat="SELECT * FROM categoria WHERE id_categoria='$categ' ";
                                            $result_uni=mysqli_query($conexion,$cat);
                                            while($mostrar_uni=mysqli_fetch_array($result_uni))
                                            {
                                                echo $mostrar_uni['nombre_categoria'];
                                            }
                                        ?></center></td>
                                        <td><center><?php echo $mostrar['nombre_producto']?></center></td>
                                        <td><center><?php echo $mostrar['talla']?></center></td>
                                        <td><center><?php echo $mostrar['stock']?></center></td>
                                        <td><center><?php echo "$ ".$mostrar['precio']?></center></td>
                                        <td><center><?php echo $mostrar['detalles']?></center></td>
                                        <td><center>
                                            
                                            <?php echo $mostrar['nombre_imagen']?>
                                        
                                        </center></td>
                                        <td><center>
                                            
                                            <form action="panel.php?pagina=eliminarprod" method="POST">
                                            <input type="hidden" name="cod_prod" value="<?php echo $mostrar['id_producto']?>">
                                            <input type="submit" value="Eliminar" name="boton_eliminar"> 

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
            
            ?>
             <caption>Lista de productos</caption>
            <table class="container text-center table table-bordered">
               
                <thead class="container table-primary">
                <tr>
                                    <th>id Producto</th>
                                    <th>id Categoria</th>
                                    <th>Nombre Producto</th>
                                    <th>Talla</th>
                                    <th>Stock</th>
                                    <th>Precio $</th>
                                    <th>Detalles</th>
                                    <th>Nombre Imagen</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql="SELECT * FROM producto";
                                    $result= mysqli_query($conexion,$sql);
                                    while($mostrar=mysqli_fetch_array($result))
                                    {       
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $mostrar['id_producto']?></td>
                                        <td><center><?php
                                            $categ=$mostrar['id_categoria1'];
                                            $cat="SELECT * FROM categoria WHERE id_categoria='$categ' ";
                                            $result_uni=mysqli_query($conexion,$cat);
                                            while($mostrar_uni=mysqli_fetch_array($result_uni))
                                            {
                                                echo $mostrar_uni['nombre_categoria'];
                                            }
                                        ?></center></td>
                                        <td><center><?php echo $mostrar['nombre_producto']?></center></td>
                                        <td><center><?php echo $mostrar['talla']?></center></td>
                                        <td><center><?php echo $mostrar['stock']?></center></td>
                                        <td><center><?php echo $mostrar['precio']?></center></td>
                                        <td><center><?php echo $mostrar['detalles']?></center></td>
                                        <td><center>
                                            
                                            <?php echo $mostrar['nombre_imagen']?>
                                        
                                        
                                        
                                        </center></td>
                                        <td><center>
                                            
                                            <form action="panel.php?pagina=eliminarprod" method="POST">
                                            <input type="hidden" name="cod_prod" value="<?php echo $mostrar['id_producto']?>">
                                            <input type="submit" value="Eliminar" name="boton_eliminar"> 

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
                    }
                        ?>

        
    </div>
        