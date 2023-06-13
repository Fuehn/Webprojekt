<?php
include_once "model/DummyUserDao.php";

if (isset($_POST["firstnames"]) && isset($_POST["surnames"]) && isset($_POST["email"]) && isset($_POST["postcode"]) && isset($_POST["password1"]) && isset($_POST["password2"])) {

    $test = new DummyUserDaoDatabase();

    if(DummyUserDaoDatabase::doesDatabaseExsist()){
        if(DummyUserDaoDatabase::doesEmailExsist($_POST["email"]) or $_POST["password1"] != $_POST["password2"]){
            $errorMessage = "Eingabe ist fehlerhaft.";
        }else{
            $data = array(
                "firstnames" => $_POST["firstnames"],
                "surnames" => $_POST["surnames"],
                "email" => $_POST["email"],
                "postcode" => $_POST["postcode"],
                "password1" => $_POST["password1"]
            );
    
            DummyUserDaoDatabase::store($data);
            $blass = $test -> getUserIdForRegistration($data["email"]);
            $_SESSION["userid"] =  $blass;
        }
    }elseif($_POST["password1"] == $_POST["password2"]){
        DummyUserDaoDatabase::createDatabase();
        $data = array(
            "firstnames" => $_POST["firstnames"],
            "surnames" => $_POST["surnames"],
            "email" => $_POST["email"],
            "postcode" => $_POST["postcode"],
            "password1" => $_POST["password1"]
        );

        DummyUserDaoDatabase::store($data);
        $blass = $test -> getUserIdForRegistration($data["email"]);
        $_SESSION["userid"] =  $blass;
    }
}
?>