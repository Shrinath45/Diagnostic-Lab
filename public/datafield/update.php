<?php
include ('../datafield/server.php');

if(isset($_POST['up'])){
    $id=$_POST['appoid'];
    $up=$_POST['ustatus'];

    $sql = "UPDATE `bookAppointment` SET Status='$up' WHERE AppoID ='$id' ";
    $result = mysqli_query($mysqli, $sql);
    if($result){
        header('location: ../viewappointments.php');
    }else{
        echo 'Cannot Update ';
    }
}

?>