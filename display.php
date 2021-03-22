<?php

    session_start();
    if(isset($_SESSION['msg']))  {
        echo $_SESSION['msg'];
    }
    unset($_SESSION['msg']);
    if(isset($_SESSION['assocArray'])) {
       $res = $_SESSION['assocArray'];
    }
    

?>

<?php foreach ($res as $key => $value) { ?>
    <?php if (is_array($value)) { ?>
        <?php foreach ($value as $k => $val) { ?>
            <p><span style="font-weight:700;"><?= $k ?></span> : <?= $val ?></p>

        <?php } ?>
    <?php } else {?>
        <p><span style="font-weight:700;"><?= $key ?></span> : <?= $value ?></p>
    <?php } ?>
    <hr>
<?php } ?>

    
    

