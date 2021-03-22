<?php

    session_start();
    if(isset($_POST['submit'])) {
        $jsonFile = $_FILES['jsonFile'];
        $fileName = $jsonFile['name'];
        $fileTmp = $jsonFile['tmp_name'];
        $fileError = $jsonFile['error'];
        $fileType = $jsonFile['type'];
        $ext = pathinfo($fileName,PATHINFO_EXTENSION);

        $fileErrors = [];
        if(!empty($fileError)) {
            $fileErrors[] = "error while uploading file";
        } elseif ($ext !== "json") {
            $fileErrors[] = "must be json file";
        }

        if(empty($fileErrors)) {
            $randomStr = uniqid();
            $renameFile = "$randomStr.$ext";
            move_uploaded_file($fileTmp,"uploads/$renameFile");
            $_SESSION['msg'] = "successfully uploaded";
            $myfile = fopen("uploads/$renameFile","r") or
                    die("unable to open this file");
            $data = fread($myfile,filesize("uploads/$renameFile"));
            $res = json_decode($data,true);
            $_SESSION['assocArray'] = $res;
            header("location: display.php");
        } else {
            $_SESSION = [];
            $_SESSION['error'] = $fileErrors;
            header("location: upload-json.php");
        }

    }
?>
