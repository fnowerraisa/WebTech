<?php
include "../model/bookModel.php";

if(isset($_POST['action']))
{
    $action = $_POST['action'];

    if($action == "add")
    {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $status = $_POST['status'];

        if(insertBook($title, $author, $category, $status))
        {
            echo "Book Added Successfully";
        }
        else
        {
            echo "Failed";
        }
    }

    else if($action == "fetch")
    {
        $result = getAllBooks();

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['author']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <button onclick='editBook({$row['id']}, "{$row['title']}", "{$row['author']}", "{$row['category']}", "{$row['status']}")'>Edit</button>

                        <button onclick='deleteBook({$row['id']})'>Delete</button>
                    </td>
                  </tr>";
        }
    }

    else if($action == "delete")
    {
        $id = $_POST['id'];

        if(deleteBook($id))
        {
            echo "Deleted Successfully";
        }
        else
        {
            echo "Delete Failed";
        }
    }

    else if($action == "update")
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $status = $_POST['status'];

        if(updateBook($id, $title, $author, $category, $status))
        {
            echo "Updated Successfully";
        }
        else
        {
            echo "Update Failed";
        }
    }
}
?>