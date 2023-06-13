<?php
include_once "model/DummyUserDao.php";

$number = array(
    "firstnames" => "",
    "surnames" => "",
    "email" => "",
    "postcode" => "",
);

$dao = new DummyUserDaoDatabase();

if (isset($_SESSION["userid"])) {
    $val = $_SESSION["userid"];
    $number = $dao ->getUserData($val['userid']);
    
}

if (isset($_POST["p-firstnames"]) && isset($_POST["p-surnames"]) && isset($_POST["p-email"]) && isset($_POST["p-postcode"]) && isset($_SESSION["userid"])) {
    $tmp = array(
        "firstnames" => $_POST["p-firstnames"],
        "surnames" => $_POST["p-surnames"],
        "email" => $_POST["p-email"],
        "postcode" => $_POST["p-postcode"],
    );
    $val = $_SESSION["userid"];
    $dao -> changedata($tmp, $val['userid']);
    $number = $tmp;
}
?>