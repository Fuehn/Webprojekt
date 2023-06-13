<?php include_once 'php/head.php'; ?>

<?php include_once 'php/login_logic.php'; ?>

<link rel="stylesheet" href="css/login.css">

<body>

    <?php include_once 'php/nav.php'; ?>

    <section class="content">
        <h1>Anmeldung</h1>
        <p>Bitte geben sie Ihre Daten in die unten stehenden Felder ein, um sich anzumelden</p>
        <hr>
        <form method="post" action=<?php echo $link; ?>>
            <label for="l-email">Account</label>
            <input type="text" id="l-email" name="l-email" placeholder="E-mail" required>
            <input type="password" id="l-password" name="l-password" placeholder="Password" required>
            <hr>
            <input type="checkbox" id="stay" name="stay">
            <label for="stay">Eingelogged bleiben</label>
            <button type="submit">Anmelden</button>
        </form>

        <div class="lower_content">
            <p>Noch nicht registriert?</p>
            <a href="registration.php">Hier registrieren</a>
        </div>
    </section>
</body>

<?php include_once 'php/footer.php'; ?>

</html>