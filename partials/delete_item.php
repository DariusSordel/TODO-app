<?php

require_once __DIR__ . '/function.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if (deleteItem($id)) {
        echo "uspesne odstranene";
    } else {
        echo "item sa nepodaril odstranit";
    }
} else {
    echo "No 'id' parameter provided.";
}


