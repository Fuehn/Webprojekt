<?php
include_once "model/DummyUserDao.php";
$link = "login.php";
$dao = new DummyUserDaoDatabase();
if(isset($_POST["l-email"]) && isset($_POST["l-password"])){
    if($dao -> checkLoginData($_POST["l-email"], $_POST["l-password"])){
        $link = "index.php";
        $blass = $dao -> getUserIdForRegistration($_POST["l-email"]);
        $_SESSION["userid"] =  $blass;
    }
}
?>