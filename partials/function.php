<?php

include __DIR__ . '/db.php';

function insertData($form)
{
    global $mysqli; //including global variable from config/db.php , access db connection

    $sql = "INSERT INTO items (text) VALUES (?)";
    $stmt = $mysqli->prepare($sql); // Prepare the SQL statement

    if ($stmt === false) {
        die("Prepare failed: " . $mysqli->error);
    } elseif ($stmt) {
        // Bind the value to the placeholder
        $stmt->bind_param("s", $form); // "s" indicates a string, adjust if your data type is different

        if ($stmt->execute()) { // Execute the prepared statement
            $stmt->close();
            $mysqli->close();
            return true;
        } else {
            $stmt->close();
            $mysqli->close();
            return false;
        }
    }
}

function getItems() {
    global $mysqli;
    $sql =  "SELECT id, text FROM items";
    $result = $mysqli->query($sql);
    if ($result->num_rows == 0) {
        echo "<li class='list-group-item'>Your list is empty :(</li>";
    }else {
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

function deleteItem($id)
{
    global $mysqli;


    $sql = "DELETE FROM items WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);


        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    } else {
        echo "prepare failed: " . $mysqli->error;
    }
}



