
    <h2 class="encabezado">Administracion de Clientes</h2>
    <a href="/admin/crear" class="btn btn-primary m-2">Agregar Usuario</a>
    <div class="table-responsive">
    <table class="table table-striped" style="width:100%"  id='example'>
        <thead>
            <tr>
                <th>Apellido y Nombre</th>
                <th>D.N.I</th>
                <th>E-mail</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $user): ?>
                <tr>
                    <td><?php echo $user->apellido.', '.$user->nombre ?></td>
                    <td><?php echo $user->dni ?></td>
                    <td><?php echo $user->correo  ?></td>
                    <td>
                        <a href="/admin/edit?id=<?php echo $user->id ?>" class="btn btn-warning w-100 m-1">Editar</a>
                        <form action="/admin/eliminar" method="post">
                            <input type="hidden" name="id" value="<?php echo $user->id ?>">
                            <input type="submit" class="btn btn-danger w-100 m-1" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>   
</div>