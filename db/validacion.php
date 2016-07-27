<?php

/*Función para la validación del nombre o apellidos del usuario
que debe contener al menos 3 caracteres*/

function validarUsuario($nombre)
{
    return preg_match("/^([a-z ñáéíóú]{2,60})$/i", $nombre);
}

/*Función para validad número de teléfonos en los formatos siguientes
con posibilidad de capturar
espacios o guiones como separación:
+34 9XX XX XX XX 9XX XX XX XX 6XX XX XX XX 7XX-XX-XX-XX 6XXXXXXXX */


function validarTelefono($telefono)
{
    return preg_match("/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/", $telefono);
}
