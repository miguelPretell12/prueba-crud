<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Prueba</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/datatables/dataTables.bootstrap5.min.js"/>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
<div class="pagina">
                <header class="header">
                    <div class="nombre-sitio">
                        <h1 class="escritorio">CRUD-Usuarios</h1>
                        <h1 class="movil">CRUD</h1>
                    </div>
                    <div class="barra">
                        <div class="menu-izquierdo">
                            <i class="fas fa-arrow-left"></i>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div class="menu-derecho">
                            <div class="cerrar caja">
                                <a href="/logout">
                                    Cerrar Sesion
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
                <main class="contenedor-principal">
                    <aside class="sidebar">
                        <div class="usuario">
                            <img src="img/usuario.svg" alt="">
                            <p>Bienvenido: <span>Admin</span></p>
                        </div>
                        <div class="menu-admin">
                            <h2>Menú de Administracion</h2>
                            <ul class="menu">
                                <li>
                                    <a href="/admin">
                                        <i class="fas fa-user"></i>
                                        clientes
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/admin">
                                                <i class="fas fa-list"></i>
                                                ver todos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/admin/crear">
                                                <i class="fas fa-plus"></i>
                                                Agregar Nuevo
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <div class="contenido">
                       <?php echo $contenido; ?>
                    </div>
                </main>
            </div>
    <script src="/build/dataTables/jquery-3.5.1.js"></script>
    <script src="/build/dataTables/jquery.dataTables.min.js"></script>
    <script src="/build/dataTables/dataTables.bootstrap5.min.js" ></script>
    <script src="/build/dataTables/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/build/js/bundle.min.js" defer></script>
</body>
</html>