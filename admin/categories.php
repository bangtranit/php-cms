<?php include("includes/admin_header.php") ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/admin_navigation.php") ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Welcome to admin
                            <small>Author</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>

                        <div class="col-xs-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="cat_title" id="" class="form-control" placeholder="Category title" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" id="submit" class="btn btn-primary" placeholder="" aria-describedby="helpId" value="Add Category">
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM categories";
                                        $query_result = mysqli_query($connection, $query);
                                        if (!$query_result) {
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }else{
                                            while ($row = mysqli_fetch_assoc($query_result)) {
                                                $cat_id = $row["id"];
                                                $cat_title = $row["title"];
                                                ?>
                                                <tr>
                                                    <td> <?php echo $cat_id ?> </td>
                                                    <td> <?php echo $cat_title ?> </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    
                                    ?>

                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/admin_footer.php") ?>