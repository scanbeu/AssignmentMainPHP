<?php

$con = new mysqli('localhost', 'root', '', 'assignment2');

if(!$con){
    die(mysqli_error($con));
}

?>