<?php
// File upload functions
// @author ZomB
// @version 201129
$upload_path = "H:/ArtHub/ArtHubPrivate/artHub/file_uploads";

//Displays error messages in a readable format
function file_upload_error($error_integer) {
    $upload_errors = array(
        UPLOAD_ERR_OK           => "No errors.",
        UPLOAD_ERR_INI_SIZE     => "Larger than upload max file size.",
        UPLOAD_ERR_FORM_SIZE    => "Larger than form max file size.",
        UPLOAD_ERR_PARTIAL      => "Partial uplaod.",
        UPLOAD_ERR_NO_FILE      => "No file.",
        UPLOAD_ERR_NO_TMP_DIR   => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE   => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION    => "File upload stopped by extension."
    );
    return $upload_errors[$error_integer];
}

//Sanitizes the file name
function sanitize_file_name($filename) {
    //replaces characters that could be dangerous
    $filename = preg_replace("/([^A-Za-z0-9_\-\.]|[\.]{2})/", "", $filename);
    $filename = basename($filename);
    return $filename;
}

//Function for uploading files
function upload_file($field_name) {
    global $upload_path;

    if(isset($_FILES[$field_name])) {

        $file_name = sanitize_file_name($_FILES[$field_name]['name']);
        $file_type = $_FILES[$field_name]['type'];
        $tmp_file = $_FILES[$field_name]['tmp_name'];
        $error = $_FILES[$field_name]['error'];
        $file_size = $_FILES[$field_name]['size'];

        //prevents hacking the path by prepending absolute file path to the file name
        $file_path = $upload_path . '/' . $file_name;

        //check for errors
        if($error > 0) {
            echo "Error: " . file_upload_error($error);
        } elseif(!is_uploaded_file($tmp_file)) {
            echo "Error: Does not reference a recently uploaded file.<br />";
        } elseif(file_exists($file_path)) {
            echo "Error: A file with that name already exists in target location.<br />";
        } else {
            //SUCCESS
            //confirmation text on file information
            echo "File was uploaded successfully.<br />";
            echo "File name is '{$file_name}'.<br />";
            echo "Uploaded file size was {$file_size} bytes.<br />";
            echo "Temp file location: {$tmp_file}<br />";

            if(move_uploaded_file($tmp_file, $file_path)) {
                echo "File moved to: {$file_path}<br />";
            }
        }
    }
}