<?php
session_start();
include '../Model/authorModel.php';

if(isset($_GET['id'])) {
    $author_id = $_GET['id'];
    if(deleteAuthor($author_id)){
        header('Location: ../Control/view_author.php');
    } else {
        echo "Error deleting record";
    }
} else {
    header('Location: ../Control/view_author.php');
}
?>
