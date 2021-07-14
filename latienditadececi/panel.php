<head>
    <title>Administrador TDC</title>
    <link rel="shortcut icon" href="img/favicon2.ico">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">Panel de administrador</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                <h5>Productos</h5>
            </div>
            <li class="nav-item">
                <a href="panel.php?pagina=getprod"  class="nav-link"><span>Mostrar Productos</span> </a>
            </li>
            <li class="nav-item">
                <a href="panel.php?pagina=reg_prod" class="nav-link"><span>Registrar Producto</span> </a>
            </li>
            <li class="nav-item">
                <a href="panel.php?pagina=add_catg" class="nav-link"><span>Agregar Categoria</span> </a>
            </li>
            <li class="nav-item">
                <a href="panel.php?pagina=add_stock" class="nav-link"><span>Agregar Stock</span> </a>
            </li>
            <li class="nav-item">
                <a href="panel.php?pagina=mod_prod" class="nav-link"><span>Modificar producto</span> </a>
            </li>
            <li class="nav-item">
                <a href="panel.php?pagina=eliminarprod" class="nav-link"><span>Eliminar producto</span> </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                <h5>Ventas</h5>
            </div>
            <li class="nav-item">
                <a href="panel.php?pagina=informes"  class="nav-link"><span>Registo de Ventas</span> </a>
            </li>
            <li class="nav-item">
                <a href="panel.php?pagina=registrarventa"  class="nav-link"><span>Realizar Venta</span> </a>
            </li>
            
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a href="index.php"  class="nav-link"><span>Cerrar Sesion</span> </a>
            </li>
        </ul>

        <br>


</body>

</html>
    <?php 
        if(isset($_GET['pagina'])){
            if( $_GET['pagina'] == "getprod" || $_GET['pagina'] == "reg_prod"
            || $_GET['pagina'] == "add_stock" || $_GET['pagina'] == "mod_prod"
            || $_GET['pagina'] == "eliminarprod" || $_GET['pagina'] == "add_catg"


            || $_GET['pagina'] == "registrarventa" || $_GET['pagina'] == "informes"
            || $_GET['pagina'] == "apmaterno" || $_GET['pagina'] == "appaterno"
            || $_GET['pagina'] == "nombre"){
            include "vistas/".$_GET['pagina'].".php";
            }
            else{
                        include "vistas/getprod.php";
                    }
        }else{
            include "vistas/getprod.php";
        }
    ?>

 </html>
 