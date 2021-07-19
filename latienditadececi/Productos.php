<!DOCTYPE html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.ico">
        <title> La tiendita de Ceci</title>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <!--Posibles fondos de pantalla
        1° background-image: url("https://fondosmil.com/fondo/16187.jpg");
        2° background-image: url("https://fondosmil.com/fondo/18743.jpg");
        3° background-image: url("https://allegra.flowersetcfresno.com/pic/4319090_full-fondo-pantalla-hd-primavera-flor-de-primavera-fondos-de-pantalla-hd-wallpapers-hd.jpg");
        4° background-image: url("https://s1.1zoom.me/b4352/104/Texture_Tracery_Light_Blue_543533_1920x1080.jpg");
        5° background-image: url("https://i.pinimg.com/originals/2e/8f/61/2e8f61f0a0bed5c50d0daef5f83ec8ad.jpg");
        
    
    
        -->
        <?php
        
            include "conexion.php";
        ?>
        
        
        <style>
            *{
            box-sizing: border-box;
            }

            body {
            margin: 0;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                width: 100%;
                left: 0;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content .header {
                background: blueviolet;
                padding: 16px;
                color: white;
            }

            .dropdown:hover .dropdown-content {
            display: block;
            }

            /* Create three equal columns that floats next to each other */
            .column {
            float: left;
            width: 33.33%;
            padding: 10px;
            background-color: #ccc;
            height: 250px;
            }

            .column a {
            float: none;
            color: black;
            padding: 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            }

            .column a:hover {
            background-color: #ddd;
            }
            /* Clear floats after the columns */
            .row:after {
            content: "";
            display: table;
            clear: both;
            }
        </style>
</head>

<body>
<div class="module">
    <div class="module-inside">
        <nav class="nav">
            <div class="container" >
            <br><br>
            <div class="row mb-3">
                <div class="col-12">
                    <ul class="nav justify-content-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <p><br></p>
                            <form action="index.php">
                                <button class="a" onMouseover="this.style.color='red'" onMouseout="this.style.color='black'" type="submit" >INICIO</button>
                            </form>
                            <form action="Productos.php">
                                <button class="a" onMouseover="this.style.color='red'" onMouseout="this.style.color='black'" type="submit" >PRODUCTOS</button>
                            </form>
                            <form action="contacto.php">
                                <button class="a" onMouseover="this.style.color='red'" onMouseout="this.style.color='black'" type="submit" >CONTACTO</button>
                            </form>
                            <form action="sobrenosotros.php">
                                <button class="a" onMouseover="this.style.color='red'" onMouseout="this.style.color='black'" type="submit" >NOSOTROS</button>
                            </form>

                        </div>
                    </ul>
                </div>
            </div>
            <a href="login.php" ><img src="img/sesion.png" style="width:50px;
                height:50px;
                border-radius:100px;
                position: absolute;
                top: 70px; left: 1800px;"></a>
        </nav>
        
                <center><img src="img/latienditadececi.png" class="imgRedonda"></center>
                <center><p class="titulo">La Tiendita de Ceci</p></center>
                <div class="container" >
                <center><p class="inicio">Bienvenid@s tod@s a La tiendita de Ceci</p></center>
                <center><p class="inicio">Encuentra nuestros productos en
                                    Complejo 5, El tabo. #expoverano puesto 21</p></center>
                <div id="redes">   
                    <a id="instagram" href="https://www.instagram.com/latiendita_dececi/?hl=es-la" ><img src="img/ig.png"> </a><br><br>
                    <a id="facebook" href="https://www.facebook.com/blancamarialingerie-103484251484852" ><img src="img/face.png"></a>
                </div>
        <div class="container">
          
            <form action="Productos.php" method="POST">
            <p class="busqueda">Ingrese el filtro por Categoria:
                <select name="categoria">
                    <option value="0"> Seleccione categoria </option>
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
                <input type="submit" name="filtrar_c" value="Filtrar">
                <input type="submit" value="X">
                </p>
            </form>
            <hr>
            <br>
        </div>
                        
        <div class="row mb-3">
          
            <?php
                if(isset($_POST['filtrar_c']))
                {
                    $cod_cat=$_POST['categoria'];
                    if($cod_cat==0)
                    {
                        echo '
                        <script>
                            window.location="Productos.php";
                        </script>
                        ';
                    }
                    $sql="SELECT * FROM producto WHERE id_categoria1='$cod_cat'";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_array($result))
                    {
                    echo '<br><div class="col-md-4">';
                    if($mostrar['stock']>0)
                    {
                        echo "<center><p class= 'productos'>DISPONIBLE<br><br></p></center>";
                    }else{
                        echo "<center><p class= 'productos'>NO DISPONIBLE<br><br></p></center>";
                    }

                
                    echo '<center><img src="img/productos/'.$mostrar['nombre_imagen'].'" class="imgRedonda"></center><br>';
                    echo '<p class="productos"><b>Nombre</b> '.$mostrar['nombre_producto'].'<br>';
                    echo '<b>Talla</b> '.$mostrar['talla'].'<br>';
                    echo '<b>Stock</b> '.$mostrar['stock'].'<br>';
                    echo '<b>Precio $ </b> '.$mostrar['precio'].'<br>';
                    echo '<b>Detalle</b> '.$mostrar['detalles'].'<br></p>';
                    
                    echo '
                    <hr align="center">
                    </div>';
                    
                    }


                }
                else
                {
                
                    $sql="SELECT * FROM producto";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_array($result))
                    {
                        echo '<br><div class="col-md-4">';
                        if($mostrar['stock']>0)
                        {
                            echo "<center><p class= 'productos'>DISPONIBLE<br><br></p></center>";
                        }else{
                            echo "<center><p class= 'productos'>NO DISPONIBLE<br><br></p></center>";
                        }

                    
                        echo '<center><img src="img/productos/'.$mostrar['nombre_imagen'].'" class="imgRedonda"></center><br>';
                        echo '<p class="productos"><b>Nombre</b> '.$mostrar['nombre_producto'].'<br>';
                        echo '<b>Talla</b> '.$mostrar['talla'].'<br>';
                        echo '<b>Stock</b> '.$mostrar['stock'].'<br>';
                        echo '<b>Precio $ </b> '.$mostrar['precio'].'<br>';
                        echo '<b>Detalle</b> '.$mostrar['detalles'].'<br></p>';
                        
                        echo '
                        <hr align="center">
                        </div>';
                        
                    }
                }

            ?>

        </div>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	

    <style>
        


        .overlay {
            background: rgba(0,0,0,.3);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            align-items: center;
            justify-content: center;
            display: flex;
            visibility: hidden;
        }

        .overlay.active {
            visibility: visible;
        }

        .popup {
            background: #F8F8F8;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
            border-radius: 3px;
            font-family: 'Montserrat', sans-serif;
            padding: 20px;
            text-align: center;
            width: 600px;
            
            transition: .3s ease all;
            transform: scale(0.7);
            opacity: 0;
        }

        .popup .btn-cerrar-popup {
            font-size: 16px;
            line-height: 16px;
            display: block;
            text-align: right;
            transition: .3s ease all;
            color: #BBBBBB;
        }

        .popup .btn-cerrar-popup:hover {
            color: #000;
        }

        .popup h3 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 10px;
            opacity: 0;
        }

        .popup h4 {
            font-size: 26px;
            font-weight: 300;
            margin-bottom: 40px;
            opacity: 0;
        }

        .popup form .contenedor-inputs {
            opacity: 0;
        }

        .popup form .contenedor-inputs input {
            width: 100%;
            margin-bottom: 20px;
            height: 52px;
            font-size: 18px;
            line-height: 52px;
            text-align: center;
            border: 1px solid #BBBBBB;
        }

        .popup form .btn-submit {
            padding: 0 20px;
            height: 40px;
            line-height: 40px;
            border: none;
            color: #fff;
            background: #5E7DE3;
            border-radius: 3px;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            cursor: pointer;
            transition: .3s ease all;
        }

        .popup form .btn-submit:hover {
            background: rgba(94,125,227, .9);
        }

        /* ------------------------- */
        /* ANIMACIONES */
        /* ------------------------- */
        .popup.active {	transform: scale(1); opacity: 1; }
        .popup.active h3 { animation: entradaTitulo .8s ease .5s forwards; }
        .popup.active h4 { animation: entradaSubtitulo .8s ease .5s forwards; }
        .popup.active .contenedor-inputs { animation: entradaInputs 1s linear 1s forwards; }

        @keyframes entradaTitulo {
            from {
                opacity: 0;
                transform: translateY(-25px);
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes entradaSubtitulo {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes entradaInputs {
            from { opacity: 0; }
            to { opacity: 1; }
        }

    </style>

	<div class="contenedor">
		<article>
			<button id="btn-abrir-popup" class="btn-abrir-popup" ><img src="img/sesion.png" style="width:50px;
                height:50px;
                border-radius:100px;
                position: absolute;
                top: 70px; left: 1800px;"></button>
		
		</article>

		<div class="overlay" id="overlay">
			<div class="popup" id="popup">
				<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
			
				<form action="index.php" method="POST">
					<div class="contenedor-inputs">
                        <h3>Inicia Sesion como administrador</h3>
						<input type="text" name="ID" placeholder="Nombre">
						<input type="password" name="pass" placeholder="Password">
					</div>
					<input type="submit" name="boton_adm" class="btn-submit" value="Ingresar como administrador">
				</form>
			</div>
		</div>
	</div>

	<script>
        var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
        overlay = document.getElementById('overlay'),
        popup = document.getElementById('popup'),
        btnCerrarPopup = document.getElementById('btn-cerrar-popup');

        btnAbrirPopup.addEventListener('click', function(){
        overlay.classList.add('active');
        popup.classList.add('active');
        });

        btnCerrarPopup.addEventListener('click', function(e){
        e.preventDefault();
        overlay.classList.remove('active');
        popup.classList.remove('active');
        });
    </script>
