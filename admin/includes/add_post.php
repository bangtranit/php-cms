<?php

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

?>


<div class="col-xs-8">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Post Title</label>
            <input type="text" name="post_title" id="" class="form-control" placeholder="Title" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Post Category</label>
            <input type="text" name="post_category" id="" class="form-control" placeholder="Category" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Post Author</label>
            <input type="text" name="post_author" id="" class="form-control" placeholder="Author" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Post Status</label>
            <input type="text" name="post_status" id="" class="form-control" placeholder="Status" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Post Image</label>
            <input type="file" name="post_image" id="" class="form-control" placeholder="Image" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Post Tags</label>
            <input type="text" name="post_tags" id="" class="form-control" placeholder="Status" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Post Content</label>
            <textarea name="post_content" id="" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="" class="btn btn-primary" value="Add Post" aria-describedby="helpId">
        </div>


    </form>
</div>