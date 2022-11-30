<?php
$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "tiendanike");

$id = $_GET['id'];

$consulta = "SELECT * FROM nikeair WHERE id = '$id'";

$respuesta = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($respuesta);?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Tienda Nike</title>
</head>

<body>

    <nav class="navbar">
        <div class="divlogo">
            <a href="https://www.nike.com/ar/" target="_blank"><img class="logo" src="../img/nike_sport_logo_brand_icon_133237.png" alt=""></a>
            <h1 class="titulonav">Air Max</h1>
        </div>
        <div class="nav">
            <ul class="navlista">
                <li><a href="./productosadmin.php">PRODUCTOS</a></li>
            </ul>
        </div>

        <div class="logosnav">
        <div><a href="./agregar.html"><i class="bi bi-cloud-upload"></i></a></div>

            <div class="login"><i class="bi bi-person-fill"></i></div>
            <div class="cart"><i class="bi bi-cart-plus"></i></div>
            <div class="logout"><a href="../index.html"><i class="bi bi-box-arrow-left"></i></a></div>

        </div>
    </nav>
    <?php
        $modelo = $datos["modelo"];
        $talle = $datos["talle"];
        $precio = $datos["precio"];
        $imagen = $datos["imagen"];


    ?>
    

    <div class="container-producto">


        <img src="data:image/jpg;base64, <?php echo base64_encode($datos['imagen']) ?>" alt="">
        
        <div class="precio-talle">
        <h1><?php echo $modelo?></h1>

        <h6>Talles Disponible: <?php echo $talle?></h6>
        <p><i class="bi bi-tags-fill"></i> $<?php echo $precio?></p>
        <button> <a href="" class="agregarcarrito" > <i class="bi bi-cart-plus"></i> Agregar al Carrito</a></button>

        </div>

    </div>

    <footer class="footer">
        <div class="redes">
            <img src="../img/logo_orange_facebook_icon_134345.png" alt="fb">
            <img src="../img/logo_orange_instagramm_icon_134351.png" alt="ig">
            <img src="../img/logo_orange_whatsapp_icon_134347.png" alt="ws">
            <img src="../img/logo_orange_maps_icon_134384.png" alt="location">
        </div>
        <hr class="hrfooter">
        <div class="copyright">
            <p class="textofooter">
                <b>© Copyright - 2022 María Sol Arroyo</b>, TODOS LOS
                DERECHOS RESERVADOS. Las fotos contenidas en este site, el
                logotipo y las marcas son propiedad de <b>icon-icons.com</b> y/o
                de sus respectivos titulares. Está prohibida la reproducción
                total o parcial. Bahía Blanca - Provincia de
                Buenos Aires – Argentina
            </p>
        </div>
    </footer>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>