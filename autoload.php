<?php

function autoLoad($className) {

    $className = str_replace("\\", "/", $className);

    require __DIR__ . "/" . $className . '.php';

}
spl_autoload_register("autoLoad");


