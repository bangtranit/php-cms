
<?php 
    $query = "SELECT * FROM posts";
    $query_result = mysqli_query($connection, $query);
    if (!$query_result || count($query_result) == 0) {
        die("QUERY FAILED".mysqli_error($connection));
    }else if (count($query_result) == 0){
        echo "<h1>NO POSTS</h1>";
    }else{
        ?>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($query_result)) {
                $post_id = $row["id"];
                $post_author = $row["post_author"];
                $post_title = $row["post_title"];
                $post_cat = $row["cat_id"];
                $post_status = $row["post_status"];
                $post_image = $row["post_image"];
                $post_tags = $row["post_tags"];
                $post_comments = $row["post_comment_count"];
                $post_date = $row["post_date"];
                ?>
                <tr>
                    <td> <?php echo $post_id ?> </td>
                    <td> <?php echo $post_author ?> </td>
                    <td> <?php echo $post_title ?> </td>
                    <td> <?php echo $post_cat ?> </td>
                    <td> <?php echo $post_status ?> </td>
                    <td style="width: 8%"> <img class="img-responsive" src="../images/<?php echo $post_image ?>" alt="" style="width: 100px; height:50px"
                        ></td>
                    <td> <?php echo $post_tags ?> </td>
                    <td> <?php echo $post_comments ?> </td>
                    <td> <?php echo $post_date ?> </td>
                </tr>
                <?php
            }
    }
?>                        
