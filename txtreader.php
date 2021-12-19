<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDFconverter</title>
    <link rel="stylesheet" href="style.css">
</head>
</html>
<?php
$file_name="resource/test.txt";
$fp=fopen($file_name, "rb");
if(file_exists($file_name)) {
    while (!feof($fp)) {
        $c = fgetc($fp);
        if($c=="\n"){
            echo "<br>";
        }
        else {
            echo $c;
        }
    }
    fclose($fp);
}
else{
    header("Location: fail.html");
    return;
}
shell_exec('bash reader_process.sh');
?>