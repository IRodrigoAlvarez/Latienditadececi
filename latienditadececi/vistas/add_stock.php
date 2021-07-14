<html>
<body>
<?php
    include "conexion.php";
  
    if(isset($_POST["boton_addp"]))
    {
        $stock_n = $_POST["addstock"];
        $cod_prod=$_POST["cod_prod"];
        $sql="UPDATE producto SET stock=stock+$stock_n WHERE id_producto='$cod_prod'";
        $conexion->query($sql);
    }
?>
<br> <br> <br>
<div class="container row">
    <div class="container col lg-12 md-12 mb-5">
        <br><br>
        <h2 class="text-center">Agregar Stock</h2><br>

        
        <form action="panel.php?pagina=add_stock" method="POST">

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
                                    <th>Precio $</th>
                                    <th>Detalles</th>
                                    <th>Nombre Imagen</th>
                                    <th>Agregar o quitar stock</th>

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
                                        <td><center><?php echo $mostrar['precio']?></center></td>
                                        <td><center><?php echo $mostrar['detalles']?></center></td>
                                        <td><center>
                                            
                                            <?php echo $mostrar['nombre_imagen']?>
                                        
                                        </center></td>
                                        <td>

                                            <form action="panel.php?pagina=add_stock" method="POST">
                                                <input type="number" style="width: 5em;" name="addstock">
                                                <input type="hidden" name="cod_prod" value="<?php echo $mostrar['id_producto']?>">
                                                <input type="submit" name="boton_addp" value="OK">
                                            </form>

                                        </td>
                                        
                                    </tr>
                                    <?php
                                    }
                            }else{
                                
                                    ?>
                            </tbody>
                </table>
        
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
                                    <th>Agregar o quitar stock</th>
                                    
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
                                        <td>

                                            <form action="panel.php?pagina=add_stock" method="POST">
                                                <input type="number" style="width: 5em;" name="addstock">
                                                <input type="hidden" name="cod_prod" value="<?php echo $mostrar['id_producto']?>">
                                                <input type="submit" name="boton_addp" value="OK">
                                            </form>

                                        </td>

                                    
                                    </tr>
                                    <?php
                                    }
                                }
                                    ?>
                            </tbody>
                        </table> 