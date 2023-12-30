<?php
$uploaddir = "../uploads/";
$uploadfile = $uploaddir . basename($_FILES["imagenPerfil"]["name"]);
// echo '<pre>';
if (move_uploaded_file($_FILES['imagenPerfil']['tmp_name'], $uploadfile)) {
    echo $uploadfile;
} else {
    echo "Possible file upload attack!\n";
}

// echo 'Here is some more debugging info:';
// print_r($_FILES);

// print "</pre>";
?>