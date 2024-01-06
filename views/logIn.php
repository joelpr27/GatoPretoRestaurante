<html>

<?php include_once "header.php"; ?>

<section class="d-flex">
    <div class="row w-100 mx-0 px-3 d-flex justify-content-center">
        <div class="col-5 pt-5 ms-xl-4 ms-lg-4 ms-md-4">
            <form action="<?= URL . '?controller=producto&action=logIn' ?>" method="post" class="d-flex flex-column justify-content-center">

                <h5>LOGIN</h5>

                <label for="mail">Correo Electronico</label>
                <input id="mail" name='mail' required>

                <label for="password">Contraseña</label>
                <input id="password" name='password' required>

                <button type="submit" class="buttonEstilo mt-4">Iniciar Session</button>

            </form>
        </div>


        <div class="col-5 pt-5 ms-xl-4 ms-lg-4 ms-md-4">
        <h5>REGISTER</h5>

        <form action="<?= URL . '?controller=producto&action=register' ?>" method="post" class="d-flex flex-column justify-content-center">

            <label for="name">Nombre</label>
            <input id="name" name='name' required>

            <label for="surname">Apellido</label>
            <input id="surname" name='surname' required>

            <label for="mail">Correo Electronico</label>
            <input id="mail" name='mail' required>

            <label for="password">Contraseña</label>
            <input id="password" name='password' required>

            <button type="submit" class="buttonEstilo  mt-4">Crear Cuenta</button>

        </form>

    </div>
</section>

</html>