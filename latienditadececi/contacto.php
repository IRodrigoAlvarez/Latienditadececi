<!DOCTYPE html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.ico">
        <title> La tiendita de Ceci</title>
        <link rel="stylesheet" href="css/index.css">
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
            if(isset($_POST["boton_enviar"]))
            {

            
                $para=$_POST["correo"];
                $asunto=$_POST["asunto"];
                $nombre=$_POST["nombre_per"];
                $celular=$_POST["celular"];
                $descripcion="
                
                Nombre del cliente : $nombre
                
                celular : $celular
                
                mensaje: ".$_POST['mensaje']."?     
                
                "
                ;

              
            }

        ?>
        
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Sansita+Swashed&display=swap');
            @import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css");
            body{
                background:#e7ebda;
                zoom: 75%;
            }
            
        
            p {
                font-family: 'Sansita Swashed', cursive;
                font-size: 150%;
            }

            p.titulo{
                font-size: 100px;
                font-family: 'Dancing Script', cursive;
            }

            p.inicio{
                font-size: 30px;
                font-family: 'Sansita Swashed', cursive;
            }


            p.redes{
                font-size: 20px;
                font-family: 'Sansita Swashed', cursive;
            }

            p.busqueda{
                font-size: 16px;
                font-family: 'Gloria Hallelujah', cursive;
            }




            .fa {
                padding: 20px;
                font-size: 30px;
                width: 50px;
                text-align: center;
                text-decoration: none;
                margin: 5px 2px;
            }
            .fa:hover {
                opacity: 0.5;
            }
            .fa-youtube {
                color: red;
            }
           

            #redes{
                position: fixed;
                left:0px;top:350px;
                border: 1px solid black;
                padding: 10px;
                font-weight: 600;
                color: #AFEEEE;
                background-color: 	#24C1D9;
                border-radius: 6px;
                        
            }
            #redes:hover{
                color: 	#24C1D9;
                background-color: #AFEEEE;
            }
            
            button{
                font-family: 'Dancing Script', cursive;
                font-size: 30px;
                background: transparent;
                border: none !important;
                height: 100px;
                width: 250px;
                font-weight: 1000;

            }
            button.abajo{
                font-family: 'Dancing Script', cursive;
                font-size: 15px;
                background: transparent;
                border: none !important;
    
            }
            #instagram{
                position: relative;
              
            }
            #facebook{
                position: relative;
                
            }
            
            .btn-light-moon {
                padding: 10px;
                font-weight: 600;
                font-size: 20px;
                color: #FFFFFF;
                background-color: #24C1D9;
                border-radius: 6px;
                border: 2px solid #0016b0;
            }
            .btn-light-moon:hover{
                color: #24C1D9;
                background-color: #AFEEEE;
            }
            
            .btn-rounded {
                border-radius: 35px;
            }

            hr {
                border-top: 1px solid #9E9E9E;
            }

            .module {
                position: relative;
            }
            .module::before {
                background-image: url("https://i.pinimg.com/236x/4c/da/9d/4cda9d51b9effa306a322fb8855ae65f.jpg");
                content: "";
                position: absolute;
                top: 0; left: 0;
                width: 100%; height: 100%;
                filter: blur(3px);  
            }

            .module-inside{
                /* This will make it stack on top of the ::before */
                position: relative;
            }
            .imgRedonda {
                width:200px;
                height:200px;
                border-radius:100px;
            }
        </style>
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
            <div class="container">
            <br><br>
            <div class="row mb-3">
                <div class="col-12">
                    <ul class="nav justify-content-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <p><br></p>
                            <form action="index.php">
                                <button onMouseover="this.style.color='red'" onMouseout="this.style.color='black'" type="submit" >INICIO</button>
                            </form>
                            <form action="contacto.php">
                                <button onMouseover="this.style.color='red'" onMouseout="this.style.color='black'" type="submit" >VITRINA DE PRODUCTOS</button>
                            </form>
                            <form action="contacto.php">
                                <button onMouseover="this.style.color='red'" onMouseout="this.style.color='black'" type="submit" >CONTACTO</button>
                            </form>
                            <form action="sobrenosotros.php">
                                <button onMouseover="this.style.color='red'" onMouseout="this.style.color='black'" type="submit" >NOSOTRAS</button>
                            </form>

                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        
                <center><img src="img/latienditadececi.png" class="imgRedonda"></center>
                <center><p class="titulo">La Tiendita de Ceci</p></center>
                <div class="container" >
                <center><p class="inicio">Bienvenid@s tod@s a La tiendita de Ceci</p></center>
                <center><p class="inicio">Encuentra nuestros productos en
                                    Complejo 5, El tabo. #expoverano puesto 21</p></center>

        





                                    <br><br><br><br><br><br>
<div class="row">
  <br><br><br><br><br><br>

      <div class="container col-md-4 mb-3">
        <br> <br>
        <div class="card">
          <h5 class="card-header info-color text-center py-4 ">
          Contactanos</h5>
          <!--Card content-->
          <div class="card-body px-lg-5 pt-0">
            <form class="text-center" style="color: #757575;" action="contacto.php" method="POST">

              <!-- Name -->
              <div class="md-form mt-3">
                  <input type="text" name="nombre_per" id="materialContactFormName" class="form-control">
                  <label for="materialContactFormName">Nombre</label>
              </div>
              <div class="md-form mt-3">
                  <input type="text"name="asunto" id="materialContactFormName" class="form-control">
                  <label for="materialContactFormName">Asunto </label>
              </div>
              <div class="md-form mt-3">
                  <input type="text" name="celular"id="materialContactFormName" class="form-control">
                  <label for="materialContactFormName">Celular </label>
              </div>
              <!-- E-mail -->
              <div class="md-form">
                  <input type="email" name="correo" id="materialContactFormEmail" class="form-control">
                  <label for="materialContactFormEmail">E-mail</label>
              </div>


              <!--Message-->
              <div class="md-form">
                  <textarea id="materialContactFormMessage" name="mensaje" class="form-control md-textarea" rows="3"></textarea>
                  <label for="materialContactFormMessage">Mensaje</label>
              </div>
              <!-- Send button -->
              <input class="btn  btn-rounded btn-block z-depth-0 my-4 waves-effect bg-orange2" name="boton_enviar" type="submit"> Enviar </input>
              
            </form>
          </div>
        </div>
      </div>
</div>

<!-- Footer -->
<footer class="page-footer font-small pt-4 mt-4">

<!-- Footer Links -->
<div class="container text-center text-md-left">


<!-- Copyright -->
<div class=" container text-center py-3">

</div>
</footer>
<br>

<br><br>
<!-- Footer -->
<!--Jquery-->
<script src="./js/jquery-3.5.1.min.js"></script>
        <!--Popper.js-->
        <script src=".js/popper.min.js"></script>
        <!--Bootstrap JS-->
        <script src="./js/bootstrap.min.js"></script>
        
    </body>

</html>                                   