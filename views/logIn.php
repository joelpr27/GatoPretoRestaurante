<html>

<?php include_once "header.php"; ?>

<section class="d-flex">
    <div class="row w-100 mx-0 px-3 d-flex justify-content-center">

        <form action="<?= URL . '?controller=producto&action=logIn' ?>" method="post" class="col-6 pt-5 d-flex flex-column justify-content-center">
            
            <h6>LOGIN</h6>
        
            <label for="mail">Correo Electronico</label>
            <input id="mail" name='mail'required>

            <label for="password">Contraseña</label>
            <input id="password" name='password'required>

            <button type="submit">Guardar</button>

        </form>

        <form action="<?= URL . '?controller=producto&action=register' ?>" method="post" class="col-6  pt-5 d-flex flex-column justify-content-center">
            
            <h6>REGISTER</h6>
            <label for="name">Nombre</label>
            <input id="name" name='name' required>
            
            <label for="surname">Apellido</label>
            <input id="surname" name='surname' required>

            <label for="mail">Correo Electronico</label>
            <input id="mail" name='mail' required>

            <label for="password">Contraseña</label>
            <input id="password" name='password' required>

            <button type="submit">Guardar</button>

        </form>

    </div>
</section>

</html>