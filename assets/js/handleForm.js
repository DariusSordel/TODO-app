$(document).ready(function (){
    $("#form1").submit(function (event) {
        event.preventDefault(); // toto preventuje event aby bol submited defaultne

        var formData = $(this).serialize() //zoberie data z formu a da ich do formatu pre server

        $.ajax({ //ajax request posle v pozadi na server ktory pojde na URL
            url:"partials/insert.php",
            type:"POST",
            data: formData,
            success: function (response) { // callback funkcia spusti sa ked server odpovie, tu vieme upravit stranku bez reloadu
                var $newListItem = $("<li class='list-group-item'>" + response + "<button id='list-button' class='btn-close' value='" +/* $item['id'] */ "' ></li>")
                $(".list-group").append($newListItem)//zmena
            },
        })
    })

    $(".btn-close").click(function () {
        var itemId = $(this).val();

        var confirmDelete = confirm("Are you sure you want to delete this item?");
        var $button = $(this);
        var $myList = $(".list-group");


        if (confirmDelete) {
            $.ajax({
                url: "partials/delete_item.php",
                type: "POST",
                data: {id: itemId},
                success: function (response) {
                    $button.closest("li").remove();
                    if ($myList.children().length === 0) {
                        var $li = $("<li class='list-group-item'>Your list is empty :(</li>")
                        $myList.append($li);
                    }
                },
                error: function () {
                    console.error("An error occurred during the item deletion process."); //this is the error im getting
                }
            });
        }
     });
})
