<?php
// File upload functions
// @author ZomB
// @version 201129

$max_file_size = 2097152; //set for 2MB             1 MB = 1048576
$upload_path = "H:/ArtHub/ArtHubPrivate/artHub/file_uploads";

$allowed_mime_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
$allowed_extensions = ['png', 'gif', 'jpg', 'jpeg'];

$check_is_image = true;
$check_for_php = true;

//Displays error messages in a readable format
function file_upload_error($error_integer) {
    $upload_errors = array(
        UPLOAD_ERR_OK           => "No errors.",
        UPLOAD_ERR_INI_SIZE     => "Larger than upload max file size.",
        UPLOAD_ERR_FORM_SIZE    => "Larger than form max file size.",
        UPLOAD_ERR_PARTIAL      => "Partial upload.",
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

//returns file permissions in octal format
function file_permissions($file) {
    $numeric_perms = fileperms($file);
    $octal_perms = sprintf('%o', $numeric_perms);
    return substr($octal_perms, -4);
}

//returns file extension
function file_extensions($file) {
    $path_parts = pathinfo($file);
    return $path_parts['extension'];
}

function file_contains_php($file) {
    $contents = file_get_contents($file);
    $position = strpos($contents, '<?php');
    return $position !== false;
}

//Function for uploading files
function upload_file($field_name) {
    global $upload_path, $max_file_size, $allowed_mime_types, $allowed_extensions, $check_is_image, $check_for_php;

    if(isset($_FILES[$field_name])) {

        $file_name = sanitize_file_name($_FILES[$field_name]['name']);
        $file_extension = file_extensions($file_name);

        $unique_id = uniqid('file_', true);
        $new_name = "{$unique_id}.{$file_extension}";

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
        } elseif($file_size > $max_file_size) {
            echo "Error: File size is too big.<br />";
        } elseif(!in_array($file_type, $allowed_mime_types)) {
            echo "Error: Not an allowed mime type.<br />";
        } elseif(!in_array($file_extension, $allowed_extensions)) {
            echo "Error: Not an allowed file extension.<br />";
        } elseif($check_is_image && (getimagesize($tmp_file) === false)) {
            echo "Error: Not a valid image file.<br />";
        } elseif($check_for_php && file_contains_php($tmp_file)) {
            echo "Error: File contains php.<br />";
        } else {
            //SUCCESS
            //confirmation text on file information
            echo "File was uploaded successfully.<br />";
            echo "File name is '{$file_name}'.<br />";
            echo "Uploaded file size was {$file_size} bytes.<br />";
            $tmp_filesize = filesize($tmp_file);
            echo "Temp file size is {$tmp_filesize} bytes.<br />";
            echo "Temp file location: {$tmp_file}<br />";

            if(move_uploaded_file($tmp_file, $file_path)) {
                echo "File moved to: {$file_path}<br />";

                //remove execute file permissions
                if(chmod($file_path, 0644)) {
                    echo "Execute permissions removed from file.<br />";
                    $file_permissions = file_permissions($file_path);
                    echo "File permissions are now '{$file_permissions}'.<br />";
                } else {
                    echo "Error: Execute permissions could not be removed.<br />";
                }
            }
        }
    }
}