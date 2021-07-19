<html>
<body>
<?php
    include "conexion.php";
  
    if(isset($_POST["boton_addc"]))
    {
        $nombre=$_POST["nombrecate"];
        $imagen=$_POST["archivo"];
        $sql="INSERT INTO categoria(nombre_categoria,imagen_categoria) VALUES ('$nombre')";
        $conexion->query($sql);
        echo $conexion->error;
        

        echo" <script>
            window.alert('Se agrego correctamente');
        
        </script>";
    }


?>
<br> <br> <br>
<div class="container row">
    <div class="container col lg-12 md-12 mb-5">
        <br><br>
        <h2 class="text-center">Agregar Categoria</h2><br>

        <form action="panel.php?pagina=add_catg" method="POST">
        
            <label>Nombre Categoria:</label>
            <input type="text" name="nombrecate" placeholder="Ingrese nombre" autocomplete="off"><br>
            <label>Imagen Categoria:</label>
            <input name="archivo" type="file"/><br><br>
            <input type="submit" name="boton_addc" value="Agregar">
        </form>
    </div>
        
              
