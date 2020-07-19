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


function insert_post(){
    global $connection;
    if (isset($_POST["submit"])){
        $post_title = $_POST["post_title"];
        $post_category = $_POST["post_category"];
        $post_author = $_POST["post_author"];
        $post_status = $_POST["post_status"];
        $post_image = $_FILES["post_image"]["name"];
        $post_image_temp = $_FILES["post_image"]["tmp_name"];
        $post_tags = $_POST["post_tags"];
        $post_content = $_POST["post_content"];
        $post_date = date("d-m-y");
        $post_comment_count = 100;

        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts(post_title, cat_id, post_author, post_status, post_image, post_tags, post_content, post_date, post_comment_count) ";
        $query .= "VALUES('{$post_title}', '{$post_category}', '{$post_author}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', '{$post_date}', '{$post_comment_count}')";
        $query_result = mysqli_query($connection, $query);
        if (!$query_result) {
            die("QUERY FAILED".mysqli_error($connection));
        }
        header("location: posts.php");
    }
}


function delete_post() {
    global $connection;
    if (isset($_GET["delete"])){
        $delete_post_id = $_GET["delete"];
        if (!$delete_post_id || $delete_post_id == "") {
            echo "please choose the post which you want to delete";
        }else{
            $query = "DELETE FROM posts WHERE id = $delete_post_id";
            $query_result = mysqli_query($connection, $query);
            if (!$query_result) {
                die ("QUERY FAILED".mysqli_error($connection));
            }

            $query_find = "SELECT post_image FROM posts where id = $delete_post_id";
            $query_find_result = mysqli_query($connection, $query_find);
            if (!$query_find_result) {
                die ("QUERY FAILED".mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($query_find_result)) {
                $post_image = $row["post_image"];
                if (file_exists($post_image)) {
                    unlink($post_image);
                    echo 'File '.$post_image.' has been deleted';
                } else {
                    echo 'Could not delete '.$post_image.', file does not exist';
                }
            }
        }
    }
}

?>