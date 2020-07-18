<?php include("db_connection.php") ?>
<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">

        <h4>Blog Search</h4>
        <form action="search.php" method="POST">
        <!-- /.input-group -->
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
        </form>

    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    
                    <?php 
                        $query = "SELECT * FROM categories";
                        $query_result = mysqli_query($connection, $query);
                        if (!empty($query_result)) {
                            while ($row = mysqli_fetch_assoc($query_result)) {
                                $cat_id = $row["id"];
                                $cat_title = $row["title"];
                                ?>
                                <li><a href="#"> <?php echo $cat_title ?> </a>
                                </li>
                                <?php
                            }
                        }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>