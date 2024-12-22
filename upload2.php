<?php
// Define the upload directory
$uploadDirectory = 'uploads/';

// Check if the upload directory exists, create it if not
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Check if files are uploaded
if (isset($_FILES) && count($_FILES) > 0) {
    $uploadedFiles = [];

    // Loop through all files sent via the request
    foreach ($_FILES as $fileKey => $fileInfo) {
        // Ensure the file was uploaded successfully
        if ($fileInfo['error'] === UPLOAD_ERR_OK) {
            // Get the temporary file path and the original file name
            $tempPath = $fileInfo['tmp_name'];
            $fileName = basename($fileInfo['name']);
            $filePath = $uploadDirectory . $fileName;

            // Move the uploaded file to the destination folder
            if (move_uploaded_file($tempPath, $filePath)) {
                $uploadedFiles[] = $fileName;
            } else {
                echo "Error uploading file: " . $fileName;
                exit;
            }
        } else {
            echo "Error: File " . $fileKey . " has an error: " . $fileInfo['error'];
            exit;
        }
    }

    // If files were uploaded, return a success message
    if (count($uploadedFiles) > 0) {
        echo "Files uploaded successfully: " . implode(", ", $uploadedFiles);
    }
} else {
    echo "No files were uploaded.";
}
?>

