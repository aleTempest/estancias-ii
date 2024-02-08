<?php
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}

$uri .= $_SERVER['HTTP_HOST'];

// Redirigir a 'test.html' si está habilitado el inicio de sesión (puedes ajustar esta lógica según tus necesidades)
if (isset($_SESSION['user'])) {
    header('Location: '.$uri.'/test.html');
    exit;
} else {
    // De lo contrario, redirigir a 'index.html'
    header('Location: '.$uri.'/index.html');
    exit;
}