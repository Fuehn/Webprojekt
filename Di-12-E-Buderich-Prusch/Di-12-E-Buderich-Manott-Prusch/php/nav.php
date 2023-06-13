<nav>
    <div>
        <?php include_once 'hide_elements.php'; ?>
        <ul id = 'navbar'>   
            <li class="nav-li"><a id="active" class = "nav-li-a" href="index.php">Startseite</a></li>
            <li class="nav-li" <?php echo $visibility_registration ?> ><a class = "nav-li-a" href="registration.php">Registrierung</a></li>
            <li class="nav-li"><?php echo $anmeldung_abmeldung ?></li>
            <li class="nav-li" <?php echo $visibility_profile ?> ><a class = "nav-li-a" href="profile.php">Profil</a></li>
        </ul>
    </div>
</nav>