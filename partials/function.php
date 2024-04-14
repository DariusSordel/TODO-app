<?php

include __DIR__ . '/db_connect.php';

function insertData($form)
{
    global $mysqli; //including global variable from config/db_connect.php , access db connection

    $sql = "INSERT INTO items (text) VALUES (?)";
    $stmt = $mysqli->prepare($sql); // Prepare the SQL statement

    if ($stmt === false) {
        die("Prepare failed: " . $mysqli->error);
    } elseif ($stmt) {
        // Bind the value to the placeholder
        $stmt->bind_param("s", $form); // "s" znamena string

        if ($stmt->execute()) { // Execute the prepared statement
            $stmt->close();
            return true;
        } else {
            $stmt->close();

            return false;
        }
    }
}

function getItems() {
    global $mysqli;
    $sql =  "SELECT id, text FROM items";
    $result = $mysqli->query($sql);
    if ($result->num_rows == 0) {
        echo "<li class='list-group-item empty-message'>Your list is empty :(</li>";
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
function getLastId() {
    global $mysqli;
    $sql = "SELECT id FROM items ORDER BY id DESC LIMIT 1";
    $result = $mysqli->query($sql);
    if (!$result) {
        return false;
    }
    $row = $result->fetch_assoc();
    $result->free();
    return $row["id"];
}




