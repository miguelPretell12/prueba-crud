<div class="login-all">
        <div class="login">
            <h1>Iniciar Sesion</h1>
            <form id="formulario" method="POST" action="">
            <?php foreach($errores as $error): ?>
                <div class="alert alert-success w-100" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>
                <div class="campo">
                    <i class="far fa-envelope"></i>
                    <input id="email" type="email" placeholder="E-mail" name="correo">
                </div>
                <div class="campo">
                    <i class="fas fa-unlock-alt"></i>
                    <input id="password" type="password" placeholder="Contraseña" name="pass">
                </div>
                <input type="submit" class="boton" id="boton">
            </form>

            <div class="triangulo">

            </div>
        </div>
        <div class="imagen-login">
            <img src="build/img/img1.webp" alt="img login">
        </div>
</div>