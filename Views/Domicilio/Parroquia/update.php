<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/Funeraria/Styles/general.css">

    <title>Parroquias</title>

</head>

<body>

    <!-- Nav -->
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Views/Layouts/Nav/nav_admin.php");
    ?>

    <!-- Main -->

    <section class="home">
        <div class="main">

            <h2 class="title-h2">Actualizar Parroquia</h2>

            <h3 class="title-h3">Localidad - Parroquia</h3>
            
            <form class="formulario" method="POST">

                <?php
                include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/EstadoModel.php");
                $sql_estado = EstadoModel::read();
                ?>

                <div class="secc-form-2">

                    <label for="validationCustom02" class="label-form">Código</label>
                    <input type="hidden" class="input-form" id="validationCustom02" value="<?= $_GET['parroquia_codigo'] ?>" name="codigo">
                    <input type="text" class="input-form" id="validationCustom02" value="<?= $_GET['parroquia_codigo'] ?>" disabled>

                </div>

                <!--Estados-->
                <div class="secc-form-2">
                    <label for="validationCustom02" class="label-form">Estado</label>
                    <select class="select-form" name="slc_estado" id="slc_estado">
                        <option value="<?= $_GET['estado_codigo'] ?>"><?= $_GET['estado'] ?></option>
                        <?php
                        while ($datosE = $sql_estado->fetch_assoc()) {
                            if ($datosE['codigo'] != $_GET['estado_codigo']) { ?>
                                <option value="<?php echo $datosE['codigo'] ?>"> <?php echo $datosE['descripcion'] ?> </option>
                        <?php }
                        }
                        ?>
                    </select>
                </div>

                <!-- Municipio -->
                <div class="secc-form-2">
                    <label for="validationCustom02" class="label-form">Municipio</label>
                    <select class="select-form" name="slc_municipio" id="slc_municipio">
                        <option value="<?= $_GET['municipio_codigo'] ?>"><?= $_GET['municipio'] ?></option>
                    </select>
                </div>

                <!--Parroquia-->
                <div class="secc-form-2">

                    <label class="label-form" for="input-estados">Parroquia</label>
                    <input type="text" autocomplete="off" class="input-form" id="validationCustom02" value="<?= $_GET['parroquia'] ?>" required name="descripcion">

                </div>

                <button type="submit" class="bttn" name="actualizar" value="ok">Actualizar</button>

            </form>

            <?php
                include_once($_SERVER['DOCUMENT_ROOT'] . "/Funeraria/Models/Domicilio_Models/ParroquiaModel.php");

                if (isset($_POST['actualizar'])) {

                    $resultado = ParroquiaModel::update();

                    if ($resultado) {
                        echo "<script>window.alert('La parroquia se ha actualizado exitosamente')</script>";
                        echo "<script>window.location.replace('/Funeraria/Views/Domicilio/Parroquia/index.php')</script>";
                    } else {
                        echo "<script>window.alert('La parroquia no pudo ser actualizada, verifique que los datos sean correctos e inténtelo nuevamente')</script>";
                    }
                }
            ?>

        </div>
    </section>


</body>

</html>