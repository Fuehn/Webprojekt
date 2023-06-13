<?php include_once 'php/head.php'; ?>

    <body>

    <?php include_once 'php/nav.php'; ?>

        <section class="content">
            <h1>Neuer Eintrag</h1>
            <form>
                    <label for="title">Titel</label><br>
                    <input type="text" id="title" name="title"><br>
                    <label for="text">Text</label><br>
                    <textarea id="text" name="text"></textarea>
                    <select name="feedback" id="feedback">
                        <option value="recomandation">Verbesserungsvorschlag</option>                            
                        <option value="problem">Problem meldung</option>
                    </select>
                <input type="button" class="button" id="uploadPicture" name="uploadPicture" value="Bild hinzufügen">
                <input type="button" class="button" id="loadCoordinates" name="loadCoordinates" value="Standort hinzufügen"><br>
                <input type="submit" class="button" value="Beitrag veröffentlichen">
                
            
            </form>
        </section>

    </body>

    <?php include_once 'php/footer.php'; ?>

</html>