<?php

$uploadBase = './uploads/';

foreach ($_FILES['fileToUpload']['name'] as $f => $name) {   

    $name = $_FILES['fileToUpload']['name'][$f];
    $uploadName = explode('.', $name);//jpg
    // print $name;  1.jpg

    // $fileSize = $_FILES['upload']['size'][$f];
    // $fileType = $_FILES['upload']['type'][$f];
    //$uploadname = time().$f.'.'.$uploadName[1];
    //$uploadFile = $uploadBase.$uploadname;
    $uploadFile = $uploadBase.$name;

    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'][$f], $uploadFile)){
        echo 'success';
    }else{
        echo 'error';
    }
}  

//print_r($_FILES['fileToUpload']) // 확인용
?>

