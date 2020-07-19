<?php

function insert_category() {
    global $connection;
    if (isset($_POST["submit"])) {
        $cat_title = $_POST["cat_title"];
        if (!$cat_title || empty($cat_title) || $cat_title =="") {
            echo "This field should not be empty";
        }else{
            $query = "INSERT INTO categories(title) ";
            $query .= "VALUE('$cat_title') ";
            $query_result = mysqli_query($connection, $query);
            if (!$query_result) {
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
    }
}

function delete_category() {
    global $connection;
    if (isset($_GET["delete"])) {
        $delete_cat_id = $_GET["delete"];
        echo $delete_cat_id;
        $query = "DELETE FROM categories where id = {$delete_cat_id}";
        $query_result = mysqli_query($connection, $query);
        if (!$query_result) {
            die("QUERY FAILED".mysqli_error($connection));
        }else{
            header("location: categories.php");
        }
    }
}

function delete_all_categories() {
    global $connection;
    if (isset($_GET["delete_all"])) {
        $query = "DELETE FROM categories";
        $query_result = mysqli_query($connection, $query);
        if (!$query_result) {
            die("QUERY FAILED".mysqli_error($connection));
        }else{
            header("location: categories.php");
        }
    }
}

function update_category() {
    global $connection;
    if (isset($_POST["submit_edit"])) {
        $cat_id = $_POST["cat_id"];
        $cat_title = $_POST["cat_title"];
        
        if (!$cat_id || !$cat_title || empty($cat_id) || empty($cat_title) || $cat_id == "" || $cat_title == ""){
            echo "Please choose the category which you want to update";
        }else{
            $query = "UPDATE categories ";
            $query .= "SET title = '{$cat_title}' ";
            $query .= "WHERE id = '{$cat_id}' ";
            $query_result = mysqli_query($connection, $query);
            if (!$query_result) {
                die("QUERY FAILED".mysqli_error($connection));
            }else{
                header("location: categories.php");
            }
        }
    }
}


?>