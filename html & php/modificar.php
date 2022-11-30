<?php
$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "tiendanike");

$id = $_GET['id'];
$consulta = "SELECT * FROM nikeair WHERE id = $id";
$respuesta = mysqli_query($conexion, $consulta);

$datos = mysqli_fetch_array($respuesta);

?>

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
    $gen = $datos['gen'];
    ?>
    <div class="container mod">
        <div class="row">


            <div class="textomodificar">
                <h2>Modificar Stock</h2>
                <p>Ingrese los nuevos datos a modificar <i class="bi bi-arrow-bar-right"></i></p>
            </div>

            <form id="form" method="POST" action="" enctype="multipart/form-data">

                <div>
                    <label class="form-label" for="modelo">MODELO</label>
                    <input class="form-control" type="text" name="modelo" placeholder="Modelo" value="<?php echo "$modelo"; ?>">
                </div>
                <div>
                    <label for="talle">TALLE</label>
                    <input class="form-control" type="text" name="talle" placeholder="Talle" value="<?php echo "$talle"; ?>">
                </div>

                <div>
                    <label for="precio">PRECIO</label>
                    <input class="form-control" type="text" name="precio" placeholder="Precio" value="<?php echo "$precio"; ?>">
                </div>


                <div class="divimg">
                    <label for="imagen"><i class="bi bi-card-image"></i></label>
                    <input class="form-control form-control-sm" type="file" name="imagen" placeholder="imagen">
                </div>

                <div> <input class="submit" type="submit" name="guardar_cambios" value="Guardar Cambios">
                    <button class="submit" type="submit" name="Cancelar" formaction="productosadmin.php">Cancelar</button>
                </div>


            </form>
            <?php
            if (array_key_exists('guardar_cambios', $_POST)) {

                $conexion = mysqli_connect("127.0.0.1", "root", "");
                mysqli_select_db($conexion, "tiendanike");

                //DATOS
                $modelo = $_POST['modelo'];
                $talle = $_POST['talle'];
                $precio = $_POST['precio'];
                $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

                $consulta = "UPDATE nikeair SET modelo ='$modelo',talle ='$talle',precio='$precio',imagen='$imagen'
                        WHERE id='$id'";

                mysqli_query($conexion, $consulta);
                header('location: productosadmin.php');
            }
            ?>

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