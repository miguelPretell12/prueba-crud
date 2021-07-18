<?php

include 'funciones.php';
include 'db/database.php';
require __DIR__.'/../vendor/autoload.php';

$db = conectarDB();

use Model\ActiveRecord;
ActiveRecord::setDB($db);

