<?php include_once "db.php";
$table=$_POST['table'];
unset($_POST['table']);
$chk = $$table->count($_POST);

if($chk){
    echo 1;
    // $_SESSION['login']=$_POST['acc'];
    $_SESSION[$table]=$_POST['acc'];
    // $_SESSION['Mem']
    // $_SESSION['Admin']
} else {
    echo 0;
}