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
        echo" <script>
        
        
        window.alert('El producto ".$nombre." se registro correctamente');
    
            </script>";

    }


?>
<br> <br> <br>
<div class="container row">
    <div class="container col lg-12 md-12 mb-5">
        <br><br>
        <h2 class="text-center">Registrar Productos</h2><br>



        <form action="panel.php?pagina=reg_prod" method="POST">
        
        <label>Nombre Producto:</label>
        <input type="text" name="nombreprod" autocomplete="off" placeholder="Ingrese nombre producto"><br>
        <label>Categoria del producto: </label>

        <select name="categoria">
                    <option>Seleccione:</option>
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
                </select><br>
        <label>Talla o tamaño:</label>
        <input type="text" name="tallaprod" autocomplete="off" placeholder=" "><br>

        <label>Stock Disponible:</label>
        <input type="number" name="stockprod"><br>

        <label>Precio:</label>
        <input type="number" name="precioprod"><br>

        <label>Detalle:</label><br>
        <textarea placeholder="Descripcion producto" rows="5" cols="50" name="details"></textarea><br>


        <label>Imagen:</label>
        <input name="archivo" type="file"/><br><br>
        <input type="submit" name="boton_reg" value="Registrar Producto">
        </form>
    </div>
        
              
