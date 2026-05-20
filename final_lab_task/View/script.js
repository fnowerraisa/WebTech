$(document).ready(function(){

    fetchBooks();

    $("#addBtn").click(function(){

        var title = $("#title").val();
        var author = $("#author").val();
        var category = $("#category").val();
        var status = $("#status").val();

        $.ajax({
            url: "../controller/bookController.php",
            type: "POST",
            data: {
                action: "add",
                title: title,
                author: author,
                category: category,
                status: status
            },

            success: function(response){
                alert(response);
                fetchBooks();
                clearFields();
            }
        });
    });


    $("#updateBtn").click(function(){

        var id = $("#book_id").val();
        var title = $("#title").val();
        var author = $("#author").val();
        var category = $("#category").val();
        var status = $("#status").val();

        $.ajax({
            url: "../controller/bookController.php",
            type: "POST",
            data: {
                action: "update",
                id: id,
                title: title,
                author: author,
                category: category,
                status: status
            },

            success: function(response){
                alert(response);
                fetchBooks();
                clearFields();
            }
        });
    });

});


function fetchBooks()
{
    $.ajax({
        url: "../controller/bookController.php",
        type: "POST",
        data: {
            action: "fetch"
        },

        success: function(data){
            $("#bookTable").html(data);
        }
    });
}


function deleteBook(id)
{
    $.ajax({
        url: "../controller/bookController.php",
        type: "POST",
        data: {
            action: "delete",
            id: id
        },

        success: function(response){
            alert(response);
            fetchBooks();
        }
    });
}


function editBook(id, title, author, category, status)
{
    $("#book_id").val(id);
    $("#title").val(title);
    $("#author").val(author);
    $("#category").val(category);
    $("#status").val(status);
}


function clearFields()
{
    $("#book_id").val("");
    $("#title").val("");
    $("#author").val("");
    $("#category").val("");
}