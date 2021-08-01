<?php

session_start();
unset($_SESSION["usuario"]);
unset($_SESSION["idRol"]);
session_destroy();
header("Location: ../../frontend");
