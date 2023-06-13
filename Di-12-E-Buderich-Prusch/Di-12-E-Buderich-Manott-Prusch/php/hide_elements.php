<?php
    $visibility_profile = '';
    $anmeldung_abmeldung = '';
    $visibility_registration = '';

    if(isset($_SESSION["userid"])){
        $visibility_profile = '';
        $anmeldung_abmeldung = '<a class = "nav-li-a" href="logout.php">Abmelden</a>';
        $visibility_registration = 'hidden';
    }else{
        $visibility_profile = 'hidden';
        $anmeldung_abmeldung = '<a class = "nav-li-a" href="login.php">Anmelden</a>';
    }
?>