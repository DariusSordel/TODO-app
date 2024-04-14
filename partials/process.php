<?php

require_once __DIR__ . '/function.php';

ob_start();

if (isset($_POST['message'])) {
    $form = $_POST['message'];

    if (insertData($form)) {
        $lastId = getLastId();
        $responseData = array(
            'idFromDatabase' => $lastId,
            'formData' => $form
        );
        ob_end_flush();
        echo json_encode($responseData);
    } else {
        $errorResponse = json_encode(array('errorMessage' => 'Something went wrong'));
        header('Content-type: application/json');
        ob_end_flush();
        echo $errorResponse;
    }
}
