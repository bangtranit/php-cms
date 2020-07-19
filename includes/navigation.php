<?php include("db_connection.php") ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <?php 
                    $query = "SELECT * FROM categories";
                    $result_query = mysqli_query($connection, $query);
                    if (!empty($result_query)) {
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $cat_title = $row["title"];
                            ?>
                                <li>
                                    <a href="#"> <?php echo $cat_title ?></a>
                                </li>
                            <?php
                        } 
                    }
                ?>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <!-- <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>