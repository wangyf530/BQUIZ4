<?php include_once "db.php";

// array cannot store into database, need transform to list
$_POST['pr'] = serialize($_POST['pr']);
$Admin->save($_POST);

to("../back.php?do=admin");