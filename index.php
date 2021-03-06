
<?php
    include("includes/header.php");
    include("includes/db_connection.php");
?>
<body>

    <!-- Navigation -->
    
    <?php include("includes/navigation.php") ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php 
                    $query = "SELECT * FROM posts";
                    $query_result = mysqli_query($connection, $query);
                    if (!$query_result){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                    
                    if (count($query_result) > 0) {
                        while ($row = mysqli_fetch_assoc($query_result)) {
                                $post_title = $row["post_title"];
                                $post_content = $row["post_content"];
                                $post_image = $row["post_image"];
                                $cat_id = $row["cat_id"];
                                $post_author = $row["post_author"];
                                $post_date = $row["post_date"];
                                $post_tags = $row["post_tags"];
                                $post_comment_count	 = $row["post_comment_count"];
                                $post_status = $row["post_status"];
                                $post_user = $row["post_user"];
                                $post_views_count	 = $row["post_views_count"];
                            ?>
                            
                                <h2>
                                    <a href="#"> <?php echo $post_title  ?> </a>
                                </h2>
                                <p class="lead">
                                    by <a href="index.php"><?php echo $post_author  ?> </a>
                                </p>
                                    <p>
                                        <span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date  ?> 
                                    </p>
                                <hr>
                                    <img class="img-responsive" src="images/<?php echo $post_image ?>"  alt="">
                                <hr>
                                    <p> <?php echo $post_content  ?>  </p>
                                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                                <hr>
                    <?php
                        }
                    }else{
                        echo "<h1>NO RESULTS</h1>";
                    }
                ?>
                <!-- Pager -->
                <?php  include("includes/pagenavi.php") ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php") ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include("includes/footer.php") ?>
