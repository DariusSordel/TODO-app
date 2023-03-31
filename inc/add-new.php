<?php

require 'inc/config.php';

$id = $database->insert('items', [
    'text' => $_POST['message']
]);

if ($id) {
    echo 'pridal si nieco<br>';
    echo '<a href="/TODO-app">back home</a>';
}