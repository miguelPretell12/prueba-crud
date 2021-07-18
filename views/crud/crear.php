<h1>Registro de Usuario</h1>
<div class="table-responsive">
    <?php foreach($errores as $error): ?>
        <div class="alert alert-success w-100" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form method="POST" class="formulario" enctype="multipart/form-data">
    
        <?php include __DIR__."/formulario.php" ?>

        <div class="posicion-flex">
            <div>
                <a href="/admin" class="btn btn-dark">Volver</a>
                <input type="submit" value="Guardar" class="btn btn-success">
            </div>
        </div>
    </form>
</div>
