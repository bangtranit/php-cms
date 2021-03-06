<?php 
include("includes/admin_header.php");
?>

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

                        <?php 
                            insert_category();

                            delete_category();

                            update_category();

                            delete_all_categories()
                        
                        ?>

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="">Add Category</label>
                                    <input type="text" name="cat_title" id="" class="form-control" placeholder="Category title" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" id="submit" class="btn btn-primary" placeholder="" aria-describedby="helpId" value="Add Category">
                                </div>
                            </form>

                            <br>


                                    <?php 
                                        if (isset($_GET['edit'])){
                                            $edit_cat_id = $_GET['edit'];
                                            if (!$edit_cat_id || empty($edit_cat_id) || $edit_cat_id == "") {
                                                echo "Please choose the category which you want to update";
                                            }else{
                                                $query = "SELECT * FROM categories where id = '{$edit_cat_id}'";
                                                $query_result = mysqli_query($connection, $query);
                                                while ($row = mysqli_fetch_assoc($query_result)) {
                                                    $cat_id = $row["id"];
                                                    $cat_title = $row["title"];
                                                    ?>
                                                    <form action="" method="POST">
                                                        <div class="form-group">
                                                            <label for="">Update Category</label>
                                                            <input type="hidden" name="cat_id" id="" class="form-control" value=<?php echo $cat_id ?>>
                                                            <input type="text" name="cat_title" id="" class="form-control" 
                                                            placeholder="Category title" aria-describedby="helpId" value=<?php echo $cat_title ?>>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" name="submit_edit" id="submit_edit" class="btn btn-primary" placeholder="" aria-describedby="helpId" value="Update Category">
                                                        </div>
                                                    </form>
                                                <?php
                                                    
                                                }
                                            }
                                        }
                                    ?>

                                    <!-- <input type="text" name="cat_title" id="" class="form-control" placeholder="Category title" aria-describedby="helpId"> -->

                        </div>
                        <div class="col-xs-6">
                            <a href="categories.php?delete_all" class="btn btn-primary">Delete All</a>
                            
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
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
                                                    <td><a href="categories.php?edit=<?php echo $cat_id ?> ">Edit</a></td>
                                                    <td><a href="categories.php?delete=<?php echo $cat_id ?> ">Delete</a></td>
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