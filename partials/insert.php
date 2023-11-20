<?php

require_once __DIR__ . '/function.php';


if (isset($_POST['message'])) {
    $form = $_POST['message'];

    if (insertData($form)) {
        echo "data inserted successfully!";
    } else {
        echo "failed";
    }
}
