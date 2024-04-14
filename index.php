<?php include "partials/header.php" ?>
<?php include "partials/db_connect.php" ?>
<?php include "partials/function.php" ?>


<div class="modal-header">
    <h1>Todo list</h1>
</div>

<div class="row mt-4 mb-3">
    <ul class="list-group col-6" id="list1">

        <?php
        $items = getItems();
        if ($items != null) {
            foreach ($items as $item) {
                echo "<li class='list-group-item'>" . $item['text'] . "<button id='list-button' class='btn-close' value='" . $item['id'] . "' ></li>";
            }
        }
        ?>
    </ul>

    <form id="form1" class="col-sm-6" method="post" action="partials/process.php">
        <div class="form-group">
            <textarea class="form-control" name="message" id="text" rows="3" required></textarea>
        </div>
        <input class="btn" id="btn1" type="submit" value="submit">
    </form>
</div>




