<?php
include('../public/datafield/server.php'); // Database connection

if(isset($_POST['update1'])) {
    $appoid = $_POST['appoid'];
    $ustatus = $_POST['ustatus'];
    if ($appoid && $ustatus) {
        $appoid = mysqli_real_escape_string($mysqli, $appoid);
        $ustatus = mysqli_real_escape_string($mysqli, $ustatus);

        $sql = "UPDATE `book` SET `Status` = '$ustatus' WHERE `AppoID` = '$appoid'";
        if (mysqli_query($mysqli, $sql)) {
            header("Location: appointments.php?success=Status updated successfully.");
        } else {
            header("Location: appointments.php?error=Failed to update status.");
        }
    } else {
        header("Location: appointments.php?error=Invalid input.");
    }
} else {
    header("Location: appointments.php?error=Invalid request method.");
}
?>
