<?php include_once 'php/head.php'; ?>

<?php include_once 'php/profile_logic.php'; ?>

<link rel="stylesheet" href="css/profile.css">

<body>

    <?php include_once 'php/nav.php'; ?>

    <section class="content">
        <h1>Profil bearbeiten</h1>
        <form method="post">
            <div class="formular_outergrid">
                <div class="formular_innergrid">
                    <label for="p-email">E-Mail</label>
                    <input type="email" class="text" id="p-email" name="p-email" value="<?php echo $number["email"]; ?>">
                    <label for="p-firstnames">Vorname</label>
                    <input type="text" id="p-firstnames" name="p-firstnames" value="<?php echo $number["firstnames"]; ?>">
                    <label for="p-surnames">Nachname</label>
                    <input type="text" id="p-surnames" name="p-surnames" value="<?php echo $number["surnames"]; ?>">
                    <label for="p-postcode">Postleitzahl</label>
                    <input type="text" id="p-postcode" name="p-postcode" value="<?php echo $number["postcode"]; ?>">
                </div>
                <div class="formular_innergrid">
                    <img src="img/ProfilePic.jpg" class="profile_picture">
                    <p>UserID: #<?php echo $val['userid']; ?></p>
                </div>
            </div>
            <input type="submit" class="button" value="Änderungen übernehmen">
        </form>
    </section>
</body>

<?php include_once 'php/footer.php'; ?>

</html>