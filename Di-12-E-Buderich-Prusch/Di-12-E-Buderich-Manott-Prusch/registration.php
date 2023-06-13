<?php include_once 'php/head.php'; ?>
<link rel="stylesheet" href="css/registration.css">

<?php include_once 'php/registration_logic.php'; ?>

<body>

    <?php include_once 'php/nav.php'; ?>

    <section class="content">
        <h1>Registrierung</h1>
        <p>Bitte geben Sie Ihre Daten in die unten stehenden Felder ein, um dem Bürgerfeedback beizutreten</p>
        <hr>
        <form method="post">
            <div class="formular_outergrid">
                <div class="formular_innergrid">
                    <label for="firstnames">Vorname</label>
                    <input type="text" id="firstnames" name="firstnames" required>
                </div>
                <div class="formular_innergrid">
                    <label for="surnames">Nachname</label>
                    <input type="text" id="surnames" name="surnames" required>
                </div>
            </div>

            <div class="formular_outergrid">
                <div class="formular_innergrid">
                    <label for="email">E-Mail</label>
                    <input type="email" class="textfield" id="email" name="email" required>
                </div>
                <div class="formular_innergrid">
                    <label for="postcode">Postleitzahl</label>
                    <input type="text" class="textfield" id="postcode" name="postcode" required>
                </div>
            </div>

            <hr>

            <div class="formular_outergrid">
                <div class="formular_innergrid">
                    <label for="password1">Passwort</label>
                    <input type="password" id="password1" name="password1" required>
                </div>
                <div class="formular_innergrid">
                    <label for="password2">Passwort bestätigen</label>
                    <input type="password" id="password2" name="password2" required>
                </div>
            </div>

            <hr>
            <input type="checkbox" class="checkbox" name="acceptedLegal" required>
            <label for="acceptedLegal">Ich bin mit den Allgemeinen Geschäftsbedingungen einverstanden</label>
            <input type="submit" class="button" value="Registrieren">
        </form>
    </section>
</body>

<?php include_once 'php/footer.php'; ?>

</html>