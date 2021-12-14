<?php
$directory = "uploads/";
$upload_file = $directory . basename($_FILES["file_to_upload"]["name"]);
$file_type = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));//get the file type
$upload_flag = 1;

//check file size
if ($_FILES["file_to_upload"]["size"] > 5000000) {
    $upload_flag = 0;
    header("Location: fail.html");
}

//check failed
if ($upload_flag == 0) {
    header("Location: fail.html");
}

//check uploads
else {
    if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $upload_file)) {
        //echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded, please wait."
        //determine the file type
        if ($file_type =="pdf") {
            shell_exec('bash file_operate.sh');//this is to execute the java program.
            header("Location: example_of_readerpage.html");
        }
        else {
            shell_exec('bash fail.sh');
            header("Location: fail.html");
        }
    }
}
?>