<!-- 0213 -->
<?php include_once "db.php";
// array cannot store into database, need transform to list
if(!empty($_POST['pr'])){

    $_POST['pr'] = serialize($_POST['pr']);
} else {
    $_POST['pr'] = serialize([]);

}
$Admin->save($_POST);

to("../back.php?do=admin");