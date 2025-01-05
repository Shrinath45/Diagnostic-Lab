<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf_file'])) {
    $appoid = intval($_POST['appoid']); // Validate appointment ID
    $fileError = $_FILES['pdf_file']['error'];

    if ($fileError === UPLOAD_ERR_OK) {
        $pdfName = basename($_FILES['pdf_file']['name']);
        $pdfTmpName = $_FILES['pdf_file']['tmp_name'];
        $pdfType = $_FILES['pdf_file']['type'];
        $pdfSize = $_FILES['pdf_file']['size'];

        // Additional file checks and upload logic
        echo "File uploaded successfully!";
    } else {
        echo "File upload error: ";
        switch ($fileError) {
            case UPLOAD_ERR_INI_SIZE:
                echo "The uploaded file exceeds the maximum allowed size.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "The uploaded file exceeds the maximum size specified in the form.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "The file was only partially uploaded.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No file was uploaded.";
                break;
            default:
                echo "Unknown error.";
                break;
        }
    }
} else {
    echo "File upload array is not set.";
}
?>
