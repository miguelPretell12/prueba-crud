<?php 

require_once __DIR__.'/../config/app.php';

use Controllers\crudController;
use Controllers\LoginController;
use MVC\Router;

$router = new Router();

//Zona Publica
$router->get('/',[LoginController::class,'login']);
$router->post('/',[LoginController::class,'login']);

$router->get('/admin',[crudController::class,'admin']);

$router->get('/admin/crear',[crudController::class,'crear']);
$router->post('/admin/crear',[crudController::class,'crear']);
$router->get('/admin/edit',[crudController::class,'actualizar']);
$router->post('/admin/edit',[crudController::class,'actualizar']);
$router->get('/logout', [LoginController::class,'logout']);

$router->post('/admin/eliminar',[crudController::class,'eliminar']);
$router->comprobarRutas();