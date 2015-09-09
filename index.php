<?php
#define('BASE_URL', 'http://sevg-sena363405.rhcloud.com');
define('BASE_URL', 'http://localhost/sevg');

if(array_key_exists('Id_Usuario', $_SESSION)) {
    header("Location: ".BASE_URL."/backend");
} else {
    header("Location: ".BASE_URL."/frontend");
}
