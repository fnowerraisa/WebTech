<?php
$conn = mysqli_connect("localhost","root","","library_db");

if(!$conn){
    die("Connection Failed: " .myscqli_conect_error());
}
?>