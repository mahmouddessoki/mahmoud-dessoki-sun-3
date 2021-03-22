


<?php

    session_start();
    if(isset($_SESSION['error'])) {
        foreach ($_SESSION['error'] as $error) {
        echo "$error <br>" ;
        }

    }

    unset($_SESSION['error']);
   

?>

<form action="handle-upload-json.php" method="post" enctype = "multipart/form-data">
    <label for="json">Upload Your Json File</label>
    <input type="file" name="jsonFile" id= "json">
    <input type="submit" value="submit" name = "submit" style = "padding:10px 15px;background-color:black;
    border:none;color:white;">
</form>