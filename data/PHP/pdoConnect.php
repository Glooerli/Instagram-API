<?php
try {
    $config = new PDO('mysql:host=127.0.0.1;dbname=roobique', 'root', 'Lego-223');
    $config->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
    die();
}