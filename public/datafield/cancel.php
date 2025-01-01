<?php
include 'server.php';

if(isset($_GET['cancelid'])){
    $id=$_GET['cancelid'];

    $sql = "DELETE from `book` where AppoID=$id ";
    $result = mysqli_query($mysqli, $sql);
    if($result){
        header('location: ../index.php#view');
    }else{
        echo 'Cannot canceled ';
    }
}

?>