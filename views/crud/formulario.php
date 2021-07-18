    <div class="campo">
        <label for="">Nombre</label>
        <input type="text" placeholder="tu nombre" name="user[nombre]" value="<?php echo $usuario->nombre ?>">
    </div>
    <div class="campo">
        <label for="">Apellido</label>
        <input type="text" placeholder="tu apellido" name="user[apellido]" value="<?php echo $usuario->apellido ?>">
    </div>
    <div class="campo">
        <label for="">DNI</label>
        <input type="text" placeholder="tu dni"name="user[dni]" value="<?php echo $usuario->dni ?>"> 
    </div>
    <div class="campo">
        <label for="">E-mail</label>
        <input type="email" placeholder="tu email" name="user[correo]" value="<?php echo $usuario->correo ?>">
    </div>
    <div class="campo">
        <label for="">Contraseña</label>
        <input type="password" placeholder="tu contraseña" name="user[pass]" value="<?php echo $usuario->pass ?>">
    </div>
