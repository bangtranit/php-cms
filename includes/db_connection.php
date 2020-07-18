<?php
    $connection = mysqli_connect('localhost', 'root', 'root', 'php-cms');
    if ($connection) {
        echo "We are connected";
    }else{
        echo "We can' connect to databases";
    }
?>